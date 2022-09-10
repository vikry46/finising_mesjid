@extends('layouts.backend')

@section('title')
    Pengurus | {{ config('app.name') }}
@endsection

@section('title-page')
    Pengurus
@endsection

@section('breadcrumbs')
   Edit
@endsection

@section('bg-color')
    background-color:#541212;
@endsection

@section('content-header')
<center><h2 class="text-light">Form Edit Pengurus</h2></center>
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
        <form action="{{ route('pengurus.update', ['penguru' => $pengurus]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="container mt-3">
                        <label for="kode">
                                Kode Pengurus
                        </label>
                        <input type="text" id="kode" name="kode" value="{{ old('kode',$pengurus->kode) }}" class="form-control @error('kode') is-invalid @enderror" placeholder="Masukan Nomor Pengurus">
                        @error('kode')
                            <label style="color gold">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="container">
                        <label for="nama">
                                Nama Pengurus
                        </label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama',$pengurus->nama) }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama Pengurus">
                        @error('nama')
                            <label style="color gold">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="container">
                        <label for="no_hp">
                                Nomor Hp
                        </label>
                        <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp',$pengurus->no_hp) }}" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Masukan Jumlah Umur">
                        @error('no_hp')
                            <label style="color gold">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="container mt-3">
                        <label for="id_jabatan">Jabatan</label>
                        <div class="form-group">
                            <select class="form-control @error('id_jabatan') is-invalid @enderror" id="id_jabatan" name="id_jabatan">
                               <option>Pilih Jabatan</option>
                                @foreach ($jabatan as $item)
                                <option value="{{ $item->id }}" @if ($item->id == $pengurus->id_jabatan) selected @endif>{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('id_jabatan')
                                <label style="color: red">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="container">
                        <label for="umur">
                                Umur
                        </label>
                        <input type="text" id="umur" name="umur" value="{{ old('umur',$pengurus->umur) }}" class="form-control @error('umur') is-invalid @enderror" placeholder="Masukan Jumlah Umur">
                        @error('umur')
                            <label style="color gold">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="container">
                        <label for="select_jk" class="font-weight-bold"> Jenis Kelamin </label>

                        <select name="jk" id="select_jk" data-placeholder="" class="custom-select w-100 form-control @error('jk') is-invalid @enderror">
                            <option value="{{ old('jk', $pengurus->jk) }}">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" @if (old('jk', $pengurus->jk) == "Laki-laki") {{ 'selected' }} @endif>Laki laki</option>
                            <option value="Perempuan" @if (old('jk', $pengurus->jk) == "Perempuan") {{ 'selected' }} @endif>Perempuan</option>
                        </select>
                        @error('jk')
                        <span style="color :gold">
                        <strong>
                            {{ $message }}
                        </strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="container">
                    <label for="image">
                        Foto Karyawan
                    </label>
                    <input type="hidden" name="oldImage" value="{{ $pengurus->image}}">
                    @if($pengurus->image)
                    <img src="{{ asset('storage/' . $pengurus->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                        <input type="file" name="image"  value="{{ old('image', $pengurus->image) }}" class="form-control @error('image') is-invalid @enderror" id="image" onchange="previewImage()" >
                    @error('image')
                    <span style="color: gold">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="container">
            <a href="{{ route('pengurus.index') }}" class="btn float-end" style="background-color: #541212; color:white">Kembali</a>
            <button type="submit" class="btn btn-primary mx-2 float-end">Simpan</button>
            </form>
        </div>
    </div>

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

