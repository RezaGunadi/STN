<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SignatureController extends Controller
{
    public function show()
    {
        return view('signature');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'signature' => 'required|string',
        ]);

        // Ambil data base64 dari form
        $imageData = $request->input('signature');

        // Menghapus prefix data URL jika ada
        if (strpos($imageData, 'data:image/png;base64,') === 0) {
            $imageData = substr($imageData, 22);
        }

        // Decode base64 menjadi data binari
        $image = base64_decode($imageData);

        // Tentukan nama file untuk menyimpan gambar
        $fileName = 'signature_' . time() . '.png';

        // Tentukan path untuk menyimpan gambar (di public/assets/uploads/signature)
        $uploadPath = public_path('assets/uploads/signature');

        // Pastikan folder tujuan ada
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true); // Membuat folder jika belum ada
        }

        // Simpan gambar ke folder tujuan
        $filePath = $uploadPath . '/' . $fileName;
        file_put_contents($filePath, $image); // Simpan gambar sebagai file PNG

        // Kembalikan response atau redirect ke halaman lain
        return back()->with('message', 'Tanda tangan berhasil disimpan!')->with('file', $filePath);
    }
}
