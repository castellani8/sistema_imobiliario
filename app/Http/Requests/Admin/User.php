<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class User extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                          => 'required|min:3|max:191|',
            'genre'                         => 'in:male, female,others',
            'document'                      => 'required|min:11|max:14|unique:users',
            'document_secondary'            => 'required|min:8|max:12',
            'document_secondary_complement' => 'required',
            'date_of_birth'                 => 'required|date_format:d/m/Y',
            'place_of_birth'                => 'required',
            'civil_status'                  => 'required|in:married,separated,single,divorced,widower',
            
            // Income
            'occupation' => 'required',
            'income' => 'required',
            'company_work' => 'required',
            
            // Address
            'required' => 'required',
        ];
    }
}
