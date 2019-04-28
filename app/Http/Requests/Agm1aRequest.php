<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class Agm1aRequest extends FormRequest
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
            'tanggal' => 'required|date',
            // 'temp_bk_i' => 'numeric',
            // 'temp_bk_ii' => 'numeric',
            // 'temp_bk_iii' => 'numeric',
            // 'temp_bb_i' => 'numeric',
            // 'temp_bb_ii' => 'numeric',
            // 'temp_bb_iii' => 'numeric',
            // 'temp_rumput_i' => 'numeric',
            // 'temp_rumput_ii' => 'numeric',
            // 'temp_rumput_iii' => 'numeric',
            // 'lembab_nisbi_ii' => 'numeric',
            // 'lembab_nisbi_ii' => 'numeric',
            // 'lembab_nisbi_iii' => 'numeric',
            // 'angin_kec_rata_i' => 'numeric',
            // 'angin_kec_rata_ii' => 'numeric',
            // 'angin_kec_rata_iii' => 'numeric',
            // 'angin_arah_i' => 'numeric',
            // 'angin_arah_ii' => 'numeric',
            // 'angin_arah_iii' => 'numeric',
            // 'angin_kec_i' => 'numeric',
            // 'angin_kec_ii' => 'numeric',
            // 'angin_kec_iii' => 'numeric',
            // 'sinar_matahari' => 'numeric',
            // 'hujan' => 'numeric',
            // 'ujiper_bk_i' => 'numeric',
            // 'ujiper_min_i' => 'numeric',
            // 'ujiper_bk_ii' => 'numeric',
            // 'ujiper_max_ii' => 'numeric'
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
