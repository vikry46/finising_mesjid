@extends('layouts.backend')

@section('title')
    Keuangan Sosial | {{ config('app.name') }}
@endsection

@section('title-page')
    Keuangan Sosial
@endsection

@section('bg-color')
    background-color:#3D8361;
@endsection

@section('breadcrumbs')
    Keuangan
@endsection

@section('content-header')
<center><h2 class="text-light">Data Keuangan Sosial</h2></center>     
  {{-- <div class="card" >
      {{ $sumPemasukan }} Ini Pemasukan <br>
      {{ $sumPengeluaran }} Ini Pengeluaran <br>
      {{ $jumlah }} Ini Total <br>
  </div> --}}
@endsection

@section('content')
<div class="card mt-9" style="background-color: #EAF6F6">
    <a href="{{ route('informasi.t') }}" class="btn btn-dark mt-9 float-end">Kembali</a>
    <div class="card-body">
        <div class="table-responsive p-0">
            <table class="table align-items-center mt-7 table-bordered border-dark">
                <thead class="table-dark">
                    <tr>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Penulis</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Pemasukan Kas</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Pengeluaran Kas</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sosial as $sah)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $sah->tgl }}</td>
                        <td class="text-center">{{ $sah->pengurus->nama }}</td>
                        <td class="text-center">{{ $sah->pemasukan }}</td>
                        <td class="text-center">{{ $sah->pengeluaran }}</td>
                        <td class="text-center">{{ $sah->keterangan }}</td>
                    </tr colspan="10">
                    @endforeach
                </tbody>
            </table><br>
            <table>
                <tbody>
                    <tr>
                        <td>
                            Total Pemasukan 
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Total Pengeluaran 
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Sisa Kas 
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="container">
                <div class="float-end">
                    <p class="">Kamang Hilir..........................</p>
                    <p class="mx-6">Pengurus</p><br><br><br>

                    <p class="mx-5">(.........................)</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
