<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="pegawai-form">
    @csrf
    @method($method)

    <style>
        .pegawai-form .form-card {
            border: 1px solid rgba(15, 23, 42, .08);
            border-radius: 20px;
            box-shadow: 0 14px 34px rgba(15, 23, 42, .05);
            background: #fff;
        }
        .pegawai-form .section-title {
            font-size: .88rem;
            font-weight: 800;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #64748b;
            margin-bottom: 14px;
        }
        .pegawai-form .form-control,
        .pegawai-form .form-select {
            border-radius: 14px;
            border-color: #dbe3ee;
            box-shadow: none !important;
            padding-top: .75rem;
            padding-bottom: .75rem;
        }
        .pegawai-form .form-control:focus,
        .pegawai-form .form-select:focus {
            border-color: rgba(29, 78, 216, .45);
            box-shadow: 0 0 0 .2rem rgba(29, 78, 216, .08) !important;
        }
        .pegawai-form .label {
            font-size: .9rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: .4rem;
        }
        .pegawai-form .help-text {
            font-size: .82rem;
            color: #94a3b8;
        }
        .pegawai-form .avatar-preview {
            width: 96px;
            height: 96px;
            border-radius: 18px;
            object-fit: cover;
            border: 1px solid #dbe3ee;
            background: #f8fafc;
        }
        .pegawai-form .upload-box {
            border: 1px dashed #cbd5e1;
            border-radius: 16px;
            background: #f8fafc;
            padding: 14px;
        }
        .pegawai-form .action-row {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .pegawai-form .action-row .btn {
            min-width: 140px;
            border-radius: 14px;
            padding: .75rem 1rem;
            font-weight: 700;
        }
    </style>

    <div class="form-card p-4 p-lg-5">
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
            <div>
                <div class="section-title">{{ isset($pegawai) ? 'Edit Pegawai' : 'Tambah Pegawai' }}</div>
                <h4 class="mb-1 fw-bold">{{ isset($pegawai) ? 'Perbarui data pegawai' : 'Isi data pegawai baru' }}</h4>
                <div class="text-secondary">Lengkapi data inti secara ringkas dan jelas.</div>
            </div>
            @if(!empty($pegawai?->foto))
                <img src="{{ asset('storage/' . $pegawai->foto) }}" alt="{{ $pegawai->nama }}" class="avatar-preview">
            @endif
        </div>

        <div class="row g-3">
            <div class="col-lg-4">
                <label class="label">NIP</label>
                <input name="nip" class="form-control" value="{{ old('nip', $pegawai->nip ?? '') }}" placeholder="Masukkan NIP" required>
            </div>
            <div class="col-lg-4">
                <label class="label">Nama</label>
                <input name="nama" class="form-control" value="{{ old('nama', $pegawai->nama ?? '') }}" placeholder="Masukkan nama" required>
            </div>
            <div class="col-lg-4">
                <label class="label">Tempat Lahir</label>
                <input name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $pegawai->tempat_lahir ?? '') }}" placeholder="Tempat lahir" required>
            </div>

            <div class="col-lg-4">
                <label class="label">Tgl Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" value="{{ old('tgl_lahir', isset($pegawai) ? optional($pegawai->tgl_lahir)->format('Y-m-d') : '') }}" required>
            </div>
            <div class="col-lg-4">
                <label class="label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" required>
                    <option value="">Pilih jenis kelamin</option>
                    <option value="L" @selected(old('jenis_kelamin', $pegawai->jenis_kelamin ?? '') === 'L')>L</option>
                    <option value="P" @selected(old('jenis_kelamin', $pegawai->jenis_kelamin ?? '') === 'P')>P</option>
                </select>
            </div>
            <div class="col-lg-4">
                <label class="label">Agama</label>
                <select name="agama_id" class="form-select" required>
                    <option value="">Pilih agama</option>
                    @foreach($agama as $a)
                        <option value="{{ $a->id }}" @selected(old('agama_id', $pegawai->agama_id ?? '') == $a->id)>{{ $a->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-4">
                <label class="label">Golongan</label>
                <select name="golongan_id" class="form-select" required>
                    <option value="">Pilih golongan</option>
                    @foreach($golongan as $g)
                        <option value="{{ $g->id }}" @selected(old('golongan_id', $pegawai->golongan_id ?? '') == $g->id)>{{ $g->kode }} - {{ $g->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4">
                <label class="label">Eselon</label>
                <select name="eselon_id" class="form-select" required>
                    <option value="">Pilih eselon</option>
                    @foreach($eselon as $e)
                        <option value="{{ $e->id }}" @selected(old('eselon_id', $pegawai->eselon_id ?? '') == $e->id)>{{ $e->kode }} - {{ $e->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4">
                <label class="label">Jabatan</label>
                <select name="jabatan_id" class="form-select" required>
                    <option value="">Pilih jabatan</option>
                    @foreach($jabatan as $j)
                        <option value="{{ $j->id }}" @selected(old('jabatan_id', $pegawai->jabatan_id ?? '') == $j->id)>{{ $j->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-4">
                <label class="label">Unit Kerja</label>
                <select name="unit_kerja_id" class="form-select" required>
                    <option value="">Pilih unit kerja</option>
                    @foreach($unitKerja as $u)
                        <option value="{{ $u->id }}" @selected(old('unit_kerja_id', $pegawai->unit_kerja_id ?? '') == $u->id)>{{ $u->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4">
                <label class="label">Tempat Tugas</label>
                <input name="tempat_tugas" class="form-control" value="{{ old('tempat_tugas', $pegawai->tempat_tugas ?? '') }}" placeholder="Tempat tugas" required>
            </div>
            <div class="col-lg-4">
                <label class="label">No HP</label>
                <input name="no_hp" class="form-control" value="{{ old('no_hp', $pegawai->no_hp ?? '') }}" placeholder="Nomor HP" required>
            </div>

            <div class="col-lg-6">
                <label class="label">NPWP</label>
                <input name="npwp" class="form-control" value="{{ old('npwp', $pegawai->npwp ?? '') }}" placeholder="NPWP">
            </div>
            <div class="col-lg-6">
                <label class="label">Foto</label>
                <div class="upload-box">
                    <input type="file" name="foto" id="fotoInput" class="form-control" accept="image/*" {{ isset($pegawai) ? '' : 'required' }}>
                    <div class="d-flex align-items-center gap-3 mt-3">
                        <img
                            id="fotoPreview"
                            src="{{ !empty($pegawai?->foto) ? asset('storage/' . $pegawai->foto) : 'https://placehold.co/96x96/e2e8f0/64748b?text=Foto' }}"
                            alt="Preview foto"
                            class="avatar-preview"
                        >
                        <div>
                            <div class="fw-semibold">Preview foto</div>
                            <div class="help-text">Pilih gambar untuk melihat hasilnya sebelum disimpan.</div>
                            <div class="help-text mt-1">Format JPG, JPEG, PNG, atau WEBP.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label class="label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="4" placeholder="Alamat lengkap" required>{{ old('alamat', $pegawai->alamat ?? '') }}</textarea>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-4">
            <div class="help-text">Pastikan data yang diisi sudah benar sebelum disimpan.</div>
            <div class="action-row">
                <a href="{{ route('pegawai.index') }}" class="btn btn-outline-secondary">Kembali</a>
                <button class="btn btn-primary">{{ isset($pegawai) ? 'Simpan Perubahan' : 'Simpan Data' }}</button>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
    const fotoInput = document.getElementById('fotoInput');
    const fotoPreview = document.getElementById('fotoPreview');

    if (fotoInput && fotoPreview) {
        fotoInput.addEventListener('change', function () {
            const file = this.files && this.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                fotoPreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        });
    }
</script>
@endpush
