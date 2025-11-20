@extends('layouts.app')

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

    <div class="card border-0 shadow-lg rounded-4 animate__animated animate__fadeInUp">
        <div class="card-header bg-primary text-white rounded-top-4 py-3 px-4 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 d-flex align-items-center">
                <i class="bi bi-pencil-square me-2"></i> Edit Data Warga
            </h5>
            <a href="{{ route('warga.index') }}" class="btn btn-back shadow-sm btn-custom">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            
            {{-- Error Alert --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <strong>Terjadi kesalahan!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Success Alert --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('warga.update', $data->warga_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Nama Warga</label>
                        <input type="text" name="nama" class="form-control rounded-3 @error('nama') is-invalid @enderror"
                               value="{{ old('nama', $data->nama) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">NIK</label>
                        <input type="text" name="no_ktp" class="form-control rounded-3 @error('no_ktp') is-invalid @enderror"
                               value="{{ old('no_ktp', $data->no_ktp) }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select rounded-3 @error('jenis_kelamin') is-invalid @enderror" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Agama</label>
                        <select name="agama" class="form-select rounded-3 @error('agama') is-invalid @enderror" required>
                            <option value="">-- Pilih Agama --</option>
                            <option value="Islam" {{ old('agama', $data->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Kristen" {{ old('agama', $data->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            <option value="Katolik" {{ old('agama', $data->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="Hindu" {{ old('agama', $data->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Buddha" {{ old('agama', $data->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option value="Konghucu" {{ old('agama', $data->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control rounded-3 @error('pekerjaan') is-invalid @enderror"
                               value="{{ old('pekerjaan', $data->pekerjaan) }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <textarea name="alamat" class="form-control rounded-3 @error('alamat') is-invalid @enderror" rows="3" required>{{ old('alamat', $data->alamat) }}</textarea>
                </div>

                {{-- GMAIL + TELEPON --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Gmail</label>
                        <input type="email" name="email" class="form-control rounded-3 @error('email') is-invalid @enderror"
                               value="{{ old('email', $data->email) }}" required placeholder="contoh@gmail.com">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Telepon</label>
                        <input type="text" name="telepon" class="form-control rounded-3 @error('telepon') is-invalid @enderror"
                               value="{{ old('telepon', $data->telepon) }}" required placeholder="081234567890">
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

    <!-- WhatsApp Float -->
    <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Admin, saya ingin bertanya tentang data warga.') }}"
       class="whatsapp-float" target="_blank">
        <i class="bi bi-whatsapp"></i>
    </a>

    <style>
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

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(37,211,102,.5); }
            70% { box-shadow: 0 0 0 15px rgba(37,211,102,0); }
            100% { box-shadow: 0 0 0 0 rgba(37,211,102,0); }
        }
    </style>
@endsection
