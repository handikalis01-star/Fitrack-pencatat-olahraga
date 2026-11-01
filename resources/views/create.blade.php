<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Catatan Olahraga - FitTrack App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('https://images.unsplash.com/photo-1517838277536-f5f99be501cd?q=80&w=1920&auto=format&fit=crop') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar-custom {
            width: 100%;
            background-color: #1a1a1a;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-sizing: border-box;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .form-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .card-form {
            background-color: rgba(255, 255, 255, 0.95);
            color: #000;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 600px;
            backdrop-filter: blur(5px);
        }
    </style>
</head>

<body>

    <div class="navbar-custom">
        <div class="brand fw-bold fs-5">🏃‍♂️ FitTrack App</div>
        <div class="user-info d-flex align-items-center">
            <span class="me-2 fw-medium">handika</span> 
            <span class="badge bg-danger me-3">ADMIN</span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="link-light bg-transparent border-0 text-decoration-none p-0">Logout</button>
            </form>
        </div>
    </div>

    <div class="form-wrapper">
        <div class="card-form">
            <h3 class="mb-4 fw-bold text-dark border-bottom pb-2">Tambah Catatan Olahraga</h3>
            
            <form action="{{ route('olahragas.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label small text-muted fw-bold">Jenis Olahraga</label>
                    <input type="text" name="jenis_olahraga" class="form-control form-control-lg fs-6"
                        placeholder="Contoh: Lari Pagi, Push Up, Bersepeda" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label small text-muted fw-bold">Durasi (Menit)</label>
                    <input type="number" name="durasi_menit" class="form-control form-control-lg fs-6" placeholder="30" min="1" required>
                </div>
                
                <div class="mb-4">
                    <label class="form-label small text-muted fw-bold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control form-control-lg fs-6" value="{{ date('Y-m-d') }}" required>
                </div>
                
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('olahragas.index') }}" class="btn btn-secondary px-4">Batal</a>
                    <button type="submit" class="btn btn-primary px-4">Simpan Catatan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>