<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class ExpenseRequest extends FormRequest
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
        $currentRoutes = explode(".", Route::currentRouteName());
        $currentAction = $currentRoutes[1];

        if($currentAction == 'store' || $currentAction == 'update')
        {
            $validationRules = [
                'category' => ['required', 'exists:categories,name'],
                'description' => ['required', 'min:1', 'max:50'],
                'amount' => ['required', 'gt:0', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
                'expense_date' => ['required', 'date'],
            ];
        }

        return $validationRules;

    }
}
