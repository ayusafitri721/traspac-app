<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'nip','nama','tempat_lahir','tgl_lahir','jenis_kelamin','alamat',
        'agama_id','golongan_id','eselon_id','jabatan_id','unit_kerja_id',
        'tempat_tugas','no_hp','npwp','foto'
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
    ];

    public function agama() { return $this->belongsTo(Agama::class, 'agama_id'); }
    public function golongan() { return $this->belongsTo(Golongan::class, 'golongan_id'); }
    public function eselon() { return $this->belongsTo(Eselon::class, 'eselon_id'); }
    public function jabatan() { return $this->belongsTo(Jabatan::class, 'jabatan_id'); }
    public function unitKerja() { return $this->belongsTo(UnitKerja::class, 'unit_kerja_id'); }

    public function deleteFoto(): void
    {
        if ($this->foto && Storage::disk('public')->exists($this->foto)) {
            Storage::disk('public')->delete($this->foto);
        }
    }
}
