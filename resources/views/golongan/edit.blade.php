@extends('layout.app')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                Form Edit Golongan
            </div>
            <div class="card-body">
                <form action="{{ route('update.golongan', $golongan->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3 row">
                        <label for="golongan" class="col-sm-2 col-form-label">Nama Golongan</label>
                        <div class="col-sm-10">
                            <input type="text" name="golongan" class="form-control @error('golongan') is-invalid @enderror" value="{{ $golongan->golongan }}" id="golongan">
                            @error('golongan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gaji_pokok" class="col-sm-2 col-form-label">Gaji Pokok</label>
                        <div class="col-sm-10">
                            <input type="text" name="gaji_pokok" class="form-control @error('gaji_pokok') is-invalid @enderror" value="{{ $golongan->gaji_pokok }}" id="gaji_pokok">
                            @error('gaji_pokok')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tunjangan" class="col-sm-2 col-form-label">Tunjangan</label>
                        <div class="col-sm-10">
                            <input type="text" name="tunjangan" class="form-control @error('tunjangan') is-invalid @enderror" value="{{ $golongan->tunjangan }}" id="tunjangan">
                            @error('tunjangan')
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