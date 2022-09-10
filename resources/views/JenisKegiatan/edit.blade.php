@extends('layouts.backend')

@section('title')
    Jenis Kegiatan | {{ config('app.name') }}
@endsection

@section('title-page')
    Jenis  Kegiatan
@endsection

@section('breadcrumbs')
   Edit
@endsection

@section('bg-color')
    background-color:#7D1935;
@endsection

@section('content-header')
<center><h2 class="text-light">Form Edit Jenis Kegiatan</h2></center>
@endsection

@section('content')
<div class="card mt-9">
    <form action="{{ route('jeniskegiatan.update',['jeniskegiatan' => $deldel]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="container">
            <div class="form-group">
                <label for="jenis_kegiatan">

                </label>
                <input type="text" id="kode" name="jenis_kegiatan" value="{{ old('jenis_kegiatan',$deldel->jenis_kegiatan) }}" class="form-control @error('jenis_kegiatan') is-invalid @enderror" placeholder="Masukan Jenis kegiatan">
                @error('jenis_kegiatan')
                    <label style="color gold">{{ $message }}</label>
                @enderror
            </div>
        </div>
       <div class="container">
        <a href="{{ route('jeniskegiatan.index') }}" class="btn btn-dark float-end" style="background-color:#7D1935; color:white">Kembali</a>
        <button type="submit" class="btn btn-primary float-end mx-2">Edit</button>
       </div>
    </form>
</div>
@endsection
