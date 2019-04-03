<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KaryawanFormRequest extends FormRequest
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
            //
        ];
    }
    public function messages()
    {
        return[
            'nama.required' => 'Nama belum diisi',
            'alamat.required' => 'Alamat juga harus diisi',
            // 'nama.min' => 'Nama minimal karakter 5',
            // 'alamat.min' => 'Alamat minimal karakter 10',
            // 'nama.unique' => 'Nama Supplier harus unik, kategori tersebut sudah ada'
        ];
    }
}
