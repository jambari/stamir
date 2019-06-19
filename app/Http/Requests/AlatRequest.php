<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class AlatRequest extends FormRequest
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
            'stasiun_id' => 'required',
            'tanggal' => 'required|date',
            'nama' => 'required|string',
            'tipe' => 'required|string',
            'merk' => 'required|string',
            'desa' => 'required|string',
            'kecamatan' => 'required|string',
            'instansi' => 'required|string',
            'alamat_instansi' => 'required|string',
            'lingkungan' => 'required|string',
            'orografi' => 'required|string',
            'kepemilikan' => 'required|string',
            'kondisi_alat' => 'required|string',
            'pagar' => 'required|string',
            'aktifitas' => 'required|string',
            'sample_prakiraan' => 'required|string',
            'dipasang_oleh' => 'required|string'
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
