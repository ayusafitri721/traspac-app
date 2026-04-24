@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <div class="text-uppercase text-secondary fw-bold small mb-1" style="letter-spacing:.08em;">Detail Pegawai</div>
                <h3 class="fw-bold mb-0">{{ $pegawai->nama }}</h3>
                <div class="text-secondary">Informasi lengkap data pegawai dalam sistem.</div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('pegawai.edit', $pegawai) }}" class="btn btn-warning">
                    <i class="bi bi-pencil-fill me-1"></i> Edit
                </a>
                <a href="{{ route('pegawai.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        @if($pegawai->foto)
                            <img src="{{ asset('storage/' . $pegawai->foto) }}" alt="{{ $pegawai->nama }}" class="rounded-circle object-fit-cover mb-3" style="width:160px;height:160px;">
                        @else
                            <div class="rounded-circle bg-light mx-auto mb-3 d-flex align-items-center justify-content-center text-secondary" style="width:160px;height:160px;">
                                <i class="bi bi-person-fill" style="font-size:4rem;"></i>
                            </div>
                        @endif
                        <h4 class="fw-bold mb-1">{{ $pegawai->nama }}</h4>
                        <div class="text-secondary mb-3">{{ $pegawai->jabatan?->nama ?? '-' }}</div>
                        <div class="d-flex justify-content-center gap-2 flex-wrap">
                            <span class="badge text-bg-primary">NIP: {{ $pegawai->nip }}</span>
                            <span class="badge text-bg-light text-dark">Gender: {{ $pegawai->jenis_kelamin }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="text-secondary small">NIP</div>
                                <div class="fw-semibold">{{ $pegawai->nip }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-secondary small">Nama</div>
                                <div class="fw-semibold">{{ $pegawai->nama }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-secondary small">Tempat, Tanggal Lahir</div>
                                <div class="fw-semibold">{{ $pegawai->tempat_lahir }}, {{ $pegawai->tgl_lahir?->format('d-m-Y') }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-secondary small">Jenis Kelamin</div>
                                <div class="fw-semibold">{{ $pegawai->jenis_kelamin }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-secondary small">Agama</div>
                                <div class="fw-semibold">{{ $pegawai->agama?->nama ?? '-' }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-secondary small">Golongan</div>
                                <div class="fw-semibold">{{ $pegawai->golongan?->kode ? $pegawai->golongan->kode.' - '.$pegawai->golongan->nama : '-' }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-secondary small">Eselon</div>
                                <div class="fw-semibold">{{ $pegawai->eselon?->kode ? $pegawai->eselon->kode.' - '.$pegawai->eselon->nama : '-' }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-secondary small">Jabatan</div>
                                <div class="fw-semibold">{{ $pegawai->jabatan?->nama ?? '-' }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-secondary small">Unit Kerja</div>
                                <div class="fw-semibold">{{ $pegawai->unitKerja?->nama ?? '-' }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-secondary small">Tempat Tugas</div>
                                <div class="fw-semibold">{{ $pegawai->tempat_tugas }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-secondary small">No HP</div>
                                <div class="fw-semibold">{{ $pegawai->no_hp }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-secondary small">NPWP</div>
                                <div class="fw-semibold">{{ $pegawai->npwp ?: '-' }}</div>
                            </div>
                            <div class="col-12">
                                <div class="text-secondary small">Alamat</div>
                                <div class="fw-semibold">{{ $pegawai->alamat }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
