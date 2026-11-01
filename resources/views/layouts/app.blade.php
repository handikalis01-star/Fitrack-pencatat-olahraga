<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitTrack App - Aplikasi Catatan Olahraga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1 0 auto;
        }
        footer {
            flex-shrink: 0;
        }
    </style>
</head>
<body class="bg-light">
    @auth
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('olahragas.index') }}">🏃 FitTrack App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('olahragas.index') }}">Daftar Olahraga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('olahragas.create') }}">Tambah Aktivitas</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <span class="text-white me-3 small">
                        <strong>{{ auth()->user()->name }}</strong> 
                        <span class="badge bg-{{ auth()->user()->role === 'admin' ? 'danger' : 'info' }} ms-1">
                            {{ strtoupper(auth()->user()->role) }}
                        </span>
                    </span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    @endauth

    <main class="container py-4">
        @yield('content')
    </main>

    <footer class="text-center text-muted py-3 mt-auto">
        <small>&copy; {{ date('Y') }} FitTrack App - Aplikasi Catatan Olahraga</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>