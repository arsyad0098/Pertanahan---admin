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
    <div
        class="card-header bg-primary text-white rounded-top-4 py-3 px-4 d-flex justify-content-between align-items-center">
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
                        <input type="text" id="nama_penggunaan" name="nama_penggunaan"
                            class="form-control @error('nama_penggunaan') is-invalid @enderror"
                            value="{{ old('nama_penggunaan') }}" placeholder="Masukkan nama penggunaan" required>
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
                        <textarea id="keterangan" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                            rows="3" placeholder="Tambahkan keterangan (opsional)">{{ old('keterangan') }}</textarea>
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
    <!-- Floating Button WhatsApp -->
    <a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20ingin%20bertanya%20tentang%20penggunaan%20tanah."
        class="whatsapp-float" target="_blank" title="Hubungi Admin via WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <style>
        /* Floating WhatsApp Button */
        .whatsapp-float {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background-color: #25D366;
            color: white;
            border-radius: 50%;
            font-size: 28px;
            padding: 15px 18px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            z-index: 999;
            transition: all 0.3s ease;
            animation: pulse 2s infinite;
        }

        .whatsapp-float:hover {
            background-color: #1ebe5d;
            transform: scale(1.15);
            animation: none;
        }

        /* Animasi denyut lembut */
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.5);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }
    </style>
@endsection
