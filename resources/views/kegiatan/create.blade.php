@extends('layouts.backend')

@section('title')
    Jadwal Kegiatan | {{ config('app.name') }}
@endsection

@section('title-page')
    Jadwal Kegiatan
@endsection

@section('bg-color')
    background-color:#2B4865;
@endsection

@section('breadcrumbs')
    Kegiatan
@endsection

@section('content-header')
<center><h2 class="text-light">Form Jadwal Kegiatan</h2></center>

<div class="card mt-10" style="background-color: #EAF6F6">
    <form action="{{ route('kegiatan.store') }}" method="post">
        @csrf
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tgl">
                            Tanggal Mulai
                        </label>
                        <input type="date" id="tgl_mulai" name="tgl_mulai" value="{{ old('tgl_mulai') }}" class="form-control @error('tgl_mulai') is-invalid @enderror" placeholder="Masukan Tanggal Penulisan">
                        @error('tgl_mulai')
                             <div class="invalid-feedback">
                                <span>
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">
                            Nama
                        </label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama Kegiatan">
                        @error('nama')
                            <div class="invalid-feedback">
                                <span>
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_lacon">
                            Imam
                        </label>
                        <select name="id_lacon" id="id_lacon" class="form-control @error('id_lacon') is-invalid @enderror">
                            <option value="">Pilih Imam</option>
                            @foreach($lacon as $lc)
                                <option value="{{ $lc->id }}">{{ $lc->nama }}</option>
                            @endforeach
                        </select>
                        @error('id_lacon')
                            <div class="invalid-feedback">
                                <span>
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_pengurus">
                            Nama Pengurus
                        </label>
                        <select name="id_pengurus" id="id_pengurus" class="form-control @error('id_pengurus') is-invalid @enderror">
                            <option value="">Pilih Pengurus</option>
                            @foreach($pengurus as $png)
                                <option value="{{ $png->id }}">{{ $png->nama }}</option>
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
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tgl_selesai">
                            Tanggal Selesai
                        </label>
                        <input type="date" id="tgl_selesai" name="tgl_selesai" value="{{ old('tgl_selesai') }}" class="form-control @error('tgl_selesai') is-invalid @enderror" placeholder="Masukan Tanggal Penulisan">
                        @error('tgl_selesai')
                            <div class="invalid-feedback">
                                <span>
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_jenis_kegiatan">
                            Jenis Kegiatan
                        </label>
                        <select name="id_jenis_kegiatan" id="id_jenis_kegiatan" class="form-control @error('id_jenis_kegiatan') is-invalid @enderror">
                            <option value="">Pilih Kegiatan</option>
                            @foreach($jeniskegiatan as $jk)
                                <option value="{{ $jk->id }}">{{ $jk->jenis_kegiatan }}</option>
                            @endforeach
                        </select>
                        @error('id_jenis_kegiatan')
                            <div class="invalid-feedback">
                                <span>
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_penceramah">
                            Penceramah
                        </label>
                        <select name="id_penceramah" id="id_penceramah" class="form-control @error('id_penceramah') is-invalid @enderror">
                            <option value="">Pilih Penceramah</option>
                            @foreach($lacon as $lc)
                                <option value="{{ $lc->id }}">{{ $lc->nama }}</option>
                            @endforeach
                        </select>
                        @error('id_penceramah')
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
                        <textarea name="keterangan" id="keterangan" cols="30" rows="2" class="form-control  @error('keterangan') is-invalid @enderror" placeholder="Masukan Keterangan">{{ old('keterangan') }}</textarea>
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
        <a href="{{ route('kegiatan.index') }}" class="btn btn-dark my-2 float-end mx-2">Kembali</a>
        <button type="submit" class="btn btn-primary my-2 float-end" style="#2B4865">Simpan</button>
    </form>
</div>
@endsection
