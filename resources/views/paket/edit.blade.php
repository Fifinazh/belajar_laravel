@extends('layout.app')
@section('content')
    <div class="card">
        <h3 class="card-header">{{ $title ?? '' }}</h3>
        <div class="card-body">

            <form action="{{ route('service.update', $service->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="">Nama Paket</label>
                    <input value="{{ $service->service_name }}" type="text" name="name" class="form-control" placeholder="Masukkan Nama Paket">
                </div>
                <div class="mb-3">
                    <label for="">Harga</label>
                    <input value="{{ $service->price }}" type="text" name="price" class="form-control" placeholder="Masukkan Harga Paket">
                </div>
                <div class="mb-3">
                    <label for="">Deskripsi</label>
                    <input value="{{ $service->description }}" type="text" name="description" class="form-control" placeholder="Masukkan Deskripsi Paket">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
