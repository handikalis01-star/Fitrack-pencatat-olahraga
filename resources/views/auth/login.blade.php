@extends('layouts.app')
<div class="container text-light text-center my-5" style="max-width: 800px;">
  <h1 class="fw-bold mb-3">Selamat Datang Di FitTrack</h1>
  
  <p class="mb-4 fs-5">
    FiTrack adalah aplikasi pencatat olahraga dan aktivitas fisik yang dirancang untuk membantu Anda membangun pola hidup sehat secara terorganisasi dan konsisten. Dengan tampilan yang bersih, intuitif, dan mudah digunakan, FiTrack siap menjadi teman setia dalam setiap perjalanan kebugaran Anda.
  </p>

  <h3 class="fw-bold mt-5 mb-3">🔑 Fitur Utama FiTrack</h3>
  
  <div class="text-start mb-4">
    <p><strong>Pencatatan Latihan Harian (Workout Tracker):</strong> Catat berbagai jenis olahraga—mulai dari latihan beban (gym), lari, bersepeda, renang, hingga yoga. Atur set, repetisi, beban, durasi, dan jarak dengan sangat mudah.</p>
    <p><strong>Analisis & Statistik Kemajuan:</strong> Dapatkan laporan visual berupa grafik dan ringkasan mingguan/bulanan untuk memantau peningkatan performa, konsistensi latihan, serta kalori yang terbakar.</p>
    <p><strong>Rencana Latihan Kustom (Custom Routines):</strong> Buat dan simpan program olahraga sesuai dengan target pribadi Anda, baik untuk menurunkan berat badan, menambah massa otot, maupun meningkatkan daya tahan tubuh.</p>
    <p><strong>Pengingat Konsistensi:</strong> Fitur pengingat jadwal yang teratur agar Anda tidak melewatkan sesi latihan dan tetap disiplin mencapai fitness goals.</p>
  </div>

  <p class="mb-2">
    FiTrack menghilangkan kerumitan dalam mencatat perkembangan olahraga secara manual. Semua data kebugaran Anda tersimpan rapi dalam satu tempat, memudahkan Anda untuk mengevaluasi diri, tetap termotivasi, dan mencapai bentuk tubuh ideal secara terukur.
  </p>
  
  <p class="fw-bold fst-italic text-warning fs-5 mt-3">
    FiTrack: Lacak Setiap Langkah, Capai Setiap Target.
  </p>
</div>
@section('content')
<style>
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
            url('https://images.unsplash.com/photo-1517838277536-f5f99be501cd?q=80&w=1920&auto=format&fit=crop') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
</style>

<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-4 col-sm-6">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <h3 class="mb-1 fw-bold">FitTrack Login</h3>
                    <p class="text-muted small mb-0">Masuk untuk mengelola catatan olahraga Anda</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger py-2 small">{{ session('error') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger py-2 small">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Username / Email</label>
                        <input type="text" name="login" class="form-control" value="{{ old('login') }}"
                            placeholder="Masukkan username atau email" required autocomplete="username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required autocomplete="current-password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                        <label class="form-check-label small" for="remember">Ingat Saya</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>

                <div class="text-center mt-3">
                    <span class="small text-muted">Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none">Daftar Sekarang</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection