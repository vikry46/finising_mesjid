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
                     <form action="{{ route('users.update', ['user' => $users]) }}" method="POST">
                        @csrf
                        @method('put')
                        <!-- name -->
                        <div class="form-group">
                           <label for="input_user_name" class="font-weight-bold">
                              Name
                           </label>
                           <input id="input_user_name" value="{{ $users->name }}" name="name" type="text" class="form-control" placeholder="" readonly/>
                           <!-- error message -->
                        </div>
                        <!-- role -->
                        <div class="form-group">
                            <label for="select_user_role" class="font-weight-bold">
                                Hak Akses
                            </label>
                            <select id="select_user_role" name="role" data-placeholder="Masukkan Hak Akses" class="form-control @error ('role') is-invalid @enderror" >
                                @foreach ($roles as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $users->id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                             <!-- error message -->
                            @error('role')
                             <span style="color:red">
                                <strong>
                                   {{ $message }}
                                </strong>
                             </span>
                            @enderror
                        <div class="float-end">
                           <a class="btn btn-warning px-4 mx-2" href="{{ route('users.index') }}">
                              Kembali
                           </a>
                           <button type="submit" class="btn btn-primary float-right px-4">
                              Edit
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