@extends('layout.app')
@section('title', 'Hasil Pencarian')
@section('konten')
    <h1 class="text-2xl">Hasil Pencarian</h1>
    {{-- <p>Hasil pencarian untuk kata <strong>"{{ $results }}"</strong></p>     --}}
    <ul>    
        @forelse ($results as $result)
        <li>
            <a href="{{ route('kata.getById', $result->id_kata) }}" class="font-medium text-blue-600 hover:underline">
            {{ $result->gorontalo }} - {{ $result->indonesia }}
            </a>
        </li>
        @empty
            <li>Tidak ada hasil pencarian.</li>
        @endforelse
    </ul>
@endsection