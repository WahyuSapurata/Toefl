<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class DataUser extends BaseController
{
    public function index()
    {
        $module = 'Data User';
        return view('admin.datauser.index', compact('module'));
    }

    public function get()
    {
        // Mengambil semua data pengguna
        $dataFull = User::where('role', 'user')->get();

        // Mengembalikan response berdasarkan data yang sudah disaring
        return $this->sendResponse($dataFull, 'Get data success');
    }

    public function update($params)
    {
        function generateRandomPassword($length = 12)
        {
            $bytes = random_bytes($length);
            return substr(bin2hex($bytes), 0, $length);
        }

        $password = generateRandomPassword();

        $data = User::where('uuid', $params)->first();
        $data->status = 'Terverifikasi';
        $data->password = $password;
        $data->save();

        $dataEmail = [
            'nama' => $data->name,
            'password' => $password
        ];

        Mail::to($data->email)->send(new Email($dataEmail));

        return $this->sendResponse($data, 'Added data success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = User::where('uuid', $params)->first();
            // Simpan nama foto lama untuk dihapus
            $oldFotoPath = public_path('bukti/' . $data->foto);
            // Hapus foto lama jika ada
            if (File::exists($oldFotoPath)) {
                File::delete($oldFotoPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }
}
