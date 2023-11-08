@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="pt-8 max-w-[600px]">
            <p>Dari  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $surat->pengirim->name }}</p>
            <p>Untuk &nbsp; : {{ $surat->penerima->name }}</p>
            <p class="font-semibold text-2xl pb-4">{{ $surat->judul }}</p>
            <p >{{ $surat->isi }}</p>
            @if ($surat->file_pendukung)
            <a href="{{ route('surat.download', ['name' => $surat->file_pendukung ]) }}">
                <div class="pt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="100" height="100" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                          </svg>
                          &nbsp;
                        Document
                    </div>
                </div>
            </a>
            @endif
            
        </div>
    </div>
@endsection