<?php

namespace App\Http\Requests;

use App\Enum\PaymentStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'meals' => 'required|array',
            'meals.*' => 'required|integer|exists:meals,id',
            'transaction_id' => 'nullable|integer',
            'amount' => 'required|integer',
            'status' => ['required', Rule::in(PaymentStatus::values())]
        ];
    }
}
