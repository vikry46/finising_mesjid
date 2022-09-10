@extends('layouts.backend')

@section('title')
    Mesjid | {{ config('app.name') }}
@endsection

@section('title-page')
    Mesjid
@endsection

@section('bg-color')
    background-color:#8FD6E1;
@endsection

@section('breadcrumbs')
    Keuangan
@endsection

@section('content-header')
<center><h2 class="text-light">Form Tambah Keuangan Mesjid</h2></center>
@endsection

@section('content')
<div class="card mt-9">
    <div class="card-body">
        <form action="{{ route('mesjid.store') }}" method="post">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tgl">
                                Tanggal
                            </label>
                            <input type="date" id="tgl" name="tgl" value="{{ old('tgl') }}" class="form-control @error('tgl') is-invalid @enderror" placeholder="Masukan Tanggal Penulisan">
                            @error('tgl')
                                <div class="invalid-feedback">
                                    <span>
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_pengurus">Penulis</label>
                            <div class="form-group">
                                <select class="form-control @error('id_pengurus') is-invalid @enderror" id="id_pengurus" name="id_pengurus">
                                    <option>Pilih Penulis</option>
                                    @foreach ($pengurus as $field)
                                        <option value="{{ $field->id }}" {{ old('id_pengurus') == $field->id ? 'selected' : '' }}>{{ $field->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_pengurus')
                                    <div class="invalid-feedback">
                                        <span>
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                                 <label for="id_kegiatan">Kegiatan</label>
                                <div class="form-group">
                                    <select class="form-control @error('id_kegiatan') is-invalid @enderror" id="id_kegiatan" name="id_kegiatan">
                                        <option>Pilih Kegiatan</option>
                                        @foreach ($kegiatan as $field)
                                            <option value="{{ $field->id }}" {{ old('id_kegiatan') == $field->id ? 'selected' : '' }}>{{ $field->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_kegiatan')
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
                            <label for="pemasukan">
                                Pemasukan
                            </label>
                            <input type="text" id="pemasukan" name="pemasukan" class="form-control @error('pemasukan') is-invalid @enderror" placeholder="Tulisakan Pemasukan">
                            @error('pemasukan')
                                <div class="invalid-feedback">
                                    <span>
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pengeluaran">
                                Pengeluaran
                            </label>
                            <input type="text" id="pengeluaran" name="pengeluaran" class="form-control @error('pengeluaran') is-invalid @enderror" placeholder="Tuliskan Pengeluaran">
                            @error('pengeluaran')
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
                            <input type="text" id="keterangan" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukan Alasan ">
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    <span>
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="conatiner">
                <a href="{{ route('mesjid.index') }}" class="btn float-end" style="background-color:#8FD6E1; color:white;">Kembali</a>
                <button type="submit" class="btn btn-primary float-end mx-2">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
