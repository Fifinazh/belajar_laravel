@extends('layout.app')
@section('content')
    <div class="card">
        <h3 class="card-header">{{ $title ?? '' }}</h3>
        <div class="card-body">

            <form action="{{ route('customer.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Nama Pelanggan </label>
                    <input type="text" name="customer_name" class="form-control" placeholder="Masukkan Nama Pelanggan">
                </div>
                <div class="mb-3">
                    <label for="">Telepon </label>
                    <input type="number" name="phone" class="form-control" placeholder="Masukkan Telepon Pelanggan">
                </div>
                <div class="mb-3">
                    <label for="">Alamat </label>
                    <input type="text" name="address" class="form-control" placeholder="Masukkan Alamat Pelanggan">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
