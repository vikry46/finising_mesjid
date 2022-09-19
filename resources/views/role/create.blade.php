@extends('layouts.backend')

@section('title')
    Jabatan | {{ config('app.name') }}
@endsection

@section('title-page')
    Jabatan
@endsection

@section('bg-color')
    background-color:#787A91;
@endsection

@section('breadcrumbs')
    Jabatan
@endsection

@section('content-header')
<center><h2 class="text-light">Form Tambah Jabatan</h2></center>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <form action="{{ route('role.store') }}" method="POST">
            @csrf
             <div class="card-body">
                <div class="form-group">
                   <label for="input_role_name" class="font-weight-bold">
                        Nama
                   </label>
                   <input id="input_role_name" value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Role User..." />
                   @error('name')
                        <span style="color: red">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                   @enderror
                </div>
                <!-- permission -->
                <div class="form-group">
                   <label for="input_role_permission" class="font-weight-bold">
                    Hak Akses
                   </label>
                   <div class="form-control overflow-auto h-100 @error('permissions') is-invalid @enderror" id="input_role_permission">
                      <div class="row">
                         <!-- list manage name:start -->
                         @foreach ($authorities as $manageName => $permissions)
                            <div class="col-lg-3">
                                <ul class="list-group mx-1 my-2">
                                    <li class="list-group-item bg-dark text-white">
                                        {{-- {{ trans("permissions.{$manageName}") }} --}}
                                        {{ $manageName }}
                                    </li>
                                    <!-- list permission:start -->
                                    @foreach ($permissions as $permission)
                                    <li class="list-group-item">
                                       <div class="form-check">
                                            @if (old('permissions'))
                                                <input id="{{ $permission }}" name="permissions[]" class="form-check-input" type="checkbox" value="{{ $permission }}" {{ in_array($permission, old('permissions')) ? "checked" : null }}>
                                            @else
                                                <input id="{{ $permission }}" name="permissions[]" class="form-check-input" type="checkbox" value="{{ $permission }}">

                                            @endif

                                          <label for="{{ $permission }}" class="form-check-label">
                                            {{-- {{ trans("permissions.{$permission}") }} --}} {{ $permission }}
                                          </label>

                                       </div>
                                    </li>
                                    @endforeach
                                    <!-- list permission:end -->
                                 </ul>
                            </div>
                         @endforeach
                         <!-- list manage name:end  -->
                      </div>
                   </div>
                   @error('permissions')
                        <span style="color: red">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                   @enderror
                </div>
                <div class="float-end mb-4">
                   <button type="submit" class="btn btn-primary px-4">
                      Simpan
                   </button>
                    <a class="btn btn-warning px-4 mx-2" href="{{ route('role.index') }}">
                        Kembali
                    </a>
                </div>
             </div>
          </form>
       </div>
    </div>
</div>
@endsection