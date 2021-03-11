@extends('layout.app')
@section('content')
    <div class="container mt-3">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <a href="{{ route('golongan.create') }}" class="btn btn-primary mb-3">Tambah</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Golongan</th>
                    <th scope="col">Gaji Pokok</th>
                    <th scope="col">Tunjangan</th>
                    <th scope="col">opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($golongan as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->golongan }}</td>
                        <td>{{ $item->gaji_pokok }}</td>
                        <td>{{ $item->tunjangan }}</td>
                        <td class="d-flex">
                            <a href="{{ route('golongan.edit', Crypt::Encrypt($item->id)) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('golongan.destroy', $item->id) }}" method="POST">
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