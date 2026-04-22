<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $fotoRule = $this->isMethod('post') ? 'required|image|mimes:jpg,jpeg,png,webp|max:2048' : 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048';
        $pegawaiId = $this->route('pegawai')?->id;

        return [
            'nip' => 'required|string|max:30|unique:pegawai,nip,' . ($pegawaiId ?? 'NULL'),
            'nama' => 'required|string|max:150',
            'tempat_lahir' => 'required|string|max:100',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'agama_id' => 'required|exists:agama,id',
            'golongan_id' => 'required|exists:golongan,id',
            'eselon_id' => 'required|exists:eselon,id',
            'jabatan_id' => 'required|exists:jabatan,id',
            'unit_kerja_id' => 'required|exists:unit_kerja,id',
            'tempat_tugas' => 'required|string|max:150',
            'no_hp' => 'required|string|max:25',
            'npwp' => 'nullable|string|max:30',
            'foto' => $fotoRule,
        ];
    }
}
