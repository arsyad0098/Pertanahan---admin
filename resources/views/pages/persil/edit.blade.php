@extends('layouts.app')

@section('title', 'Edit Data Persil')

@section('content')

    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb" style="background: transparent; padding: 0;">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}" style="color: #64748b;">
                    <i class="bi bi-house-door-fill"></i>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('persil.index') }}" style="color: #64748b;">Data Persil</a>
            </li>
            <li class="breadcrumb-item active" style="color: var(--primary-green); font-weight: 600;">
                Edit Data Persil
            </li>
        </ol>
    </nav>

    <div class="card border-0 shadow-sm" style="border-radius: 16px;">
        <div class="card-header">
            <h5 class="mb-0">Edit Data Persil</h5>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('persil.update', $persil->persil_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">

                    <!-- KODE PERSIL -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Kode Persil</label>
                        <input type="text" name="kode_persil" class="form-control"
                               value="{{ $persil->kode_persil }}" required>
                    </div>

                    <!-- PEMILIK -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama Pemilik</label>
                        <select name="pemilik_warga_id" class="form-select" required>
                            @foreach($warga as $item)
                                <option value="{{ $item->warga_id }}"
                                    {{ $persil->pemilik_warga_id == $item->warga_id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- LUAS -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Luas (m²)</label>
                        <input type="number" name="luas_m2" class="form-control"
                               value="{{ $persil->luas_m2 }}" required>
                    </div>

                    <!-- PENGGUNAAN -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Penggunaan</label>
                        <input type="text" name="penggunaan" class="form-control"
                               value="{{ $persil->penggunaan }}" required>
                    </div>

                    <!-- ALAMAT -->
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Alamat Lahan</label>
                        <input type="text" name="alamat_lahan" class="form-control"
                               value="{{ $persil->alamat_lahan }}" required>
                    </div>

                    <!-- RT & RW -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">RT</label>
                        <input type="number" name="rt" class="form-control"
                               value="{{ $persil->rt }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">RW</label>
                        <input type="number" name="rw" class="form-control"
                               value="{{ $persil->rw }}" required>
                    </div>

                </div>

                <div class="mt-4 d-flex justify-content-end gap-2">
                    <a href="{{ route('persil.index') }}" class="btn btn-light">
                        Batal
                    </a>

                    <button type="submit" class="btn btn-success">
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection
