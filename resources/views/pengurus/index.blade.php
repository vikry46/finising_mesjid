@extends('layouts.backend')

@section('title')
    Pengurus | {{ config('app.name') }}
@endsection

@section('title-page')
    Pengurus
@endsection

@section('bg-color')
    background-color:#541212;
@endsection

@section('breadcrumbs')
    Pengurus
@endsection

@section('content-header')
<center><h2 class="text-light">Form Pengurus</h2></center>
<div class="row justify-content-center">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mt-5">
      @can('pengurus_create')
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <a href="{{ route('pengurus.create') }}">
                <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Input Data Pengurus</p>
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
    <div class="col-xl-4 col-sm-6 mb-xl-0 mt-5">
      @can('jabatan_show')
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <a href="{{ route('jabatan.index') }}">
                <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Jabatan</p>
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
</div>
@endsection
@section('content')
<div class="card" style="background-color: #EAF6F6">
    <div class="table-responsive">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($zoya as $zee)
                <div class="col-lg-4">
                    <div class="card card-profile mt-5">
                    <img src="{{ asset('storage/' . $zee->image) }}"  class="card-img-top mt-3">
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col"></div>
                            </div>
                            <div class="text-center mt-4">
                                <h5>
                                    <span class="font-weight-light">{{ $zee->jabatan->nama_kategori }}</span>
                                </h5>
                                <div class="h6 font-weight-300">
                                    <i class="ni location_pin mr-2"></i>{{ $zee->kode }}
                                </div>
                                <div class="h6 mt-1">
                                    <i class="ni business_briefcase-24 mr-2"></i>Nama : {{ $zee->nama }}
                                </div>
                                <div class="h6 mt-1">
                                    <i class="ni business_briefcase-24 mr-2"></i>Jenis Kelamin : {{ $zee->jk }}
                                </div>
                                <div class="h6 mt-1">
                                    <i class="ni business_briefcase-24 mr-2"></i>Umur : {{ $zee->umur }}
                                </div>
                                <div>
                                    <i class="ni education_hat mr-2"></i>{{ $zee->no_hp }}
                                </div>
                                @can('pengurus_update')
                                <a href="{{ route('pengurus.edit',['penguru'=>$zee]) }}" class=" btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                @endcan
                                @can('pengurus_delete')
                                <form action="{{ route('pengurus.destroy', ['penguru' => $zee]) }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
