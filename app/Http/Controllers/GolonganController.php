<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GolonganController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Golongan',
            'golongan' => Gaji::latest()->get(),
        ];
        return view('golongan.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Golongan',
        ];
        return view('golongan.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'golongan' => 'required|unique:gajis',
            'golongan' => 'required',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'required|numeric',
        ]);

        Gaji::create([
            'golongan' => $request->golongan,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
        ]);
        return redirect(route('golongan'))->with('status', 'Data golongan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $_dec = Crypt::Decrypt($id);
        $data = [
            'title' => 'Edit Golongan',
            'golongan' => Gaji::findOrfail($_dec),
        ];
        return view('golongan.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // 'golongan' => 'required|unique:gajis',
            'golongan' => 'required',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'required|numeric',
        ]);
        Gaji::where(['id' => $id])->update([
            'golongan' => $request->golongan,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
        ]);
        return redirect(route('golongan'))->with('status', 'Data golongan berhasil diedit');
    }

    public function destroy($id)
    {
        Gaji::destroy($id);
        return redirect(route('golongan'))->with('status', 'Data golongan berhasil dihapus');
    }
}
