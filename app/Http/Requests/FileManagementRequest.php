<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileManagementRequest extends FormRequest
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
            'file_name' => 'required|mimes:jpeg,png,jpg,gif,svg,xls,pdf',
            'user_id' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'file_name.required' => 'File Name is required!',
            'file_name.mimes' => 'Invalid file type!',
            'user_id.required' => 'User is required!'
        ];
    }
}