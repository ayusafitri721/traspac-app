<?php

namespace App\Http\Controllers;

use App\Http\Requests\PegawaiRequest;
use App\Models\Agama;
use App\Models\Eselon;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $query = Pegawai::with(['agama', 'golongan', 'eselon', 'jabatan', 'unitKerja']);
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('nama', 'like', "%{$s}%")
                  ->orWhere('nip', 'like', "%{$s}%")
                  ->orWhereHas('jabatan', fn($jq) => $jq->where('nama', 'like', "%{$s}%"));
            });
        }
        if ($request->filled('unit_kerja_id')) {
            $query->where('unit_kerja_id', $request->unit_kerja_id);
        }
        if (in_array($request->jenis_kelamin, ['L', 'P'], true)) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }
        $pegawai = $query->latest()->paginate(10)->withQueryString();

        return view('pegawai.index', [
            'pegawai' => $pegawai,
            'unitKerja' => UnitKerja::orderBy('nama')->get(),
            'selectedUnitKerja' => $request->unit_kerja_id,
            'selectedJenisKelamin' => $request->jenis_kelamin,
        ]);
    }

    public function create()
    {
        return view('pegawai.create', $this->formData());
    }

    public function store(PegawaiRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }
        Pegawai::create($data);
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', array_merge($this->formData(), compact('pegawai')));
    }

    public function update(PegawaiRequest $request, Pegawai $pegawai)
    {
        $data = $request->validated();
        if ($request->hasFile('foto')) {
            $pegawai->deleteFoto();
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        } else {
            unset($data['foto']);
        }
        $pegawai->update($data);
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->deleteFoto();
        $pegawai->delete();
        return back()->with('success', 'Data pegawai berhasil dihapus.');
    }

    public function print(Request $request)
    {
        $query = Pegawai::with(['agama', 'golongan', 'eselon', 'jabatan', 'unitKerja']);
        if ($request->filled('unit_kerja_id')) {
            $query->where('unit_kerja_id', $request->unit_kerja_id);
        }
        return view('pegawai.print', [
            'pegawai' => $query->orderBy('nama')->get(),
            'unitKerja' => UnitKerja::orderBy('nama')->get(),
            'selectedUnitKerja' => $request->unit_kerja_id,
        ]);
    }

    private function formData(): array
    {
        return [
            'agama' => Agama::orderBy('nama')->get(),
            'golongan' => Golongan::orderBy('kode')->get(),
            'eselon' => Eselon::orderBy('kode')->get(),
            'jabatan' => Jabatan::orderBy('nama')->get(),
            'unitKerja' => UnitKerja::orderBy('nama')->get(),
        ];
    }
}
