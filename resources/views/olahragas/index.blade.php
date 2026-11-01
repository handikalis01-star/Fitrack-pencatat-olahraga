@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url('https://images.unsplash.com/photo-1517838277536-f5f99be501cd?q=80&w=1920&auto=format&fit=crop') no-repeat center center fixed;
        background-size: cover;
    }
</style>

<div class="card shadow-lg border-0 rounded-3">
    <div class="card-header bg-dark text-white d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center py-3 gap-2">
        <div>
            <h4 class="mb-0 fw-bold">Daftar Catatan Olahraga</h4>
            <small class="text-light">Kelola aktivitas fisik untuk memantau kebugaran Anda</small>
        </div>
        <a href="{{ route('olahragas.create') }}" class="btn btn-primary">+ Tambah Aktivitas</a>
    </div>
    <div class="card-body p-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="alert alert-info border-0">
            <strong>Tips Kesehatan:</strong> Lakukan minimal 150 menit olahraga moderat atau 75 menit olahraga intensif per minggu untuk menjaga kesehatan tubuh.
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th>Jenis Olahraga</th>
                        <th width="15%">Durasi</th>
                        <th width="15%">Tanggal</th>
                        <th>Penjelasan Manfaat</th>
                        <th width="18%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($olahragas as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td><strong class="text-primary">{{ ucwords($item->jenis_olahraga) }}</strong></td>
                            <td><span class="badge bg-success">{{ $item->durasi_menit }} Menit</span></td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                            <td><small class="text-muted">{{ $item->deskripsi_olahraga }}</small></td>
                            <td class="text-center">
                                <a href="{{ route('olahragas.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                @if(auth()->check() && auth()->user()->role === 'admin')
                                    <form action="{{ route('olahragas.destroy', $item->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus catatan {{ ucwords($item->jenis_olahraga) }} pada {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="text-muted">
                                    <h5>Belum ada catatan olahraga</h5>
                                    <p class="mb-3">Mulai catat aktivitas olahraga Anda untuk memantau kebugaran</p>
                                    <a href="{{ route('olahragas.create') }}" class="btn btn-primary">+ Tambah Aktivitas Pertama</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(auth()->check() && auth()->user()->role !== 'admin')
            <div class="alert alert-warning mt-3 mb-0">
                <strong>Info:</strong> Anda login sebagai <strong>User</strong>. Hanya Admin yang dapat menghapus data. Anda dapat menambah dan mengedit data.
            </div>
        @endif
    </div>
</div>
@endsection