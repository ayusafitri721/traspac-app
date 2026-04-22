@extends('layouts.app')

@section('content')
@php
    $totalPegawai = \App\Models\Pegawai::count();
    $totalUnitKerja = \App\Models\UnitKerja::count();
    $totalJabatan = \App\Models\Jabatan::count();
    $pegawaiL = \App\Models\Pegawai::where('jenis_kelamin', 'L')->count();
    $pegawaiP = \App\Models\Pegawai::where('jenis_kelamin', 'P')->count();
    $latestPegawai = \App\Models\Pegawai::with(['jabatan', 'unitKerja'])->latest()->take(5)->get();
    $unitKerja = \App\Models\UnitKerja::withCount('pegawai')->orderByDesc('pegawai_count')->take(5)->get();
@endphp

<style>
    .dashboard-hero {
        border-radius: 24px;
        background:
            radial-gradient(circle at top right, rgba(255,255,255,.20), transparent 28%),
            linear-gradient(135deg, #0f172a 0%, #102a43 45%, #1d4ed8 100%);
        color: #fff;
        overflow: hidden;
    }
    .dashboard-hero .title {
        font-size: clamp(1.4rem, 3vw, 2.2rem);
        letter-spacing: -.04em;
        font-weight: 800;
        line-height: 1.05;
    }
    .dashboard-hero .subtitle {
        color: rgba(255,255,255,.78);
        line-height: 1.75;
        max-width: 48ch;
        font-size: .95rem;
    }
    .hero-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 7px 11px;
        border-radius: 999px;
        background: rgba(255,255,255,.12);
        border: 1px solid rgba(255,255,255,.14);
        font-size: .76rem;
        font-weight: 700;
        letter-spacing: .06em;
        text-transform: uppercase;
    }
    .stat-card {
        position: relative;
        border: 1px solid rgba(15, 23, 42, .08);
        border-radius: 22px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 18px 40px rgba(15, 23, 42, .06);
        transition: transform .18s ease, box-shadow .18s ease;
    }
    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 22px 52px rgba(15, 23, 42, .10);
    }
    .stat-accent {
        height: 8px;
    }
    .stat-icon {
        width: 56px;
        height: 56px;
        border-radius: 18px;
        display: grid;
        place-items: center;
        color: #fff;
        box-shadow: 0 12px 24px rgba(0,0,0,.10);
    }
    .stat-label {
        color: #64748b;
        font-size: .9rem;
        font-weight: 600;
        letter-spacing: .01em;
    }
    .stat-value {
        font-size: 2rem;
        line-height: 1;
        font-weight: 800;
        letter-spacing: -.04em;
    }
    .panel-card {
        border: 1px solid rgba(15, 23, 42, .08);
        border-radius: 22px;
        box-shadow: 0 18px 40px rgba(15, 23, 42, .06);
        overflow: hidden;
    }
    .panel-header {
        background: #fff;
        border-bottom: 1px solid #eef2f7;
        padding: 18px 20px;
    }
    .panel-title {
        font-size: 1rem;
        font-weight: 800;
        letter-spacing: -.02em;
        margin-bottom: 3px;
    }
    .panel-title i {
        color: #1d4ed8;
        margin-right: 8px;
    }
    .panel-subtitle {
        color: #64748b;
        font-size: .88rem;
    }
    .soft-badge {
        border-radius: 999px;
        padding: .45rem .75rem;
        font-weight: 700;
        font-size: .82rem;
        background: #f1f5f9;
        color: #334155;
    }
    .list-item-modern {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 14px 0;
        border-bottom: 1px solid #eef2f7;
    }
    .list-item-modern:last-child { border-bottom: 0; padding-bottom: 0; }
    .list-icon {
        width: 42px;
        height: 42px;
        border-radius: 14px;
        display: grid;
        place-items: center;
        background: #eff6ff;
        color: #1d4ed8;
        flex: 0 0 42px;
    }
    .quick-btn {
        border-radius: 14px;
        padding: 12px 16px;
        font-weight: 700;
    }
    .section-label {
        color: #64748b;
        font-size: .82rem;
        font-weight: 700;
        letter-spacing: .12em;
        text-transform: uppercase;
    }
</style>

