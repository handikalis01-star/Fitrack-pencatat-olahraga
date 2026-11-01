<?php

namespace App\Http\Controllers;

use App\Models\Olahraga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OlahragaController extends Controller
{
    public function index()
    {
        $olahragas = Olahraga::orderBy('tanggal', 'desc')->get();
        return view('olahragas.index', compact('olahragas'));
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk menambahkan catatan olahraga.');
        }
        return view('olahragas.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk menambahkan catatan olahraga.');
        }

        $validated = $request->validate([
            'jenis_olahraga' => 'required|string|max:100|regex:/^[\pL\s]+$/u',
            'durasi_menit'   => 'required|integer|min:1|max:1000',
            'tanggal'        => 'required|date|before_or_equal:today',
        ], [
            'jenis_olahraga.required' => 'Jenis olahraga wajib diisi.',
            'jenis_olahraga.regex'    => 'Jenis olahraga hanya boleh berisi huruf dan spasi.',
            'jenis_olahraga.max'      => 'Jenis olahraga maksimal 100 karakter.',
            'durasi_menit.required'   => 'Durasi wajib diisi.',
            'durasi_menit.integer'    => 'Durasi harus berupa angka.',
            'durasi_menit.min'        => 'Durasi minimal 1 menit.',
            'durasi_menit.max'        => 'Durasi maksimal 1000 menit.',
            'tanggal.required'        => 'Tanggal wajib diisi.',
            'tanggal.date'            => 'Format tanggal tidak valid.',
            'tanggal.before_or_equal' => 'Tanggal tidak boleh melebihi hari ini.',
        ]);

        Olahraga::create($validated);

        return redirect()->route('olahragas.index')->with('success', 'Aktivitas olahraga berhasil disimpan ke database!');
    }

    public function edit(Olahraga $olahraga)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        return view('olahragas.edit', compact('olahraga'));
    }

    public function update(Request $request, Olahraga $olahraga)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $validated = $request->validate([
            'jenis_olahraga' => 'required|string|max:100|regex:/^[\pL\s]+$/u',
            'durasi_menit'   => 'required|integer|min:1|max:1000',
            'tanggal'        => 'required|date|before_or_equal:today',
        ], [
            'jenis_olahraga.required' => 'Jenis olahraga wajib diisi.',
            'jenis_olahraga.regex'    => 'Jenis olahraga hanya boleh berisi huruf dan spasi.',
            'jenis_olahraga.max'      => 'Jenis olahraga maksimal 100 karakter.',
            'durasi_menit.required'   => 'Durasi wajib diisi.',
            'durasi_menit.integer'    => 'Durasi harus berupa angka.',
            'durasi_menit.min'        => 'Durasi minimal 1 menit.',
            'durasi_menit.max'        => 'Durasi maksimal 1000 menit.',
            'tanggal.required'        => 'Tanggal wajib diisi.',
            'tanggal.date'            => 'Format tanggal tidak valid.',
            'tanggal.before_or_equal' => 'Tanggal tidak boleh melebihi hari ini.',
        ]);

        $olahraga->update($validated);

        return redirect()->route('olahragas.index')->with('success', 'Data olahraga berhasil diperbarui!');
    }

    public function destroy(Olahraga $olahraga)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if (Auth::user()->role !== 'admin') {
            return redirect()->route('olahragas.index')->with('error', 'Akses Ditolak! Hanya Admin yang boleh menghapus data.');
        }

        $olahraga->delete();

        return redirect()->route('olahragas.index')->with('success', 'Data olahraga berhasil dihapus!');
    }
}