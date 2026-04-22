<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\UnitKerja;

class UnitKerjaController extends Controller
{
    public function index()
    {
        return response()->json(UnitKerja::withCount('pegawai')->orderBy('nama')->get());
    }
}
