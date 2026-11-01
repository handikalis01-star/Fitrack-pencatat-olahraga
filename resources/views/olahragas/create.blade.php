@extends('layouts.app')

@section('content')
<style>
    /* Mengubah background halaman ini secara khusus */
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), 
                    url('https://images.unsplash.com/photo-1517838277536-f5f99be501cd?q=80&w=1920&auto=format&fit=crop') no-repeat center center fixed !important;
        background-size: cover !important;
    }
</style>

<div class="row justify-content-center py-4">
    <div class="col-lg-6 col-md-8">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="mb-0 fw-bold">+ Tambah Catatan Olahraga</h5>
                <small>Catat aktivitas olahraga yang Anda lakukan untuk memantau kebugaran</small>
            </div>
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Terjadi Kesalahan!</strong>
                        <ul class="mb-0 mt-2 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('olahragas.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Olahraga <span class="text-danger">*</span></label>
                        <input type="text" name="jenis_olahraga" class="form-control form-control-lg" 
                            placeholder="Contoh: Lari Pagi, Push Up, Bersepeda, Renang" 
                            value="{{ old('jenis_olahraga') }}" required>
                        <div class="form-text">Masukkan nama jenis olahraga yang Anda lakukan</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Durasi (Menit) <span class="text-danger">*</span></label>
                        <input type="number" name="durasi_menit" class="form-control form-control-lg" 
                            placeholder="30" min="1" max="1000" 
                            value="{{ old('durasi_menit') }}" required>
                        <div class="form-text">Lama waktu olahraga dalam satuan menit</div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal" class="form-control form-control-lg" 
                            value="{{ old('tanggal', date('Y-m-d')) }}" required>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                        <a href="{{ route('olahragas.index') }}" class="btn btn-secondary px-4">Kembali</a>
                        <button type="submit" class="btn btn-primary px-4">Simpan Catatan</button>
                    </div>
                </form>

                <div class="mt-4 p-3 bg-light border rounded">
                    <h6 class="mb-2 fw-semibold">Tentang Olahraga</h6>
                    <p class="small text-muted mb-0">Olahraga adalah aktivitas fisik yang terencana dan terstruktur untuk meningkatkan kebugaran, kesehatan jantung, kekuatan otot, dan kesejahteraan mental. Dengan mencatat secara rutin, Anda dapat memantau perkembangan dan menjaga konsistensi latihan.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection