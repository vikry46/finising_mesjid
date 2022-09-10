@extends('layouts.backend')

@section('title')
    Jenis Kegiatan | {{ config('app.name') }}
@endsection

@section('title-page')
    Jenis kegiatan
@endsection

@section('bg-color')
    background-color:#7D1935;
@endsection

@section('breadcrumbs')
    Jenis Kegiatan
@endsection

@section('content-header')
<center><h2 class="text-light">Form Tambah Jenis Kegiatan</h2></center>
@endsection

@section('content')
<div class="card mt-9">
    <div class="card-body">
        <form action="{{ route('jeniskegiatan.store') }}" method="post">
            @csrf
            <div class="container">
                <div class="form-group">
                    <label for="jenis_kegiatan">
                        Jenis Kegiatan
                    </label>
                    <input type="text" id="kode" name="jenis_kegiatan" value="{{ old('jenis_kegiatan') }}" class="form-control @error('jenis_kegiatan') is-invalid @enderror" placeholder="Masukan Jenis Kegiatan">
                    @error('jenis_kegiatan')
                        <div class="invalid-feedback">
                            <span>
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>

            </div>
            <div class="container">
                <a href="{{ route('jeniskegiatan.index') }}" class="btn btn-dark float-end" style="background-color:#7D1935; color:white">Kembali</a>
                <button type="submit" class="btn btn-primary float-end mx-2">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
