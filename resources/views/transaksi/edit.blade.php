@extends('layout.app')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                Form Edit Transaksi
            </div>
            <div class="card-body">
                <form action="{{ route('update.transaksi', $transaksi->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggall</label>
                        <div class="col-sm-10">
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" value="{{ date('Y-m-d', strtotime($transaksi->tanggal)) }}">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="karyawan_id" class="col-sm-2 col-form-label">Karyawan</label>
                        <div class="col-sm-10">
                            <select name="karyawan_id" class="form-select @error('karyawan_id') is-invalid @enderror" aria-label="Default select example">
                                <option disabled selected>Pilih karyawan</option>
                                @foreach ($karyawan as $item)
                                <option {{ $item->id === $transaksi->karyawan_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('karyawan_id')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="transport" class="col-sm-2 col-form-label">Transport</label>
                        <div class="col-sm-10">
                            <input type="text" name="transport" class="form-control @error('transport') is-invalid @enderror" id="transport" value="{{ $transaksi->transport }}">
                            @error('transport')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="lembur" class="col-sm-2 col-form-label">Lembur</label>
                        <div class="col-sm-10">
                            <input type="text" name="lembur" class="form-control @error('lembur') is-invalid @enderror" id="lembur" value="{{ $transaksi->lembur }}">
                            @error('lembur')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection