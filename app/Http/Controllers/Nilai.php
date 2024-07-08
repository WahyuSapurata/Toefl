<?php

namespace App\Http\Controllers;

use App\Models\KategoriSoal;
use App\Models\Kuis;
use App\Models\User;
use Illuminate\Http\Request;

class Nilai extends BaseController
{
    public function index()
    {
        $module = 'Nilai';
        return view('admin.nilai.index', compact('module'));
    }

    public function get()
    {
        // Mengambil semua data pengguna dengan role 'user'
        $data = User::where('role', 'user')->get();

        // Menambahkan total poin dari tabel Kuis ke setiap pengguna
        $combined = $data->map(function ($user) {
            // Mengambil semua kuis yang terkait dengan pengguna saat ini
            $kuis = Kuis::where('uuid_user', $user->uuid)->get();

            // Mengambil semua kategori
            $kategori = KategoriSoal::all();

            // Menghitung total poin per kategori
            $kategoriComboned = $kategori->map(function ($row) use ($kuis) {
                $item_kategori = $kuis->where('uuid_kategori', $row->uuid);

                // Menghitung total poin per kategori
                $totalPerKategori = $item_kategori->sum('poin');

                return [
                    'kategori' => $row->kategori, // Sesuaikan dengan nama kolom pada tabel kategori
                    'total_poin' => $totalPerKategori
                ];
            });

            $tolalNilai = $kuis->sum('poin');

            // Menambahkan total poin ke properti pengguna
            $user->total_poin_per_kategori = $kategoriComboned;
            $user->total_poin = $tolalNilai;

            // Mengembalikan item pengguna yang telah dimodifikasi
            return $user;
        });

        // Menampilkan hasil kombinasi
        return $this->sendResponse($combined, 'Get data success');
    }
}
