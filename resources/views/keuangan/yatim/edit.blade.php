@extends('layouts.backend')

@section('title')
    Keuangan | {{ config('app.name') }}
@endsection

@section('title-page')
    Keuangan Yatim
@endsection

@section('breadcrumbs')
   Edit
@endsection

@section('bg-color')
    background-color:#850E35;
@endsection

@section('content-header')
<center><h2 class="text-light">Form Edit Keuangan Yatim</h2></center>
@endsection

@section('content')
<div class="card mt-9">
    <form action="{{ route('yatim.update',['yatim'=>$jinan]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="container">
                        <label for="tgl">
                            Tanggal
                        </label>
                        <input type="date" id="tgl" name="tgl" value="{{ old('tgl',$jinan->tgl) }}" class="form-control @error('tgl') is-invalid @enderror" placeholder="ubah tanggal">
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
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="container">
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
            </div>
            <div class="form-group">
                <div class="container">
                    <label for="keterangan">
                        Kekterangan
                    </label>
                    <textarea name="keterangan" id="keterangan" cols="10" rows="4" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan',$jinan->keterangan) }}</textarea>
                    @error('keterangan')
                        <label style="color: gold">{{ $message }}</label>
                    @enderror
                </div>
            </div>
        </div>
        <div class="conatiner">
            <a href="{{ route('yatim.index') }}" class="btn float-end" style="background-color:#850E35; color:white;">Kembali</a>
            <button type="submit" class="btn btn-primary float-end mx-2">Edit</button>
        </div>
    </form>
</div>
@endsection
