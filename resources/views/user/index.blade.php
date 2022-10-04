@extends('layouts.backend')

@section('title')
    User | {{ config('app.name') }}
@endsection

@section('title-page')
    User
@endsection

@section('bg-color')
    background-color:#B0C4DE;
@endsection

@section('breadcrumbs')
    User
@endsection

@section('content-header')
<center><h2 class="text-light">Data User</h2></center>
<a href="{{ route('role.index') }}" class="btn btn-primary mt-9 mx-2 float-end">Kembali</a>

@can('user_create')
<a href="{{ route('users.create') }}" class="btn btn-dark mt-9 float-end">Tambah Data</a>
@endcan

@endsection

@section('content')
<div class="card mt-9" style="background-color: #EAF6F6">
    <div class="card-body">
        <div class="row">
            @forelse ($users as $user)
            <div class="col-md-6">
                <div class="card my-1">
                   <div class="card-body">
                      <div class="row">
                         <div class="col-md-2">
                            <i class="fas fa-id-badge fa-5x"></i>
                         </div>
                         <div class="col-md-10">
                            <table>
                               <tr>
                                  <th>
                                     Name
                                  </th>
                                  <td>:</td>
                                  <td>
                                     <!-- show user name -->
                                     {{ $user->name }}
                                  </td>
                               </tr>
                               <tr>
                                  <th>
                                     Email
                                  </th>
                                  <td>:</td>
                                  <td>
                                     <!-- show user email -->
                                     {{ $user->email }}
                                  </td>
                               </tr>
                               <tr>
                                  <th>
                                     Role
                                  </th>
                                  <td>:</td>
                                  <td>
                                     <!-- Show user roles -->
                                     {{ $user->roles->first()->name }}
                                  </td>
                               </tr>
                            </table>
                         </div>
                      </div>
                      <div class="float-end my-2">
                        @can('user_update')
                         <!-- edit -->
                         <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-sm btn-info" role="button">
                            <i class="fas fa-edit"></i>
                         </a>
                         @endcan
                         @can('user_delete')
                         <!-- delete -->
                         <form action="{{ route('users.destroy',['user' => $user]) }}" method="POST" role="alert" class="d-inline">
                              @csrf
                              @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                               <i class="fas fa-trash"></i>
                            </button>
                         </form>
                         @endcan
                      </div>
                   </div>
                </div>
             </div>
            @empty
                Tidak Ada user
            @endforelse
         </div>
    </div>
</div>
@endsection