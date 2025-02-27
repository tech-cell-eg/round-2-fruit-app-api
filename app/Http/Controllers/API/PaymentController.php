<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Meal;
use App\Models\Payment;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    use ApiResponse;

    public function index() {
        $title = 'Payments';
        $payments = Payment::all();
        $data = $payments->map(function ($payment) {
            $filteredPayment = collect($payment)->except(['user_id'])->toArray();
            $filteredPayment['user_name'] = User::find($payment->user_id)->name ?? 'Unknown';
            return $filteredPayment;
        });
//        dd($data);
        return view('payments.index', compact('title', 'data'));
    }
    public function store (PaymentRequest $request) {
        try {
            $user = User::getUser($request->name);
            $data = $request->validated();
            $meals = $data['meals'];
            $payment = $user->payments()->create([
                'transaction_id' => $data['transaction_id'],
                'amount'         => $data['amount'],
                'status'         => $data['status'],
            ]);
            $mealPrices = Meal::whereIn('id', $meals)->pluck('price', 'id');
            $mealPivotData = [];
            foreach ($meals as $meal) {
                $mealPivotData[$meal] = ['total_price' => $mealPrices[$meal] ?? 0];
            }
            $payment->meals()->attach($mealPivotData);
            return $this->successResponse([], 'Payment processed successfully');
        } catch (\Exception $exception) {
            Log::error('payment process error ' . $exception->getMessage());
            return $this->errorResponse('error processing payment', 422);
        }
    }

}
