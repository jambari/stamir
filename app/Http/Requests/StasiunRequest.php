<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class StasiunRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kode_stasiun' => 'required',
            'jenis_stasiun' => 'required',
            'nomor_stasiun' => 'required|numeric',
            'zom' => 'required|numeric',
            'provinsi' => 'required|min:5|max:255',
            'kabupaten' => 'required|min:5|max:255',
            'nama_stasiun' => 'required',
            'lintang' => 'required|numeric',
            'bujur' => 'required|numeric'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
