<?php

namespace App\Http\Controllers;

use App\Models\KategoriSoal;
use App\Models\Kuis as ModelsKuis;
use App\Models\Soal;
use Illuminate\Http\Request;

class Kuis extends BaseController
{
    public function index()
    {
        $module = config('app.name');
        $data = KategoriSoal::all();
        $data->map(function ($item) {
            $data_kuis = ModelsKuis::where('uuid_kategori', $item->uuid)->where('uuid_user', auth()->user()->uuid)->first();
            $item->kuis = $data_kuis ? true : false;
            return $item;
        });
        $combined = $data->map(function ($item) {
            // Mengambil semua kuis yang terkait dengan pengguna saat ini
            $kuis = ModelsKuis::where('uuid_kategori', $item->uuid)->get();

            // Menghitung total poin
            $total = $kuis->sum('poin');

            // Menambahkan total poin ke properti pengguna
            $item->total_poin = $total;

            // Mengembalikan item pengguna yang telah dimodifikasi
            return $item;
        });
        return view('user.soal.index', compact('module', 'data', 'combined'));
    }

    public function detail_soal($params)
    {
        $data = Soal::where('uuid_kategori', $params)->get();
        $kategori = KategoriSoal::where('uuid', $params)->first();
        $module = $kategori->kategori;
        return view('user.detailsoal.index', compact('data', 'module', 'kategori'));
    }

    public function store(Request $request)
    {
        // Loop through each soal submitted
        foreach ($request->soal as $uuid => $item) {
            // Find the soal by UUID
            $data_soal = Soal::where('uuid', $uuid)->first();

            if ($data_soal) {
                // You can process the data here as needed
                // For example, save the selected jawaban or perform some validation
                $uuid_kategori = $item['uuid_kategori'];
                $uuid_soal = $item['uuid_soal'];
                $jawaban = $item['jawaban'] ?? null;

                // You might want to save the jawaban to a database, for example:
                ModelsKuis::create([
                    'uuid_kategori' => $uuid_kategori,
                    'uuid_soal' => $uuid_soal,
                    'uuid_user' => auth()->user()->uuid,
                    'poin' => $data_soal->jawaban_benar === $jawaban ? 5 : 0,
                ]);
            } else {
                // Handle the case where soal is not found
                // For example, log an error or return a response
                echo "Soal with UUID " . $uuid . " not found.<br>";
            }
        }

        // Redirect back or return a response after processing
        return redirect()->route('user.soal')->with('success', 'Jawaban berhasil disimpan.');
    }
}
