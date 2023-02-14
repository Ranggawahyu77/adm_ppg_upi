<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParticipantRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
          'nama' => 'required',
          'nik' => 'required|unique:participants',
          'tempat_lhr' => 'required',
          'tanggal_lhr' => 'required|date',
          'gender' => 'required',
          'golongan' => 'required',
          'jabatan' => 'required',
          'instansi' => 'required',
          'alamat_instansi' => 'required',
          'no_hp' => 'required',
          'alamat_rumah' => 'required',
          'email' => 'required|email:dns|unique:participants',
          'no_npwp' => 'required',
          'no_rek' => 'required',
          'nama_bank' => 'required'
        ];
    }
}
