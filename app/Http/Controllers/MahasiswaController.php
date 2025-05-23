<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    protected $apiUrl = 'http://localhost:8080/mahasiswa';

    public function index()
    {
        $response = Http::get($this->apiUrl);

        if ($response->successful()) {
            // Ambil hanya bagian 'data' dari JSON response
            $mahasiswa = $response->json()['data'];
        } else {
            $mahasiswa = []; // fallback kalau API error
        }

        return view('mahasiswa', compact('mahasiswa'));
    }

    public function create()
    {
        return view('tambahmahasiswa');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'npm' => 'required',
                'id_user' => 'required',
                'id_kajur' => 'required',
                'nama_mahasiswa' => 'required',
                'tempat_tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'agama' => 'required',
                'angkatan' => 'required',
                'program_studi' => 'required',
                'no_hp' => 'required',
                'email' => 'required|email',
        ],);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($this->apiUrl, $validate);

        if ($response->successful()) {
            return redirect('/mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan!');
        } else {
            return redirect('/mahasiswa')->with('error', 'Gagal menambahkan mahasiswa ' . $response->body());
        }
    }

    public function edit($id)
    {
        $response = Http::get("{$this->apiUrl}/{$id}");

        if ($response->failed()) {
            return redirect('/mahasiswa')->with('error', 'Gagal mengambil data mahasiswa.');
        }

        $mahasiswa = $response->json();

        return view('editmahasiswa', [
            'mahasiswa' => (object) $mahasiswa,
            'id' => $id
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'npm' => 'required',
                'id_user' => 'required',
                'id_kajur' => 'required',
                'nama_mahasiswa' => 'required',
                'tempat_tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'agama' => 'required',
                'angkatan' => 'required',
                'program_studi' => 'required',
                'no_hp' => 'required',
                'email' => 'required|email',
        ],);

        $response = Http::put("{$this->apiUrl}/{$id}", $request->all());

        if ($response->successful()) {
            return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui!');
        } else {
            return redirect('/mahasiswa')->with('error', 'Gagal memperbarui data mahasiswa.');
        }
    }

    public function destroy($id)
    {
        Http::delete("{$this->apiUrl}/{$id}");

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}