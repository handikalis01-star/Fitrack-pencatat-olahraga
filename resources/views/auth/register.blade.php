@extends('layouts.app')

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
    <div class="col-md-5 col-sm-8">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <h3 class="mb-1 fw-bold">Daftar Akun FitTrack</h3>
                    <p class="text-muted small mb-0">Buat akun untuk mulai mencatat aktivitas olahraga</p>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger py-2">
                        <ul class="mb-0 ps-3 small">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}"
                            placeholder="Masukkan username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                            placeholder="contoh@email.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Ulangi password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Role Akses</label>
                        <select name="role" class="form-select" required>
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User (Dapat tambah & edit)</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin (Dapat tambah, edit & hapus)</option>
                        </select>
                        <small class="text-muted">Pilih sesuai kebutuhan akses Anda</small>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Daftar & Login Otomatis</button>
                </form>

                <div class="text-center mt-3">
                    <span class="small text-muted">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none">Login di sini</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection