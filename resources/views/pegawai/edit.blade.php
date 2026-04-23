@extends('layouts.app')

@section('content')
    @include('pegawai.form', ['action' => route('pegawai.update', $pegawai), 'method' => 'PUT', 'pegawai' => $pegawai])
@endsection
