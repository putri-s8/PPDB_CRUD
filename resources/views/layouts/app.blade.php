<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>PPDB SMK N 1 PDH</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light- bg-light">
            <div class="container-fluid justify-content-center">
                <!-- Logo -->
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" height="30">
                </a>
                <!-- Navbar links -->
                <div class="navbar-nav">
                    <a class="nav-link" href="{{ route('sekolahs.index') }}">Daftar Sekolah</a>
                    <a class="nav-link" href="{{ route('siswas.index') }}">Daftar Siswa</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="container mt-4">
        <!-- Search form -->
        <form class="d-flex mx-auto" action="{{ route('search') }}" method="GET">
                    <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
