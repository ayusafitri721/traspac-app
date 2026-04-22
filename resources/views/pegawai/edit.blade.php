@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h4>Edit Pegawai</h4>
        @include('pegawai.form', ['action' => route('pegawai.update', $pegawai), 'method' => 'PUT', 'pegawai' => $pegawai])
    </div>
</div>
@endsection
