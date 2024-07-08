<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKategoriSoalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kategori' => 'required',
            'waktu' => 'required',
            'jumlah_soal' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'kategori.required' => 'Kolom nama kategori harus diisi',
            'waktu.required' => 'Kolom waktu harus diisi',
            'jumlah_soal.required' => 'Kolom jumlah soal harus diisi',
        ];
    }
}
