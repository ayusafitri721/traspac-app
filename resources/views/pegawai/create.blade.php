@extends('layouts.app')

@section('content')
    @include('pegawai.form', ['action' => route('pegawai.store'), 'method' => 'POST', 'pegawai' => null])
@endsection
