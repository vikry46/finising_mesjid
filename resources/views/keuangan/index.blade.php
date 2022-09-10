@extends('layouts.backend')

@section('title')
    Keuangan | {{ config('app.name') }}
@endsection

@section('title-page')
    Keuangan
@endsection

@section('bg-color')
    background-color:#1597BB;
@endsection

@section('breadcrumbs')
    Keuangan
@endsection

@section('content-header')
<center><h2 class="text-light">Keuangan</h2></center>
<div class="row justify-content-center">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mt-5">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <a href="{{ route('mesjid.index') }}">
                <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Mesjid</p>
                    <h5 class="font-weight-bolder">
                      مدير
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
    <div class="col-xl-4 col-sm-6 mb-xl-0 mt-5">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <a href="{{ route('sosial.index') }}">
                <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Sosial</p>
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
    <div class="col-xl-4 col-sm-6 mb-xl-0 mt-5">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <a href="{{ route('yatim.index') }}">
                <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Yatim</p>
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
<div class="row ">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mt-5">
        <div class="card">
          <div class="card-header pb-0 pt-3 bg-transparent">
            <h6 class="text-capitalize"><center>Keuangan Mesjid</center></h6>
            <hr class="horizontal dark mt-0">
          </div>
          <div class="card-body p-3">
            <center>Total Pemasukan : <strong>Rp.{{ $sumPemasukanMesjid }}</strong></center>
            <center>Total Pengeluaran : <strong>Rp.{{ $sumPengeluaranMesjid }}</strong></center>
            <hr class="horizontal dark mt-0">
            <center>  <h6>Rp.{{ $jumlahMesjid }}</h6></center>
          </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mt-5">
        <div class="card">
          <div class="card-header pb-0 pt-3 bg-transparent">
            <h6 class="text-capitalize"><center>Keuangan Sosial</center></h6>
            <hr class="horizontal dark mt-0">
          </div>
          <div class="card-body p-3">
            <center>Total Pemasukan : <strong>Rp.{{ $sumPemasukanSosial }}</strong></center>
            <center>Total Pengeluaran : <strong>Rp.{{ $sumPengeluaranSosial }}</strong></center>
            <hr class="horizontal dark mt-0">
            <center>  <h6>Rp.{{ $jumlahSosial }}</h6></center>
          </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mt-5">
        <div class="card">
          <div class="card-header pb-0 pt-3 bg-transparent">
            <h6 class="text-capitalize"><center>Keuangan Yatim</center></h6>
            <hr class="horizontal dark mt-0">
          </div>
          <div class="card-body p-3">
            <center>Total Pemasukan : <strong>Rp.{{ $sumPemasukanYatim }}</strong></center>
            <center>Total Pengeluaran : <strong>Rp.{{ $sumPengeluaranYatim }}</strong></center>
            <hr class="horizontal dark mt-0">
            <center>  <h6>Rp.{{ $jumlahYatim }}</h6></center>
          </div>
        </div>
    </div>
</div>
@endsection
