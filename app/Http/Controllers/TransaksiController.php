<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Transaksi',
            'transaksi' => Transaksi::latest()->get(),
        ];
        return view('transaksi.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah transaksi',
            'karyawan' => Karyawan::get(),
            'jmlKaryawan' => Karyawan::count(),
        ];
        return view('transaksi.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'karyawan_id' => 'required',
            'transport' => 'required',
            'lembur' => 'required',
        ]);

        $karyawan = Karyawan::findOrfail($request->karyawan_id);
        $gaji_total = $karyawan->golongan->gaji_pokok + $karyawan->golongan->tunjangan + $request->transport + $request->lembur;

        Transaksi::create([
            'tanggal' => $request->tanggal,
            'karyawan_id' => $request->karyawan_id,
            'transport' => $request->transport,
            'lembur' => $request->lembur,
            'gaji_total' => $gaji_total,
        ]);
        return redirect(route('transaksi.index'))->with('status', 'Data transaksi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $_dec = Crypt::decrypt($id);
        $data = [
            'title' => 'Edit Transaksi',
            'transaksi' => Transaksi::findOrfail($_dec),
            'karyawan' => Karyawan::get(),
        ];
        return view('transaksi.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'karyawan_id' => 'required',
            'transport' => 'required',
            'lembur' => 'required',
        ]);
        
        $karyawan = Karyawan::findOrfail($request->karyawan_id);
        $gaji_total = $karyawan->golongan->gaji_pokok + $karyawan->golongan->tunjangan + $request->transport + $request->lembur;

        Transaksi::where(['id' => $id])->update([
            'tanggal' => $request->tanggal,
            'karyawan_id' => $request->karyawan_id,
            'transport' => $request->transport,
            'lembur' => $request->lembur,
            'gaji_total' => $gaji_total,
        ]);
        return redirect(route('transaksi.index'))->with('status', 'Data transaksi berhasil diubah');
    }

    public function destroy($id)
    {
        Transaksi::destroy($id);
        return redirect(route('transaksi.index'))->with('status', 'Data transaksi berhasil dihapus');
    }
}
