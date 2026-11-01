@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">
                <h3 class="text-center mb-1 font-weight-bold">Sign Up</h3>
                <p class="text-center text-muted small mb-4">Buat akun untuk mencatat aktivitas olahraga Anda</p>

                @if($errors->any())
                    <div class="alert alert-danger py-2">
                        <ul class="mb-0 ps-3 small">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small text-muted">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="John Doe" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small text-muted">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" placeholder="johndoe" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small text-muted">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="john@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small text-muted">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small text-muted">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small text-muted">Pilih Role Akses</label>
                        <select name="role" class="form-select" required>
                            <option value="user">User (Akses CRU - Tanpa Hapus)</option>
                            <option value="admin">Admin (Akses CRUD Penuh)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-full w-100 mt-2">Sign Up & Auto Login</button>
                </form>

                <div class="text-center mt-3">
                    <span class="small text-muted">Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection