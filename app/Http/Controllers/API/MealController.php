<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MealResource;
use App\Models\Meal;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MealController extends Controller
{

    use ApiResponse;

    public function index() {
        try {
            $meals = Meal::all();
            return $this->successResponse(MealResource::collection($meals), 'These is a list of meals.');
        } catch (\Exception $exception) {
            Log::error("list of meals \n" . $exception->getMessage());
            return $this->errorResponse('Something went wrong');
        }
    }

}
