@extends('admin.layouts.admin.app')


@section('title', 'Edit Data Warga')

@section('content')
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="{{ route('warga.index') }}"><i class="bi bi-house-door"></i></a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('warga.index') }}">Data Warga</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data Warga</li>
        </ol>
    </nav>

    <!-- Card Form Edit -->
    <div class="card border-0 shadow-lg rounded-4 animate__animated animate__fadeInUp">
        <div
            class="card-header bg-primary text-white rounded-top-4 py-3 px-4 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 d-flex align-items-center">
                <i class="bi bi-pencil-square me-2"></i> Edit Data Warga
            </h5>
            <a href="{{ route('warga.index') }}" class="btn btn-back shadow-sm btn-custom">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            {{-- Alert Validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <strong>Terjadi kesalahan!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('warga.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama" class="form-label fw-semibold">Nama Warga</label>
                        <input type="text" name="nama" id="nama" class="form-control rounded-3"
                            value="{{ old('nama', $data->nama) }}" required placeholder="Masukkan nama lengkap">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="nik" class="form-label fw-semibold">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control rounded-3"
                            value="{{ old('nik', $data->nik) }}" required placeholder="Masukkan NIK">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label fw-semibold">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control rounded-3" rows="3" required
                        placeholder="Masukkan alamat lengkap">{{ old('alamat', $data->alamat) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="rt" class="form-label fw-semibold">RT</label>
                        <input type="text" name="rt" id="rt" class="form-control rounded-3"
                            value="{{ old('rt', $data->rt) }}" required placeholder="Contoh: 001">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="rw" class="form-label fw-semibold">RW</label>
                        <input type="text" name="rw" id="rw" class="form-control rounded-3"
                            value="{{ old('rw', $data->rw) }}" required placeholder="Contoh: 002">
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-save shadow-sm btn-custom px-4">
                        <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
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
