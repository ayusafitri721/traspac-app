@extends('layouts.app')

@section('content')
<div class="pegawai-page">
    <style>
        .pegawai-page i,
        .pegawai-page .bi,
        .pegawai-page svg {
            display: none !important;
        }
        .page-hero {
            border-radius: 22px;
            background: linear-gradient(135deg, #0f172a 0%, #102a43 55%, #1d4ed8 100%);
            color: #fff;
            box-shadow: 0 18px 40px rgba(15, 23, 42, .10);
        }
        .page-title {
            font-size: clamp(1.4rem, 2.5vw, 2rem);
            font-weight: 800;
            letter-spacing: -.03em;
            line-height: 1.1;
        }
        .page-subtitle {
            color: rgba(255,255,255,.76);
            max-width: 60ch;
            line-height: 1.7;
        }
        .summary-card {
            border: 1px solid rgba(15, 23, 42, .08);
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 12px 30px rgba(15, 23, 42, .05);
        }
        .summary-label {
            color: #64748b;
            font-size: .84rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .08em;
        }
        .summary-value {
            font-size: 1.6rem;
            font-weight: 800;
            letter-spacing: -.03em;
        }
        .filter-card {
            border: 1px solid rgba(15, 23, 42, .08);
            border-radius: 20px;
            box-shadow: 0 14px 34px rgba(15, 23, 42, .05);
        }
        .filter-title {
            font-size: 1rem;
            font-weight: 800;
            letter-spacing: -.02em;
        }
        .form-control, .form-select {
            border-radius: 14px;
            border-color: #dbe3ee;
            padding-top: .75rem;
            padding-bottom: .75rem;
            box-shadow: none !important;
        }
        .form-control:focus, .form-select:focus {
            border-color: rgba(29, 78, 216, .45);
            box-shadow: 0 0 0 .2rem rgba(29, 78, 216, .08) !important;
        }
        .table-card {
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(15, 23, 42, .08);
            box-shadow: 0 18px 40px rgba(15, 23, 42, .05);
        }
        .table thead th {
            background: #f8fafc;
            color: #334155;
            font-size: .8rem;
            text-transform: uppercase;
            letter-spacing: .06em;
            border-bottom: 1px solid #e5ebf2 !important;
            white-space: nowrap;
        }
        .table tbody td {
            vertical-align: middle;
            white-space: nowrap;
        }
        .soft-pill {
            display: inline-flex;
            align-items: center;
            padding: .38rem .7rem;
            border-radius: 999px;
            background: #eef4ff;
            color: #1d4ed8;
            font-size: .84rem;
            font-weight: 700;
        }
        .action-btn {
            border-radius: 12px;
            font-weight: 700;
            padding: .45rem .7rem;
        }
        .icon-dot {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.14);
        }
        .toolbar {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
    </style>

    <div class="page-hero p-4 p-lg-4 mb-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-4">
            <div class="d-flex align-items-center gap-3">
                <div>
                    <div class="page-title">Data Pegawai</div>
                    <div class="page-subtitle">
                        Kelola, cari, filter, dan cetak data pegawai secara cepat dalam satu tampilan yang rapi.
                    </div>
                </div>
            </div>
            <div class="toolbar">
                <a href="{{ route('pegawai.create') }}" class="btn btn-light action-btn">
                    Tambah Pegawai
                </a>
                <a href="{{ route('pegawai.print', request()->query()) }}" class="btn btn-outline-light action-btn">
                    Print
                </a>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="summary-card p-3">
                <div class="summary-label">Total Pegawai</div>
                <div class="summary-value">{{ $pegawai->total() }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="summary-card p-3">
                <div class="summary-label">Unit Kerja Tersedia</div>
                <div class="summary-value">{{ $unitKerja->count() }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="summary-card p-3">
                <div class="summary-label">Data Ditampilkan</div>
                <div class="summary-value">{{ $pegawai->count() }}</div>
            </div>
        </div>
    </div>

    <form class="filter-card bg-white p-3 p-lg-4 mb-4" method="GET">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
            <div>
                <div class="filter-title">Filter & Pencarian</div>
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <div class="col-lg-4">
                <label class="form-label mb-1 small text-secondary">Cari</label>
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Nama, NIP, atau jabatan" value="{{ request('search') }}">
            </div>
            <div class="col-lg-3">
                <label class="form-label mb-1 small text-secondary">Unit Kerja</label>
                <select name="unit_kerja_id" class="form-select form-select-sm">
                    <option value="">Semua Unit Kerja</option>
                    @foreach($unitKerja as $uk)
                        <option value="{{ $uk->id }}" @selected(request('unit_kerja_id') == $uk->id)>{{ $uk->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-3">
                <label class="form-label mb-1 small text-secondary">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select form-select-sm">
                    <option value="">Semua</option>
                    <option value="L" @selected($selectedJenisKelamin === 'L')>L</option>
                    <option value="P" @selected($selectedJenisKelamin === 'P')>P</option>
                </select>
            </div>
            <div class="col-lg-2 pt-2 pt-lg-3">
                <div class="d-flex gap-2">
                    <button class="btn btn-dark btn-sm flex-fill py-2">Terapkan</button>
                    <a href="{{ route('pegawai.index') }}" class="btn btn-outline-secondary btn-sm flex-fill py-2">Reset</a>
                </div>
            </div>
        </div>
    </form>

    <div class="table-card bg-white">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>No</th><th>Profil</th><th>NIP</th><th>Nama</th><th>Tempat Lahir</th><th>Tgl Lahir</th><th>L/P</th>
                        <th>Gol</th><th>Eselon</th><th>Jabatan</th><th>Tempat Tugas</th><th>Agama</th>
                        <th>Unit Kerja</th><th>No HP</th><th>NPWP</th><th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($pegawai as $i => $p)
                    <tr>
                        <td>{{ $pegawai->firstItem() + $i }}</td>
                        <td>
                            @if($p->foto)
                                <img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama }}" class="rounded-circle object-fit-cover" style="width:42px;height:42px;">
                            @else
                                <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center text-secondary" style="width:42px;height:42px;">
                                    <span class="small fw-semibold">-</span>
                                </div>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $p->nip }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->tempat_lahir }}</td>
                        <td>{{ $p->tgl_lahir?->format('d-m-Y') }}</td>
                        <td><span class="soft-pill">{{ $p->jenis_kelamin }}</span></td>
                        <td>{{ $p->golongan?->kode }}</td>
                        <td>{{ $p->eselon?->kode }}</td>
                        <td>{{ $p->jabatan?->nama }}</td>
                        <td>{{ $p->tempat_tugas }}</td>
                        <td>{{ $p->agama?->nama }}</td>
                        <td>{{ $p->unitKerja?->nama }}</td>
                        <td>{{ $p->no_hp }}</td>
                        <td>{{ $p->npwp }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('pegawai.edit', $p) }}" class="btn btn-sm btn-warning action-btn">Edit</a>
                            <form action="{{ route('pegawai.destroy', $p) }}" method="POST" class="d-inline form-delete">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger action-btn">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="16" class="text-center text-secondary py-5">
                            Belum ada data pegawai.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-3 border-top d-flex justify-content-end">
            {{ $pegawai->links('pagination.custom') }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.form-delete').forEach(form => {
    form.addEventListener('submit', e => {
        e.preventDefault();
        Swal.fire({
            title: 'Hapus data?',
            text: 'Data pegawai dan foto akan dihapus.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus',
            confirmButtonColor: '#102a43'
        }).then(r => {
            if (r.isConfirmed) form.submit();
        });
    });
});
</script>
@endpush
