@extends('layouts.backend')

@section('title')
    Keuangan Mesjid | {{ config('app.name') }}
@endsection

@section('title-page')
    Keuangan Mesjid
@endsection

@section('bg-color')
    background-color:#8FD6E1;
@endsection

@section('breadcrumbs')
    Keuangan
@endsection

@section('content-header')

@endsection
@section('content')
<div class="card mt-9" style="background-color: #EAF6F6">
    <div class="card-body">
        <div class="table-responsive p-0">
            <table class="table align-items-center mt-7 table-bordered border-dark">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Nama kegitan</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Penulis</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Pemasukan Kas</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Pengeluaran Kas</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
                        <th class="text-center text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Apsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($AziziShafaaAsadel as $sah)
                    <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $sah->tgl }}</td>
                    <td class="text-center">{{ $sah->kegiatan->nama }}</td>
                    <td class="text-center">{{ $sah->pengurus->nama }}</td>
                    <td class="text-center">{{ $sah->pemasukan }}</td>
                    <td class="text-center">{{ $sah->pengeluaran }}</td>
                    <td class="text-center">{{ $sah->keterangan }}</td>
                    <td class="text-center">
                    </td>
                    </tr>
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
    