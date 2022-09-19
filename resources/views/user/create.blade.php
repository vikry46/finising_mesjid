@extends('layouts.backend')

@section('title')
    User | {{ config('app.name') }}
@endsection

@section('title-page')
    User
@endsection

@section('bg-color')
    background-color:#787A91;
@endsection

@section('breadcrumbs')
    User
@endsection

@section('content-header')
<center><h2 class="text-light">Tambah Data Pengurus</h2></center>
@endsection

@section('content')
<div class="card mt-9" style="background-color: #EAF6F6">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-body">
                     <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <!-- name -->
                        <div class="form-group">
                           <label for="input_user_name" class="font-weight-bold">
                              Name
                           </label>
                           <input id="input_user_name" value="" name="name" type="text" class="form-control" placeholder="" />
                           <!-- error message -->
                        </div>
                        <!-- role -->
                        <div class="form-group">
                            <label for="select_user_role" class="font-weight-bold">
                                Hak Akses
                            </label>
                            <select id="select_user_role" name="role" data-placeholder="Masukkan Hak Akses" class="form-control @error ('role') is-invalid @enderror" >
                                <option value="">Pilih Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                             <!-- error message -->
                        @error('role')
                             {{-- <span style="color:red">
                                <strong>
                                   {{ $message }}
                                </strong>
                             </span> --}}
                         @enderror
                        <!-- email -->
                        <div class="form-group">
                           <label for="input_user_email" class="font-weight-bold">
                              Email
                           </label>
                           <input id="input_user_email" value="" name="email" type="email" class="form-control" placeholder=""
                              autocomplete="email" />
                           <!-- error message -->
                        </div>
                        <!-- password -->
                        <div class="form-group">
                           <label for="input_user_password" class="font-weight-bold">
                              Password
                           </label>
                           <input id="input_user_password" name="password" type="password" class="form-control" placeholder=""
                              autocomplete="new-password" />
                           <!-- error message -->
                        </div>
                        <!-- password_confirmation -->
                        <div class="form-group">
                           <label for="input_user_password_confirmation" class="font-weight-bold">
                              Password confirmation
                           </label>
                           <input id="input_user_password_confirmation" name="password_confirmation" type="password"
                              class="form-control" placeholder="" autocomplete="new-password" />
                           <!-- error message -->
                        </div>
                        <div class="float-right">
                           <a class="btn btn-warning px-4 mx-2" href="">
                              Back
                           </a>
                           <button type="submit" class="btn btn-primary float-right px-4">
                              Save
                           </button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
    </div>
</div>
@endsection