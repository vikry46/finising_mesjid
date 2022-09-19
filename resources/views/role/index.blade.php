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
<center><h2 class="text-light">Data Jabatan</h2></center>
<a href="{{ route('users.index') }}" class="btn btn-primary mt-9 mx-2 float-end">User</a>
<a href="{{ route('role.create') }}" class="btn btn-dark mt-9 float-end">Tambah Data</a>
@endsection

@section('content')
<div class="card mt-9" style="background-color: #EAF6F6">
    <div class="card-body">
        <div class="table-responsive p-0">
            <table class="table align-items-center mt-7">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                        <th class="text-center text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Apsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                    <tr>
                    <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $role->name }}</td>
                    <td class="text-center">
                    <a href="{{ route('role.show', ['role' => $role]) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('role.edit', ['role' => $role]) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('role.destroy', ['role' => $role]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apa kamu yakin menghapus data ini Nah Ayoloh')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    </td>
                    </tr>
                    @empty
                        <p>
                            <strong>Data Role Tidak Ada</strong>
                        </p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

