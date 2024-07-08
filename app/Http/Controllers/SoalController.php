<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSoalRequest;
use App\Http\Requests\UpdateSoalRequest;
use App\Models\KategoriSoal;
use App\Models\Soal;
use Illuminate\Http\Request;

class SoalController extends BaseController
{
    public function index()
    {
        $module = 'Soal';
        return view('admin.soal.index', compact('module'));
    }

    public function get()
    {
        $data = Soal::all();
        $data->map(function ($item) {
            $kategori = KategoriSoal::where('uuid', $item->uuid_kategori)->first();

            $item->kategori = $kategori->kategori;
            return $item;
        });
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(Request $request)
    {
        $data = array();
        try {
            $data = new Soal();
            $data->uuid_kategori = $request->uuid_kategori;
            $data->deskripsi_soal = $request->deskripsi_soal;
            $data->soal = $request->soal;
            $data->jawaban = $request->jawaban;
            $data->jawaban_benar = $request->jawaban_benar;
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
            $data = Soal::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(Request $request, $params)
    {
        try {
            $data = Soal::where('uuid', $params)->first();
            $data->uuid_kategori = $request->uuid_kategori;
            $data->deskripsi_soal = $request->deskripsi_soal;
            $data->soal = $request->soal;
            $data->jawaban = $request->jawaban;
            $data->jawaban_benar = $request->jawaban_benar;
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
            $data = Soal::where('uuid', $params)->first();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }
}
