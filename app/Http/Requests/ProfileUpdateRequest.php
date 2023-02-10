<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            // add custom columns
            'last_name' => ['required', 'string', 'max:255'],
            'organization_name' => ['required', 'string', 'max:255'],
            'organization_address' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'phone_number' => ['required', 'string', 'max:11'],
            'sex' => ['required', 'string', Rule::in(['M','F']),'max:1'],
            'position' => ['required', 'string', 'max:255'],
        ];
    }
}
