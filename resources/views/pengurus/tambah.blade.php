@extends('layouts.backend')

@section('title')
    Pengurus | {{ config('app.name') }}
@endsection

@section('title-page')
    Pengurus
@endsection

@section('breadcrumbs')
   Tambah
@endsection

@section('bg-color')
    background-color:#541212;
@endsection


@section('content-header')
<center><h2 class="text-light">Form Tambah Pengurus</h2></center>
<div class="row justify-content-center">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mt-5">
        @can('jabatan_show')
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
      @endcan
    </div>
</div>
@endsection

@section('content')
    <div class="card" style="background-color: #EAF6F6">
        <form action="{{ route('pengurus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="container mt-3">
                        <label for="kode">
                                Kode Pengurus
                        </label>
                        <input type="text" id="kode" name="kode" value="{{ old('kode') }}" class="form-control @error('kode') is-invalid @enderror" placeholder="Masukan Nomor Pengurus">
                       @error('kode')
                           <div class="invalid-feedback">
                                <span>
                                    {{ $message }}
                                </span>
                           </div>
                       @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="container">
                        <label for="nama">
                                Nama Pengurus
                        </label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama Pengurus">
                        @error('nama')
                            <div class="invalid-feedback">
                                <span>
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="container">
                        <label for="no_hp">
                                Nomor Hp
                        </label>
                        <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Masukan Jumlah Umur">
                        @error('no_hp')
                            <div class="invalid-feedback">
                                <span>
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="container mt-3">
                         <label for="id_jabatan">Jabatan</label>
                        <div class="form-group">
                            <select id="id_jabatan" name="id_jabatan" class="form-control @error('id_jabatan') is-invalid @enderror">
                                <option>Pilih Jabatan</option>
                                @foreach ($jabatan as $field)
                                    <option value="{{ $field->id }}" {{ old('id_jabatan') == $field->id ? 'selected' : '' }}>{{ $field->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('id_jabatan')
                                <div class="invalid-feedback">
                                    <span>
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="container">
                        <label for="umur">
                                Umur
                        </label>
                        <input type="text" id="umur" name="umur" value="{{ old('umur') }}" class="form-control @error('umur') is-invalid @enderror" placeholder="Masukan Jumlah Umur">
                        @error('umur')
                            <div class="invalid-feedback">
                                <span>
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="container">
                        <label for="select_jk" class="font-weight-bold"> Jenis Kelamin </label>
                        <select name="jk" id="select_jk" data-placeholder="" class="custom-select w-100 form-control @error('jk') is-invalid @enderror">
                            <option value="{{ old('jk') }}">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" @if (old('jk') == "Laki-laki") {{ 'selected' }} @endif>Laki laki</option>
                            <option value="Perempuan" @if (old('jk') == "Perempuan") {{ 'selected' }} @endif>Perempuan</option>
                        </select>
                    @error('jk')
                        <div class="invalid-feedback">
                            <span>
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>
            </div>
        </div>
            <div class="form-group">
                <div class="container">
                        <label for="image">
                            Foto Karyawan
                        </label>

                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input type="file" name="image" type="file" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror" id="image" onchange="previewImage()" >
                    @error('image')
                    <div class="invalid-feedback">
                        <span>
                            {{ $message }}
                        </span>
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="container">
            <a href="{{ route('pengurus.index') }}" class="btn float-end" style="background-color: #541212; color:white">Kembali</a>
            <button type="submit" class="btn btn-primary float-end mx-2">Simpan</button>
        </div>
    </form>

    <script>
            function previewImage()
    {
        const foto = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
    </script>
@endsection
