@extends('layouts.backend')

@section('title')
    Kontak | {{ config('app.name') }}
@endsection

@section('title-page')
    Kontak Persen
@endsection

@section('bg-color')
    background-color:#4682B4;
@endsection

@section('breadcrumbs')
    Kontak
@endsection

@section('content-header')
<center><h2 class="text-light">Masukan dan Saran Masyarakat </h2></center>


@endsection
@section('content')
<div class="card" style="background-color: #EAF6F6">
    <div class="card-body">
        <div class="table-responsive p-0">
            
            <table class="table align-items-center mt-7">
                <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">email</th>
                    <th class="text-center text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Masukan</th>
                    <th class="text-center text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kontak as $zee)
                    <tr>
                    <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $zee->nama }}</td>
                    <td class="text-center">{{ $zee->email }}</td>
                    <td class="text-center">{{ $zee->masukan }}</td>
                    @can('kontak_delete')
                    <td>
                        <a href="{{ route('kontak.hapus', $zee->id) }}" class="btn btn-danger">Hapus</a>
                    </td>
                    @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <a href="" class="btn float-end" style="background-color: #1E5128; color:white">Kembali</a>
    </div>
</div>
@endsection
