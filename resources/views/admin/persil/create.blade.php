@extends('admin.layouts.app')

@section('content')
<nav aria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
        <li class="breadcrumb-item">
            <a href="#"><i class="bi bi-house-door"></i></a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('jenis_penggunaan.index') }}">Persil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
    </ol>
</nav>

<!-- Card Form Tambah -->
<div class="card-header bg-primary text-white rounded-top-4 py-3 px-4 d-flex justify-content-between align-items-center">
    <h5 class="mb-0 d-flex align-items-center">
        <i class="bi bi-person-plus me-2"></i> Tambah Data Warga
    </h5>
    <a href="{{ route('warga.index') }}" class="btn btn-outline-light btn-custom">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

    <div class="card-body p-4">
        <form action="{{ route('jenis_penggunaan.store') }}" method="POST">
            @csrf

            <div class="row mb-4">
                <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                        <label for="nama_penggunaan" class="form-label">
                            <i class="bi bi-tag me-1"></i> Nama Penggunaan
                        </label>
                        <input
                            type="text"
                            id="nama_penggunaan"
                            name="nama_penggunaan"
                            class="form-control @error('nama_penggunaan') is-invalid @enderror"
                            value="{{ old('nama_penggunaan') }}"
                            placeholder="Masukkan nama penggunaan"
                            required>
                        @error('nama_penggunaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">
                            <i class="bi bi-file-text me-1"></i> Keterangan
                        </label>
                        <textarea
                            id="keterangan"
                            name="keterangan"
                            class="form-control @error('keterangan') is-invalid @enderror"
                            rows="3"
                            placeholder="Tambahkan keterangan (opsional)">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('jenis_penggunaan.index') }}" class="btn btn-outline-secondary btn-custom">
                    <i class="bi bi-x-circle me-1"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary btn-custom">
                    <i class="bi bi-save me-1"></i> Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
