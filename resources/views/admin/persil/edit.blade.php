@extends('admin.layouts.app')

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Edit Data</h1>
            <p class="mb-0">Form untuk mengedit data.</p>
        </div>
        <div>
            <a href="{{ route('jenis_penggunaan.index') }}" class="btn btn-primary"><i
                    class="far fa-question-circle me-1"></i> Kembali</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                <form action="{{ route('jenis_penggunaan.update', $data->jenis_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-4">
                        <div class="col-lg-6 col-sm-12">
                            <div class="mb-3">
                                <label for="nama_penggunaan" class="form-label">Nama Penggunaan</label>
                                <input type="text" id="nama_penggunaan" name="nama_penggunaan"
                                    class="form-control @error('nama_penggunaan') is-invalid @enderror"
                                    value="{{ old('nama_penggunaan', $data->nama_penggunaan) }}"
                                    placeholder="Masukkan nama penggunaan" required>
                                @error('nama_penggunaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea id="keterangan" name="keterangan"
                                    class="form-control @error('keterangan') is-invalid @enderror" rows="3"
                                    placeholder="Tambahkan keterangan (opsional)">{{ old('keterangan', $data->keterangan) }}</textarea>
                                @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('jenis_penggunaan.index') }}"
                            class="btn btn-outline-secondary ms-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
