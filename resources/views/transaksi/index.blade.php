@extends('layout.app')
@section('content')
    <div class="container mt-3">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Tambah</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Bulan/Tahun</th>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">Gaji Pokok</th>
                    <th scope="col">Lembur + Trans</th>
                    <th scope="col">Tunjangan</th>
                    <th scope="col">Total Gaji</th>
                    <th scope="col">opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('m/Y') }}</td>
                        <td>{{ $item->karyawan->name }}</td>
                        <td>{{ $item->karyawan->golongan->gaji_pokok }}</td>
                        <td>{{ $item->lembur + $item->transport }}</td>
                        <td>{{ $item->karyawan->golongan->tunjangan }}</td>
                        <td>{{ $item->gaji_total }}</td>
                        <td class="d-flex">
                            <a href="{{ route('transaksi.edit', Crypt::Encrypt($item->id)) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection