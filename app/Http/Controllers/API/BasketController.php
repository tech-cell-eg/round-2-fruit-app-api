<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMealToBasketRequest;
use App\Http\Requests\RemoveMealFromBasketRequest;
use App\Http\Resources\MealResource;
use App\Models\Basket;
use App\Models\Meal;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BasketController extends Controller
{
    use ApiResponse;

    public function store(AddMealToBasketRequest $request) {
        try {
            $user = User::where('name', $request->name)->first();
            $data = $request->validated();
            $data['user_id'] = $user->id;
            $meal = Meal::findOrFail($data['meal_id']);
            $data['total_price'] = $meal->price * $data['quantity'];
            if (!Basket::create($data)) {
                return $this->errorResponse('Something went wrong', 500);
            }
            return $this->successResponse(['meal' => new MealResource($meal)], 'Meal added successfully', 201);
        } catch (\Exception $exception) {
            Log::error("add meal to basket\n" . $exception->getMessage());
            return $this->errorResponse('Something went wrong try again', 500);
        }
    }

    public function removeMeal(RemoveMealFromBasketRequest $request) {
        try {
            $data = $request->validated();
            $user = User::where('name', $request->name)->first();
            $meal = Basket::where('meal_id', $data['meal_id'])
                ->where('user_id', $user->id)->delete();
            if (!$meal) {
                return $this->errorResponse('Something went wrong', 500);
            }
            return $this->successResponse(['meal' => new MealResource(Meal::find($data['meal_id']))], 'Meal removed', 200);
        } catch (\Exception $exception) {
            Log::error("remove meal from basket\n" . $exception->getMessage());
            return $this->errorResponse('Something went wrong try again', 500);
        }
    }

}
