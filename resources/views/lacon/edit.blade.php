@extends('layouts.backend')

@section('title')
    Lacon | {{ config('app.name') }}
@endsection

@section('title-page')
    Lacon
@endsection

@section('breadcrumbs')
   Edit
@endsection

@section('bg-color')
    background-color:#787A91;
@endsection

@section('content-header')
<center><h2 class="text-light">Form Edit Pengisi Acara</h2></center>
@endsection

@section('content')
<div class="card mt-9" style="background-color: #EAF6F6">
    <form action="{{ route('lacon.update',['lacon' => $lacon]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="container mt-3">
            <div class="form-group">
                <label for="nama">
                    Nama Pengisi Acara
                </label>
                <input type="text" id="kode" name="nama" value="{{ old('nama',$lacon->nama) }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama">
                @error('nama')
                    <label style="color gold">{{ $message }}</label>
                @enderror
            </div>

            <div class="form-group">
                <label for="alamat">
                    Alamat Pengisi Acara
                </label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat',$lacon->alamat) }}" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukan Alamat">
                @error('alamat')
                    <label style="color gold">{{ $message }}</label>
                @enderror
            </div>

            <div class="form-group">
                <label for="keterangan">
                    Keterangan
                </label>
                <textarea name="keterangan" id="keterangan" cols="30" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan',$lacon->keterangan) }}</textarea>

                @error('keterangan')
                    <label style="color gold">{{ $message }}</label>
                @enderror
            </div>

        </div>
        <div class="container">
            <a href="{{ route('lacon.index') }}" class="btn float-end" style="background-color: #7D1935; color:white;">Kembali</a>
            <button type="submit" class="btn btn-primary float-end mx-2">Simpan</button>
        </div>
    </form>
</div>
@endsection
