<?php

namespace Database\Seeders;

use App\Models\Agama;
use App\Models\Eselon;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Administrator',
                'email' => 'admin@traspac.local',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        $agama = collect(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha'])->map(fn($n) => Agama::firstOrCreate(['nama' => $n]));
        $gol = collect([
            ['IV/e', 'IV/e'], ['IV/a', 'IV/a'], ['III/c', 'III/c'], ['III/b', 'III/b'], ['II/d', 'II/d']
        ])->map(fn($g) => Golongan::firstOrCreate(['kode' => $g[0]], ['nama' => $g[1]]));
        $eselon = collect([['I', 'I'], ['II', 'II'], ['III', 'III']])->map(fn($e) => Eselon::firstOrCreate(['kode' => $e[0]], ['nama' => $e[1]]));
        $jabatan = collect(['Direktur', 'Manager HR', 'Manager IT', 'Staff Admin', 'Staff Finance'])->map(fn($n) => Jabatan::firstOrCreate(['nama' => $n]));
        $unit = collect(['Direksi', 'Human Resource', 'Information Technology', 'Finance', 'Operasional'])->map(fn($n) => UnitKerja::firstOrCreate(['nama' => $n]));

        for ($i = 1; $i <= 25; $i++) {
            Pegawai::firstOrCreate(
                ['nip' => '198700' . str_pad((string)$i, 3, '0', STR_PAD_LEFT)],
                [
                    'nama' => 'Pegawai ' . $i,
                    'tempat_lahir' => 'Kota ' . (($i % 5) + 1),
                    'tgl_lahir' => now()->subYears(25 + $i)->toDateString(),
                    'jenis_kelamin' => $i % 2 ? 'L' : 'P',
                    'alamat' => 'Alamat contoh ' . $i,
                    'agama_id' => $agama[$i % $agama->count()]->id,
                    'golongan_id' => $gol[$i % $gol->count()]->id,
                    'eselon_id' => $eselon[$i % $eselon->count()]->id,
                    'jabatan_id' => $jabatan[$i % $jabatan->count()]->id,
                    'unit_kerja_id' => $unit[$i % $unit->count()]->id,
                    'tempat_tugas' => 'Kantor Pusat',
                    'no_hp' => '0812' . str_pad((string)$i, 8, '0', STR_PAD_LEFT),
                    'npwp' => 'NPWP-' . str_pad((string)$i, 5, '0', STR_PAD_LEFT),
                ]
            );
        }
    }
}
