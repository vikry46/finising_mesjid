@extends('layouts.backend')

@section('title')
    Lacon | {{ config('app.name') }}
@endsection

@section('title-page')
    Pengisi Acara
@endsection

@section('bg-color')
    background-color:#787A91;
@endsection

@section('breadcrumbs')
    Jenis Kegiatan
@endsection

@section('content-header')
<center><h2 class="text-light">Form Tambah Lacon</h2></center>
@endsection

@section('content')
<div class="card mt-9" style="background-color: #EAF6F6">
    <div class="card-body">
        <form action="{{ route('lacon.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="form-group">
                    <label for="nama">
                        Nama
                    </label>
                    <input type="text" id="kode" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama">
                    @error('nama')
                        <div class="invalid-feedback">
                            <span>
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">
                        Alamat
                    </label>
                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukan Alamat">
                    @error('alamat')
                        <div class="invalid-feedback">
                            <span>
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="keterangan">
                        Keterangan
                    </label>
                    <textarea name="keterangan" id="keterangan" cols="30" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">
                            <span>
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="container">
                <a href="{{ route('lacon.index') }}" class="btn float-end" style="background-color:#787A91 ; color:white;">Kembali</a>
                <button type="submit" class="btn btn-primary float-end mx-2">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
