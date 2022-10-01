@extends('layouts.backend')

@section('title')
    Dashboard | {{ config('app.name') }}
@endsection

@section('title-page')
    Dashboard
@endsection

@section('breadcrumbs')
   Dashboard
@endsection

@section('bg-color')
    background-color:#7D1935;
@endsection

@section('content-header')
<center><h2 class="text-light">Dashboard</h2></center>
<div class="row justify-content-center">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mt-5">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                  <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Kegiatan</p>
                      نشاط
                      </h5>
                  </div>
              </div>
              <div class="col-4 text-end">
                    <h3> {{ $kegiatan }}</h3>
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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Pengurus</p>
                    مدي
                    </h5>
                </div>
              </a>
            </div>
            <div class="col-4 text-end">
              <h3> {{ $pengurus }}</h3>
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

@endsection
