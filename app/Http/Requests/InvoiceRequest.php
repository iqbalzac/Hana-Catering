<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required',
            'email' => 'required',
            'handphone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Maaf, belum mengisi nama Anda',
            'alamat.required' => 'Maaf, belum mengisi Alamat pengiriman Anda',
            'kota.required' => 'Maaf, belum mengisi Kota Anda',
            'kode_pos.required' => 'Maaf, belum mengisi Kode Pos Anda',
            'email.required' => 'Maaf, belum mengisi Kmail Anda',
            'handphone.required' => 'Maaf, belum mengisi nomor Handphone Anda',
        ];
    }
}
