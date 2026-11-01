@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
        <div class="card shadow border-0 rounded-3">
            <div class="card-header bg-warning text-dark py-3">
                <h5 class="mb-0 fw-bold">Edit Catatan Olahraga</h5>
                <small>Perbarui data aktivitas olahraga Anda</small>
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

                <form action="{{ route('olahragas.update', $olahraga->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Olahraga <span class="text-danger">*</span></label>
                        <input type="text" name="jenis_olahraga" value="{{ old('jenis_olahraga', $olahraga->jenis_olahraga) }}" class="form-control form-control-lg" required>
                        <div class="form-text">Masukkan nama jenis olahraga yang Anda lakukan</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Durasi (Menit) <span class="text-danger">*</span></label>
                        <input type="number" name="durasi_menit" value="{{ old('durasi_menit', $olahraga->durasi_menit) }}" class="form-control form-control-lg" min="1" max="1000" required>
                        <div class="form-text">Lama waktu olahraga dalam satuan menit</div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal" value="{{ old('tanggal', $olahraga->tanggal) }}" class="form-control form-control-lg" required>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                        <a href="{{ route('olahragas.index') }}" class="btn btn-secondary px-4">Kembali</a>
                        <button type="submit" class="btn btn-warning px-4">Update Data</button>
                    </div>
                </form>

                <div class="mt-4 p-3 bg-light border rounded">
                    <h6 class="mb-2 fw-semibold">Tentang Olahraga</h6>
                    <p class="small text-muted mb-0">Olahraga berperan penting dalam menjaga kesehatan jantung, kekuatan otot, fleksibilitas, dan kesehatan mental. Aktivitas fisik teratur dapat mengurangi risiko berbagai penyakit kronis.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection