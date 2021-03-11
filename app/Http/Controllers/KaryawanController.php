<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KaryawanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Karyawan',
            'karyawan' => Karyawan::latest()->get(),
        ];
        return view('karyawan.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Karyawan',
            'golongan' => Gaji::get(),
        ];
        return view('karyawan.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'gaji_id' => 'required',
            'status' => 'required',
        ]);

        Karyawan::create([
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'gaji_id' => $request->gaji_id,
            'status' => $request->status,
        ]);
        return redirect(route('karyawan'))->with('status', 'Data karyawan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $_dec = Crypt::decrypt($id);
        $data = [
            'title' => 'Edit Karyawan',
            'karyawan' => Karyawan::findOrfail($_dec),
            'golongan' => Gaji::get(),
        ];
        return view('karyawan.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'gaji_id' => 'required',
            'status' => 'required',
        ]);
        Karyawan::where(['id' => $id])->update([
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'gaji_id' => $request->gaji_id,
            'status' => $request->status,
        ]);
        return redirect(route('karyawan'))->with('status', 'Data karyawan berhasil diubah');
    }

    public function destroy($id)
    {
        Karyawan::destroy($id);
        return redirect(route('karyawan'))->with('status', 'Data karyawan berhasil dihapus');
    }
}
