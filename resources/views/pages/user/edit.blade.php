@extends('layouts.app')

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
            <li class="breadcrumb-item"><a href="{{ route('data_user.index') }}">Data User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Edit Data User</h1>
            <p class="mb-0">Form untuk mengedit data user.</p>
        </div>
        <div>
            <a href="{{ route('data_user.index') }}" class="btn btn-primary">
                <i class="far fa-question-circle me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                {{-- ✅ TAMBAHKAN enctype="multipart/form-data" --}}
                <form action="{{ route('data_user.update', $user->user_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-4">
                        <div class="col-lg-6 col-sm-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text"
                                    id="name"
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user->name) }}"
                                    placeholder="Masukkan nama lengkap user"
                                    required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email"
                                    id="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user->email) }}"
                                    placeholder="Masukkan alamat email"
                                    required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select id="role"
                                    name="role"
                                    class="form-select @error('role') is-invalid @enderror"
                                    required>
                                    <option value="">Pilih Role</option>
                                    <option value="Admin" {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="User" {{ old('role', $user->role) == 'User' ? 'selected' : '' }}>User</option>
                                    <option value="Operator" {{ old('role', $user->role) == 'Operator' ? 'selected' : '' }}>Operator</option>
                                    <option value="Supervisor" {{ old('role', $user->role) == 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                                    <option value="Manager" {{ old('role', $user->role) == 'Manager' ? 'selected' : '' }}>Manager</option>
                                </select>
                                @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select id="status"
                                    name="status"
                                    class="form-select @error('status') is-invalid @enderror"
                                    required>
                                    <option value="">Pilih Status</option>
                                    <option value="active" {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                                    <option value="inactive" {{ old('status', $user->status) == 'inactive' ? 'selected' : '' }}>Non-Aktif</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="mb-3">
                                <label for="tanggal_daftar" class="form-label">Tanggal Daftar</label>
                                <input type="date"
                                    id="tanggal_daftar"
                                    name="tanggal_daftar"
                                    class="form-control @error('tanggal_daftar') is-invalid @enderror"
                                    value="{{ old('tanggal_daftar', $user->tanggal_daftar->format('Y-m-d')) }}"
                                    required>
                                @error('tanggal_daftar')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-sm-12">
                            <div class="mb-3">
                                <label for="profile_picture" class="form-label">Foto Profil</label>
                                
                                <!-- Preview Foto Existing -->
                                @if ($user->profile_picture)
                                <div class="mb-2">
                                    <img src="{{ asset('uploads/profile/' . $user->profile_picture) }}"
                                        alt="Profile Picture"
                                        style="width: 90px; height: 90px; border-radius: 10px; object-fit: cover; border: 2px solid #e2e8f0;">
                                    <p class="text-muted small mt-1">Foto saat ini</p>
                                </div>
                                @endif
                                
                                <input type="file"
                                    id="profile_picture"
                                    name="profile_picture"
                                    class="form-control @error('profile_picture') is-invalid @enderror"
                                    accept="image/*">
                                @error('profile_picture')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah foto.</small>
                            </div>
                        </div>

                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i> Update Data
                        </button>
                        <a href="{{ route('data_user.index') }}" class="btn btn-outline-secondary ms-2">
                            <i class="bi bi-x-circle me-1"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Floating Button WhatsApp -->
<a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20ingin%20bertanya%20tentang%20data%20user."
    class="whatsapp-float"
    target="_blank"
    title="Hubungi Admin via WhatsApp">
    <i class="bi bi-whatsapp"></i>
</a>

<style>
    .card {
        border-radius: 16px;
    }

    .components-section {
        border-radius: 16px;
    }

    .btn {
        border-radius: 10px;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-green), var(--primary-dark));
        border: none;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
    }

    .btn-outline-secondary:hover {
        transform: translateY(-2px);
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--primary-green);
        box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.25);
    }

    .form-label {
        font-weight: 600;
        color: var(--dark-bg);
        margin-bottom: 0.5rem;
    }

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

    .h4 {
        color: var(--dark-bg);
        font-weight: 700;
    }

    .breadcrumb-dark .breadcrumb-item.active {
        color: var(--primary-green);
        font-weight: 600;
    }
</style>
@endsection