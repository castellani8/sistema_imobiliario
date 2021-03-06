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
            'occupation'   => 'required',
            'income'       => 'required',
            'company-work' => 'required',
            
            // Address
            'zipcode'      => 'required|min:8|max:9',
            'street'       => 'required',
            'number'       => 'required',
            'complement'   => 'required',
            'neighborhood' => 'required',
            'state'        => 'required',
            'city'         => 'required',

            // contact
            'cell' => 'required',

            // access
            'email' =>'required|email|unique:users',

            // spouse
            'type_of_communion' => 'required_if:civil_status,married,separated|in:Comunhão Universal de Bens,Comunhão Parcial de Bens,Separação Total de Bens,Participação Final de Aquestos',
            'spouse_name'                          => 'required|min:3|max:191|',
            'spouse_genre'                         => 'required_if:civil_status,married,separatedin:male, female,others',
            'spouse_document'                      => 'required_if:civil_status,married,separated|min:11|max:14',
            'spouse_document_secondary'            => 'required_if:civil_status,married,separated|min:8|max:12',
            'spouse_document_secondary_complement' => 'required_if:civil_status,married,separated',
            'spouse_date_of_birth'                 => 'required_if:civil_status,married,separated|date_format:d/m/Y',
            'spouse_place_of_birth'                => 'required_if:civil_status,married,separated',
            'spouse_occupation'                    => 'required_if:civil_status,married,separated',
            'spouse_income'                        => 'required_if:civil_status,married,separated',
            'spouse_company_work'                  => 'required_if:civil_status,married,separated',
        ];
    }
}
