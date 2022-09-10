@extends('layouts.backend')

@section('title')
    Keuangan | {{ config('app.name') }}
@endsection

@section('title-page')
    Keuangan Sosial
@endsection

@section('breadcrumbs')
   Edit
@endsection

@section('bg-color')
    background-color:#3D8361;
@endsection

@section('content-header')
<center><h2 class="text-light">Form Edit Keuangan Sosial</h2></center>
@endsection

@section('content')
<div class="card mt-9">
    <form action="{{ route('sosial.update',['sosial'=>$sosial]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="container my-3">
                        <label for="tgl">
                            Tanggal
                        </label>
                        <input type="date" id="tgl" name="tgl" value="{{ old('tgl',$sosial->tgl) }}" class="form-control @error('tgl') is-invalid @enderror" placeholder="ubah tanggal">
                        @error('tgl')
                            <label style="color: gold">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="container">
                        <label for="id_pengurus">Penulis</label>
                        <div class="form-group">
                            <select class="form-control @error('id_pengurus') is-invalid @enderror" id="id_pengurus" name="id_pengurus">
                                <option>Pilih Penulis</option>
                                @foreach ($pengurus as $item)
                                <option value="{{ $item->id }}" @if ($item->id == $sosial->id_pengurus) selected @endif>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_pengurus')
                                <label style="color: red">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="container my-3">
                        <label for="pemasukan">
                            Pemasukan
                        </label>
                        <input type="text" id="pemasukan" name="pemasukan" value="{{ old('pemasukan',$sosial->pemasukan) }}" class="form-control @error('pemasukan') is-invalid @enderror" placeholder="ubah">
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
                        <input type="text" id="pengeluaran" name="pengeluaran" value="{{ old('pengeluaran',$sosial->pengeluaran) }}" class="form-control @error('pengeluaran') is-invalid @enderror" placeholder="ubah">
                        @error('pengeluaran')
                            <label style="color: gold">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="container">
                    <label for="keterangan">
                        Kekterangan
                    </label>
                    <textarea name="keterangan" id="keterangan" cols="10" rows="4" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan',$sosial->keterangan) }}</textarea>
                    @error('keterangan')
                        <label style="color: gold">{{ $message }}</label>
                    @enderror
                </div>
            </div>
        </div>
        <div class="container">
            <a href="{{ route('sosial.index') }}" class="btn float-end" style="color:white; background-color:#3D8361">Kembali</a>
            <button type="submit" class="btn btn-primary mx-2 float-end">Edit</button>
        </div>
    </form>
</div>
@endsection
