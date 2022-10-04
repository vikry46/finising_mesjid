@extends('layouts.backend')

@section('title')
    Keuangan | {{ config('app.name') }}
@endsection

@section('title-page')
    Keuangan
@endsection

@section('bg-color')
    background-color:#2F4F4F;
@endsection

@section('breadcrumbs')
    Laporan Keuangan
@endsection

@section('content-header')
<center><h2 class="text-light"> Laporan Akhir</h2></center>
<div class="row justify-content-center">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mt-5">
        @can('mesjid_laporan')
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <a href="{{ route('mesjid.t') }}">
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
        @endcan
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mt-5">
      @can('sosial_laporan')
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <a href="{{ route('sosial.t') }}">
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
      @endcan
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mt-5">
      @can('yatim_laporan')
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <a href="{{ route('yatim.t') }}">
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
      @endcan
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mt-5">
      @can('kegiatan_laporan')
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <a href="{{ route('kegiatan.t') }}">
                <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Kegiatan</p>
                    <h5 class="font-weight-bolder">
                        نشاط
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
      @endcan
    </div>
</div>
@endsection