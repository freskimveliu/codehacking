<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|string|min:3',
            'email'     => 'required|email|unique:users',
            'role_id'   => 'required|integer',
            'file'      => 'image|nullable',
            'password'  => 'required|string|min:6|max:30',
        ];
    }
}
