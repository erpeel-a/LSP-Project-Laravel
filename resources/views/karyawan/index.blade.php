@extends('layout.app')
@section('content')
<div class="container mt-3">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">Tambah</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Lahir</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Golongan</th>
                <th scope="col">Status</th>
                <th scope="col">opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawan as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->tempat_lahir }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tgl_lahir)->format('d/m/Y') }}</td>
                <td>{{ $item->golongan->golongan }}</td>
                <td>{{ $item->status }}</td>
                <td class="d-flex">
                    <a href="{{ route('karyawan.edit', Crypt::Encrypt($item->id)) }}" class="btn btn-sm btn-info">Edit</a>
                    <form action="{{ route('karyawan.destroy', $item->id) }}" method="POST">
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