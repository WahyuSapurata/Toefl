<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKategoriSoalRequest;
use App\Http\Requests\UpdateKategoriSoalRequest;
use App\Models\KategoriSoal;

class KategoriSoalController extends BaseController
{
    public function index()
    {
        $module = 'Kategori Soal';
        return view('admin.kategori.index', compact('module'));
    }

    public function get()
    {
        $data = KategoriSoal::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreKategoriSoalRequest $storeKategoriSoalRequest)
    {
        $data = array();
        try {
            $data = new KategoriSoal();

            $data->kategori = $storeKategoriSoalRequest->kategori;
            $data->waktu = $storeKategoriSoalRequest->waktu;
            $data->jumlah_soal = $storeKategoriSoalRequest->jumlah_soal;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Added data success');
    }

    public function show($params)
    {
        $data = array();
        try {
            $data = KategoriSoal::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(StoreKategoriSoalRequest $storeKategoriSoalRequest, $params)
    {
        try {
            $data = KategoriSoal::where('uuid', $params)->first();
            $data->kategori = $storeKategoriSoalRequest->kategori;
            $data->waktu = $storeKategoriSoalRequest->waktu;
            $data->jumlah_soal = $storeKategoriSoalRequest->jumlah_soal;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }

        return $this->sendResponse($data, 'Update data success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = KategoriSoal::where('uuid', $params)->first();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }
}
