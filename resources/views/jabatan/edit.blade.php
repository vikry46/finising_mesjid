@extends('layouts.backend')

@section('title')
    Jabatan | {{ config('app.name') }}
@endsection

@section('title-page')
    Jabatan
@endsection

@section('breadcrumbs')
   Edit
@endsection

@section('bg-color')
    background-color:#1E5128;
@endsection

@section('content-header')
<center><h2 class="text-light">Form Edit Jabatan</h2></center>
<div class="row justify-content-center">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mt-5">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <a href="{{ route('jabatan.index') }}">
                <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Jabatan</p>
                    <h5 class="font-weight-bolder">
                      موقع
                    </h5>
                </div>
              </a>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('content')
<div class="card " style="background-color: #EAF6F6">
    <div class="card-body">
        <form action="{{ route('jabatan.update',['jabatan'=>$jabatan]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <div class="container mt-3">
                        <label for="nama_kategori">
                            Nama Jabatan
                        </label>
                        <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori',$jabatan->nama_kategori) }}" class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="Masukan Nama Kategori">
                        @error('nama_kategori')
                            <div class="invalid-feedback">
                                <span>
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <a href="{{ route('jabatan.index') }}" class="btn float-end" style="background-color: #1E5128; color:white">Kembali</a>
            <button type="submit" class="btn btn-primary float-end mx-2">Edit</button>
        </form>
    </div>
</div>
@endsection
