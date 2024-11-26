@extends('layout.app')
@section('content')
    <div class="card">
        <h3 class="card-header">Data Pengguna</h3>
        <div class="card-body">

            <form action="{{ route('user.update', $user->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="">Nama</label>
                    <input value="{{ $user->name }}" type="text" name="name" class="form-control" placeholder="Masukkan nama anda">
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input value="{{ $user->email }}" type="email" name="email" class="form-control" placeholder="Masukkan email anda">
                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan pasword anda">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection