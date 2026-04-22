<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)
    <div class="row g-3">
        <div class="col-md-4"><label class="form-label">NIP</label><input name="nip" class="form-control" value="{{ old('nip', $pegawai->nip ?? '') }}" required></div>
        <div class="col-md-4"><label class="form-label">Nama</label><input name="nama" class="form-control" value="{{ old('nama', $pegawai->nama ?? '') }}" required></div>
        <div class="col-md-4"><label class="form-label">Tempat Lahir</label><input name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $pegawai->tempat_lahir ?? '') }}" required></div>
        <div class="col-md-4"><label class="form-label">Tgl Lahir</label><input type="date" name="tgl_lahir" class="form-control" value="{{ old('tgl_lahir', isset($pegawai) ? optional($pegawai->tgl_lahir)->format('Y-m-d') : '') }}" required></div>
        <div class="col-md-4">
            <label class="form-label d-block">Jenis Kelamin</label>
            <label class="me-3"><input type="radio" name="jenis_kelamin" value="L" @checked(old('jenis_kelamin', $pegawai->jenis_kelamin ?? '') === 'L')> L</label>
            <label><input type="radio" name="jenis_kelamin" value="P" @checked(old('jenis_kelamin', $pegawai->jenis_kelamin ?? '') === 'P')> P</label>
        </div>
        <div class="col-md-4"><label class="form-label">Agama</label><select name="agama_id" class="form-select" required>@foreach($agama as $a)<option value="{{ $a->id }}" @selected(old('agama_id', $pegawai->agama_id ?? '') == $a->id)>{{ $a->nama }}</option>@endforeach</select></div>
        <div class="col-md-4"><label class="form-label">Golongan</label><select name="golongan_id" class="form-select" required>@foreach($golongan as $g)<option value="{{ $g->id }}" @selected(old('golongan_id', $pegawai->golongan_id ?? '') == $g->id)>{{ $g->kode }} - {{ $g->nama }}</option>@endforeach</select></div>
        <div class="col-md-4"><label class="form-label">Eselon</label><select name="eselon_id" class="form-select" required>@foreach($eselon as $e)<option value="{{ $e->id }}" @selected(old('eselon_id', $pegawai->eselon_id ?? '') == $e->id)>{{ $e->kode }} - {{ $e->nama }}</option>@endforeach</select></div>
        <div class="col-md-4"><label class="form-label">Jabatan</label><select name="jabatan_id" class="form-select" required>@foreach($jabatan as $j)<option value="{{ $j->id }}" @selected(old('jabatan_id', $pegawai->jabatan_id ?? '') == $j->id)>{{ $j->nama }}</option>@endforeach</select></div>
        <div class="col-md-4"><label class="form-label">Unit Kerja</label><select name="unit_kerja_id" class="form-select" required>@foreach($unitKerja as $u)<option value="{{ $u->id }}" @selected(old('unit_kerja_id', $pegawai->unit_kerja_id ?? '') == $u->id)>{{ $u->nama }}</option>@endforeach</select></div>
        <div class="col-md-4"><label class="form-label">Tempat Tugas</label><input name="tempat_tugas" class="form-control" value="{{ old('tempat_tugas', $pegawai->tempat_tugas ?? '') }}" required></div>
        <div class="col-md-4"><label class="form-label">No HP</label><input name="no_hp" class="form-control" value="{{ old('no_hp', $pegawai->no_hp ?? '') }}" required></div>
        <div class="col-md-4"><label class="form-label">NPWP</label><input name="npwp" class="form-control" value="{{ old('npwp', $pegawai->npwp ?? '') }}"></div>
        <div class="col-12"><label class="form-label">Alamat</label><textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $pegawai->alamat ?? '') }}</textarea></div>
        <div class="col-md-4"><label class="form-label">Foto</label><input type="file" name="foto" class="form-control" {{ isset($pegawai) ? '' : 'required' }}></div>
        @if(!empty($pegawai?->foto))
            <div class="col-md-4"><label class="form-label d-block">Foto Saat Ini</label><img src="{{ asset('storage/' . $pegawai->foto) }}" class="img-thumbnail" style="max-height:140px"></div>
        @endif
        <div class="col-12">
            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</form>
