@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h4>Tambah Pegawai</h4>
        @include('pegawai.form', ['action' => route('pegawai.store'), 'method' => 'POST', 'pegawai' => null])
    </div>
</div>
@endsection
