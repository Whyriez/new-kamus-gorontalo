@extends('layout.app')
@section('title', 'Detail Kata')
@section('konten')

    {{ $kata->gorontalo }}
    {{ $kata->indonesia }}
    {{ $kata->kalimat }}
    {{ $kata->kategori }}
    {{ $kata->pengucapan }}

@endsection