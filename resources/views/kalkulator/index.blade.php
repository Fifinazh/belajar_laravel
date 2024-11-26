<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? ''}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <h1>Kalkulator sederhana dengan laravel</h1>
                </div>
                <a href="{{ route('tambah') }}" class="badge rounded-pill text-bg-success">Tambah</a>
                <a href="{{ route('kurang') }}" class="badge rounded-pill text-bg-danger">Kurang</a>
                <a href="{{ route('kali') }}" class="badge rounded-pill text-bg-warning">Kali</a>
                <a href="{{ route('bagi') }}" class="badge rounded-pill text-bg-info">Bagi</a>
                <a href="{{ route('user.index') }}">User</a>

                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
