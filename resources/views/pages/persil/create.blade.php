@extends('layouts.app')

@section('title', 'Tambah Data Persil')

@section('content')

<div class="card border-0 shadow-sm" style="border-radius: 16px;">
    <div class="card-header">
        <h5 class="mb-0">Tambah Data Persil</h5>
    </div>

    <div class="card-body" style="padding: 2rem;">
        <form action="{{ route('persil.store') }}" method="POST">
            @csrf

            <div class="row g-4">

                <!-- Kode Persil -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Kode Persil</label>
                    <input type="text" name="kode_persil" 
                           class="form-control @error('kode_persil') is-invalid @enderror" 
                           required>

                    @error('kode_persil')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nama Pemilik -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Pemilik</label>
                    <select name="pemilik_warga_id" 
                            class="form-select @error('pemilik_warga_id') is-invalid @enderror" 
                            required>
                        <option value="">-- Pilih Warga --</option>

                        @foreach($warga as $item)
                            <option value="{{ $item->warga_id }}">
                                {{ $item->nama }}
                            </option>
                        @endforeach
                    </select>

                    @error('pemilik_warga_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Luas -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Luas (m²)</label>
                    <input type="number" name="luas_m2"
                           class="form-control @error('luas_m2') is-invalid @enderror"
                           required>

                    @error('luas_m2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Penggunaan -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Penggunaan</label>
                    <input type="text" name="penggunaan"
                           class="form-control @error('penggunaan') is-invalid @enderror"
                           required>

                    @error('penggunaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Alamat Lahan -->
                <div class="col-md-12">
                    <label class="form-label fw-semibold">Alamat Lahan</label>
                    <input type="text" name="alamat_lahan"
                           class="form-control @error('alamat_lahan') is-invalid @enderror"
                           required>

                    @error('alamat_lahan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- RT -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">RT</label>
                    <input type="number" name="rt"
                           class="form-control @error('rt') is-invalid @enderror"
                           required>

                    @error('rt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- RW -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">RW</label>
                    <input type="number" name="rw"
                           class="form-control @error('rw') is-invalid @enderror"
                           required>

                    @error('rw')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-end gap-3 mt-4">
                <a href="{{ route('persil.index') }}" class="btn btn-light">Batal</a>
                <button class="btn btn-success">Simpan</button>
            </div>

        </form>
    </div>
</div>

@endsection
