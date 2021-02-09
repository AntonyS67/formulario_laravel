<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'fullname' => 'required|max:100',
            'doc_type' => 'required',
            'number_doc' => 'required|max:15',
            'email' => 'required|max:100|email',
            'password' => 'required|max:50',
            'address' => 'required|max:150'
        ];
    }
}
