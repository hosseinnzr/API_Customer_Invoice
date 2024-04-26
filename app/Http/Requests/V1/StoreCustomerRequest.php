<?php

namespace App\Http\Requests\V1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{

    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('create');
    }


    public function rules(): array
    { 
        return [
            'id',
            'name' => ['required'],
            'type' => ['required', Rule::in(['I', 'B', 'i', 'b'])],
            'email' => ['required', 'email'],
            'address' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'postal_code' => ['required']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'postal_code' => $this->postal_code
        ]);
    }
}