<div class="mb-4 dashboard-hero p-4 p-lg-4">
    <div class="d-flex flex-wrap justify-content-between align-items-start gap-4">
        <div>
            <div class="hero-chip mb-3">
                <i class="bi bi-speedometer2"></i>
                Dashboard Admin
            </div>
            <div class="title mb-3">Selamat datang di sistem pegawai</div>
            <div class="subtitle">
                Ringkasan operasional PT. TRASPAC Makmur Sejahtera untuk memantau pegawai, unit kerja, jabatan, dan distribusi data secara cepat.
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6 col-xl-3">
        <div class="stat-card h-100">
            <div class="stat-accent" style="background: linear-gradient(90deg, #0f172a, #1d4ed8);"></div>
            <div class="p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label mb-2"><i class="bi bi-people-fill me-2 text-primary"></i>Total Pegawai</div>
                        <div class="stat-value">{{ $totalPegawai }}</div>
                    </div>
                    <div class="stat-icon" style="background: linear-gradient(135deg, #0f172a, #1d4ed8);">
                        <i class="bi bi-people-fill fs-4"></i>
                    </div>
                </div>
                <div class="mt-3 text-secondary small">Seluruh data pegawai terdaftar di sistem</div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="stat-card h-100">
            <div class="stat-accent" style="background: linear-gradient(90deg, #0f766e, #14b8a6);"></div>
            <div class="p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label mb-2"><i class="bi bi-diagram-3-fill me-2 text-success"></i>Total Unit Kerja</div>
                        <div class="stat-value">{{ $totalUnitKerja }}</div>
                    </div>
                    <div class="stat-icon" style="background: linear-gradient(135deg, #0f766e, #14b8a6);">
                        <i class="bi bi-diagram-3-fill fs-4"></i>
                    </div>
                </div>
                <div class="mt-3 text-secondary small">Struktur unit kerja yang aktif</div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="stat-card h-100">
            <div class="stat-accent" style="background: linear-gradient(90deg, #7c3aed, #8b5cf6);"></div>
            <div class="p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label mb-2"><i class="bi bi-award-fill me-2 text-purple"></i>Total Jabatan</div>
                        <div class="stat-value">{{ $totalJabatan }}</div>
                    </div>
                    <div class="stat-icon" style="background: linear-gradient(135deg, #7c3aed, #8b5cf6);">
                        <i class="bi bi-award-fill fs-4"></i>
                    </div>
                </div>
                <div class="mt-3 text-secondary small">Jabatan yang digunakan dalam organisasi</div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="stat-card h-100">
            <div class="stat-accent" style="background: linear-gradient(90deg, #ca8a04, #f59e0b);"></div>
            <div class="p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label mb-2"><i class="bi bi-bar-chart-fill me-2 text-warning"></i>Gender Ratio</div>
                        <div class="stat-value">{{ $pegawaiL }} / {{ $pegawaiP }}</div>
                    </div>
                    <div class="stat-icon" style="background: linear-gradient(135deg, #ca8a04, #f59e0b);">
                        <i class="bi bi-bar-chart-fill fs-4"></i>
                    </div>
                </div>
                <div class="mt-3 text-secondary small">Laki-laki / Perempuan</div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="panel-card h-100 bg-white">
            <div class="panel-header d-flex justify-content-between align-items-center">
                <div>
                    <div class="panel-title"><i class="bi bi-clock-history"></i>Pegawai Terbaru</div>
                    <div class="panel-subtitle">5 data terakhir yang masuk ke sistem</div>
                </div>
                <a href="{{ route('pegawai.index') }}" class="btn btn-sm btn-outline-primary quick-btn">
                    Lihat semua
                </a>
            </div>
            <div class="p-4">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr class="text-secondary small">
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Unit Kerja</th>
                                <th>Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestPegawai as $p)
                                <tr>
                                    <td class="fw-semibold">{{ $p->nama }}</td>
                                    <td>{{ $p->jabatan?->nama ?? '-' }}</td>
                                    <td>{{ $p->unitKerja?->nama ?? '-' }}</td>
                                    <td>
                                        <span class="soft-badge">{{ $p->jenis_kelamin }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-secondary py-4">Belum ada data pegawai.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel-card bg-white mb-4">
            <div class="panel-header">
                <div class="panel-title"><i class="bi bi-building"></i>Unit Kerja Aktif</div>
                <div class="panel-subtitle">Unit kerja dengan jumlah pegawai terbanyak</div>
            </div>
            <div class="p-4">
                @forelse($unitKerja as $uk)
                    <div class="list-item-modern">
                        <div class="d-flex align-items-center gap-3">
                            <div class="list-icon">
                                <i class="bi bi-building"></i>
                            </div>
                            <div>
                                <div class="fw-semibold">{{ $uk->nama }}</div>
                                <div class="text-secondary small">Unit kerja organisasi</div>
                            </div>
                        </div>
                        <span class="soft-badge">{{ $uk->pegawai_count }}</span>
                    </div>
                @empty
                    <div class="text-secondary">Belum ada unit kerja.</div>
                @endforelse
            </div>
        </div>

        <div class="panel-card bg-white">
            <div class="panel-header">
                <div class="panel-title"><i class="bi bi-lightning-charge-fill"></i>Quick Action</div>
                <div class="panel-subtitle">Akses cepat ke fitur utama</div>
            </div>
            <div class="p-4 d-grid gap-2">
                <a href="{{ route('pegawai.create') }}" class="btn btn-primary quick-btn">
                    <i class="bi bi-plus-lg me-2"></i> Tambah Pegawai
                </a>
                <a href="{{ route('pegawai.print') }}" class="btn btn-outline-secondary quick-btn">
                    <i class="bi bi-printer me-2"></i> Print Data Pegawai
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
