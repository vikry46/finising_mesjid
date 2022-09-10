@extends('layouts.backend')

@section('title')
    Keuangan | {{ config('app.name') }}
@endsection

@section('title-page')
    Keuangan Mesjid
@endsection

@section('breadcrumbs')
   Edit
@endsection

@section('bg-color')
    background-color:#8FD6E1;
@endsection

@section('content-header')
<center><h2 class="text-light">Form Edit Keuangan Mesjid</h2></center>
@endsection

@section('content')
<div class="card mt-9">
    <form action="{{ route('mesjid.update',['mesjid'=>$jinan]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="container mt-3">
                    <label for="tgl">
                        Tanggal
                    </label>
                    <input type="date" id="tgl" name="tgl" value="{{ old('tgl',$jinan->tgl) }}" class="form-control @error('tgl') is-invalid @enderror" placeholder="ubah tanggal">
                    @error('tgl')
                        <label style="color: gold">{{ $message }}</label>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="container">
                        <label for="id_pengurus">Penulis</label>
                        <div class="form-group">
                            <select class="form-control @error('id_pengurus') is-invalid @enderror" id="id_pengurus" name="id_pengurus">
                               <option>Pilih Penulis</option>
                                @foreach ($marsha as $item)
                                <option value="{{ $item->id }}" @if ($item->id == $jinan->id_pengurus) selected @endif>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_pengurus')
                                <label style="color: red">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="container">
                        <label for="id_kegiatan">Kegiatan</label>
                        <div class="form-group">
                            <select class="form-control @error('id_kegiatan') is-invalid @enderror" id="id_kegiatan" name="id_kegiatan">
                               <option>Pilih Kegiatan</option>
                                @foreach ($kegiatan as $item)
                                <option value="{{ $item->id }}" @if ($item->id == $jinan->id_kegiatan) selected @endif>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_kegiatan')
                                <label style="color: red">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="container mt-3">
                        <label for="pemasukan">
                            Pemasukan
                        </label>
                        <input type="text" id="pemasukan" name="pemasukan" value="{{ old('pemasukan',$jinan->pemasukan) }}" class="form-control @error('pemasukan') is-invalid @enderror" placeholder="ubah">
                        @error('pemasukan')
                            <label style="color: gold">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="container">
                        <label for="pengeluaran">
                            Pengeluaran
                        </label>
                        <input type="text" id="pengeluaran" name="pengeluaran" value="{{ old('pengeluaran',$jinan->pengeluaran) }}" class="form-control @error('pengeluaran') is-invalid @enderror" placeholder="ubah">
                        @error('pengeluaran')
                            <label style="color: gold">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="container">
                        <label for="keterangan">
                            Kekterangan
                        </label>
                        <input type="text" id="keterangan" name="keterangan" value="{{ old('keterangan',$jinan->keterangan) }}" class="form-control @error('keterangan') is-invalid @enderror" placeholder="ubah">
                        @error('keterangan')
                            <label style="color: gold">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <a href="{{ route('mesjid.index') }}" class="btn float-end" style="color:white; background-color:#8FD6E1">Kembali</a>
            <button type="submit" class="btn btn-primary mx-2 float-end">Edit</button>
        </div>
    </form>
</div>
@endsection
