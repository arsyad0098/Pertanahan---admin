@extends('layouts.app')

@section('title', 'Dokumentasi Tanah')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb" style="background: transparent; padding: 0;">
        <li class="breadcrumb-item">
            <a href="#" style="color: #64748b; text-decoration: none; transition: color 0.3s;">
                <i class="bi bi-house-door-fill"></i>
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="#" style="color: #64748b; text-decoration: none;">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" style="color: var(--primary-green); font-weight: 600;">
            Dokumentasi
        </li>
    </ol>
</nav>

<!-- Main Card -->
<div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
    <!-- Card Header -->
    <div class="card-header" style="background: white; border-bottom: 1px solid #e2e8f0; padding: 1.5rem;">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h5 class="mb-1" style="font-weight: 700; color: var(--dark-bg); display: flex; align-items: center; gap: 0.75rem;">
                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary-green), var(--primary-dark)); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-camera-fill text-white"></i>
                    </div>
                    Dokumentasi Tanah
                </h5>
                <p class="mb-0 text-muted" style="font-size: 0.875rem; margin-top: 0.5rem;">
                    Galeri foto dan dokumentasi lahan di wilayah Kelurahan Bina Dera
                </p>
            </div>
            <button type="button"
                onclick="document.getElementById('fotoInput').click()"
                style="background: linear-gradient(135deg, var(--primary-green), var(--primary-dark));
                          color: white;
                          padding: 0.75rem 1.5rem;
                          border-radius: 12px;
                          text-decoration: none;
                          font-weight: 600;
                          font-size: 0.9375rem;
                          display: inline-flex;
                          align-items: center;
                          gap: 0.5rem;
                          box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
                          transition: all 0.3s ease;
                          border: none;
                          cursor: pointer;">
                <i class="bi bi-plus-circle-fill" style="font-size: 1.125rem;"></i>
                <span>Tambah Foto</span>
            </button>
        </div>
    </div>

    <!-- Card Body -->
    <div class="card-body p-4">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert"
            style="border: none; border-radius: 12px; background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.1)); border-left: 4px solid var(--primary-green);">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <i class="bi bi-check-circle-fill" style="color: var(--primary-green); font-size: 1.5rem;"></i>
                <div style="flex: 1;">
                    <strong style="color: var(--primary-green);">Berhasil!</strong>
                    <div style="color: #059669; margin-top: 0.25rem;">{{ session('success') }}</div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert"
            style="border: none; border-radius: 12px; background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.1)); border-left: 4px solid #ef4444;">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <i class="bi bi-exclamation-circle-fill" style="color: #ef4444; font-size: 1.5rem;"></i>
                <div style="flex: 1;">
                    <strong style="color: #ef4444;">Error!</strong>
                    <div style="color: #dc2626; margin-top: 0.25rem;">{{ session('error') }}</div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif

        @if($data->isEmpty())
        <!-- Empty State -->
        <div style="text-align: center; padding: 4rem 1rem;">
            <div style="width: 120px; height: 120px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.1)); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-images" style="font-size: 4rem; color: var(--primary-green);"></i>
            </div>
            <h5 style="font-weight: 700; color: var(--dark-bg); margin-bottom: 0.75rem;">Belum Ada Dokumentasi</h5>
            <p style="color: #64748b; margin-bottom: 1.5rem;">Mulai upload foto dokumentasi tanah dengan klik tombol "Tambah Foto" di atas</p>
            <button type="button"
                onclick="document.getElementById('fotoInput').click()"
                style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.5rem; background: linear-gradient(135deg, var(--primary-green), var(--primary-dark)); color: white; border-radius: 10px; text-decoration: none; font-weight: 600; border: none; cursor: pointer;">
                <i class="bi bi-camera-fill"></i>
                <span>Upload Foto Pertama</span>
            </button>
        </div>
        @else
        <!-- Gallery Grid -->
        <div class="row g-4">
            @foreach($data as $item)
            <div class="col-md-4 col-lg-3">
                <div class="dokumentasi-card" style="border-radius: 16px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: all 0.3s ease; background: white;">
                    <!-- Image Container -->
                    <div style="position: relative; padding-top: 100%; overflow: hidden; background: #f1f5f9;">
                        <img
                            src="{{ asset('uploads/dokumentasi/'.$item->foto) }}"
                            style="position:absolute; top:0; left:0; width:100%; height:100%; object-fit:cover;">


                        <!-- Overlay on Hover -->
                        <div class="dokumentasi-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.7)); opacity: 0; transition: opacity 0.3s ease; display: flex; flex-direction: column; justify-content: flex-end; padding: 1rem;">
                            <div style="color: white; font-weight: 600; font-size: 0.875rem; margin-bottom: 0.5rem;">{{ $item->judul }}</div>
                            @if($item->tanggal_foto)
                            <div style="color: rgba(255,255,255,0.8); font-size: 0.75rem; margin-bottom: 0.5rem;">
                                <i class="bi bi-calendar-event"></i> {{ $item->tanggal_foto->format('d M Y') }}
                            </div>
                            @endif
                            @if($item->lokasi)
                            <div style="color: rgba(255,255,255,0.8); font-size: 0.75rem;">
                                <i class="bi bi-geo-alt"></i> {{ $item->lokasi }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Card Footer -->
                    <div style="padding: 1rem;">
                        <h6 style="font-weight: 600; color: var(--dark-bg); margin-bottom: 0.5rem; font-size: 0.875rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                            {{ $item->judul }}
                        </h6>

                        @if($item->keterangan)
                        <p style="color: #64748b; font-size: 0.75rem; margin-bottom: 0.75rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                            {{ $item->keterangan }}
                        </p>
                        @endif

                        <!-- Action Button -->
                        <div style="display: flex; gap: 0.5rem;">
                            <form action="{{ route('dokumentasi.destroy', $item->dokumentasi_id) }}"
                                method="POST"
                                class="flex-1 delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    class="btn-delete"
                                    style="width: 100%; padding: 0.5rem; background: linear-gradient(135deg, #ef4444, #dc2626); color: white; border-radius: 8px; font-size: 0.75rem; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 0.375rem; transition: all 0.3s ease; border: none; cursor: pointer;">
                                    <i class="bi bi-trash-fill"></i>
                                    <span>Hapus</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $data->links('pagination::bootstrap-5') }}
        </div>
        @endif
    </div>
</div>

<!-- Hidden Form for Upload -->
<form id="uploadForm" action="{{ route('dokumentasi.store') }}" method="POST" enctype="multipart/form-data" style="display: none;">
    @csrf
    <input type="file"
        id="fotoInput"
        name="foto"
        accept="image/jpeg,image/png,image/jpg"
        onchange="handleFileSelect(event)">
</form>

<!-- Modal Upload dengan Bootstrap -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
        <div class="modal-content" style="border-radius: 16px; border: none;">
            <div class="modal-header" style="background: linear-gradient(135deg, var(--primary-green), var(--primary-dark)); border: none; padding: 1.5rem;">
                <h5 class="modal-title" id="uploadModalLabel" style="font-weight: 700; color: white; display: flex; align-items: center; gap: 0.75rem;">
                    <i class="bi bi-camera-fill" style="font-size: 1.5rem;"></i>
                    Upload Dokumentasi Baru
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 2rem;">
                <!-- Preview Image -->
                <div class="mb-4">
                    <div style="width: 100%; height: 250px; border-radius: 12px; overflow: hidden; background: #f1f5f9; display: flex; align-items: center; justify-content: center;">
                        <img id="modalPreview" src="" alt="Preview" style="width: 100%; height: 100%; object-fit: contain; display: none;">
                        <div id="modalPlaceholder" style="text-align: center; color: #94a3b8;">
                            <i class="bi bi-image" style="font-size: 3rem; display: block; margin-bottom: 0.5rem;"></i>
                            <span>Preview Foto</span>
                        </div>
                    </div>
                </div>

                <form id="modalUploadForm" action="{{ route('dokumentasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="modalFotoInput" name="foto" style="display: none;" required>

                    <!-- Judul -->
                    <div class="mb-3">
                        <label for="modalJudul" style="display: block; font-weight: 600; color: var(--dark-bg); margin-bottom: 0.5rem;">
                            <i class="bi bi-card-heading"></i> Judul Dokumentasi <span style="color: #ef4444;">*</span>
                        </label>
                        <input type="text"
                            class="form-control"
                            id="modalJudul"
                            name="judul"
                            placeholder="Contoh: Lahan Pertanian Blok A"
                            style="border-radius: 10px;"
                            required>
                    </div>

                    <!-- Keterangan -->
                    <div class="mb-3">
                        <label for="modalKeterangan" style="display: block; font-weight: 600; color: var(--dark-bg); margin-bottom: 0.5rem;">
                            <i class="bi bi-card-text"></i> Keterangan
                        </label>
                        <textarea class="form-control"
                            id="modalKeterangan"
                            name="keterangan"
                            rows="3"
                            placeholder="Deskripsi singkat..."
                            style="border-radius: 10px;"></textarea>
                    </div>

                    <!-- Tanggal & Lokasi -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="modalTanggal" style="display: block; font-weight: 600; color: var(--dark-bg); margin-bottom: 0.5rem;">
                                <i class="bi bi-calendar-event"></i> Tanggal Foto
                            </label>
                            <input type="date"
                                class="form-control"
                                id="modalTanggal"
                                name="tanggal_foto"
                                value="{{ date('Y-m-d') }}"
                                style="border-radius: 10px;">
                        </div>
                        <div class="col-md-6">
                            <label for="modalLokasi" style="display: block; font-weight: 600; color: var(--dark-bg); margin-bottom: 0.5rem;">
                                <i class="bi bi-geo-alt"></i> Lokasi
                            </label>
                            <input type="text"
                                class="form-control"
                                id="modalLokasi"
                                name="lokasi"
                                placeholder="Lokasi pengambilan foto"
                                style="border-radius: 10px;">
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div style="display: flex; gap: 0.75rem; margin-top: 1.5rem;">
                        <button type="submit"
                            style="flex: 1; padding: 0.75rem; background: linear-gradient(135deg, var(--primary-green), var(--primary-dark)); color: white; border: none; border-radius: 10px; font-weight: 600; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Upload</span>
                        </button>
                        <button type="button"
                            data-bs-dismiss="modal"
                            style="flex: 1; padding: 0.75rem; background: #94a3b8; color: white; border: none; border-radius: 10px; font-weight: 600; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                            <i class="bi bi-x-circle-fill"></i>
                            <span>Batal</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    /* Card Hover Effects */
    .dokumentasi-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .dokumentasi-card:hover .dokumentasi-overlay {
        opacity: 1;
    }

    /* Button Hover */
    .btn-delete:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
    }

    button[onclick*="fotoInput"]:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
    }

    /* Modal Styling */
    .modal-backdrop.show {
        opacity: 0.7;
    }

    /* Breadcrumb Hover */
    .breadcrumb-item a:hover {
        color: var(--primary-green) !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Delete Confirmation
        const deleteButtons = document.querySelectorAll('.btn-delete');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('form');

                Swal.fire({
                    title: 'Hapus Dokumentasi?',
                    html: "Foto dokumentasi akan dihapus secara <strong>permanen</strong> dan tidak bisa dikembalikan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Menghapus...',
                            text: 'Mohon tunggu sebentar',
                            icon: 'info',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            timer: 1000,
                            willClose: () => {
                                form.submit();
                            }
                        });
                    }
                });
            });
        });
    });

    // Handle file selection
    function handleFileSelect(event) {
        const file = event.target.files[0];
        if (file) {
            // Validasi ukuran file (maks 2MB)
            if (file.size > 2048 * 1024) {
                Swal.fire({
                    icon: 'error',
                    title: 'File Terlalu Besar',
                    text: 'Ukuran file maksimal 2MB',
                    confirmButtonText: 'OK'
                });
                event.target.value = '';
                return;
            }

            // Validasi tipe file
            if (!file.type.match('image/jpeg') && !file.type.match('image/png') && !file.type.match('image/jpg')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Format Tidak Didukung',
                    text: 'Hanya file JPG, JPEG, dan PNG yang diperbolehkan',
                    confirmButtonText: 'OK'
                });
                event.target.value = '';
                return;
            }

            // Preview di modal
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('modalPreview').src = e.target.result;
                document.getElementById('modalPreview').style.display = 'block';
                document.getElementById('modalPlaceholder').style.display = 'none';

                // Transfer file ke form modal
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                document.getElementById('modalFotoInput').files = dataTransfer.files;

                // Tampilkan modal
                const uploadModal = new bootstrap.Modal(document.getElementById('uploadModal'));
                uploadModal.show();
            };
            reader.readAsDataURL(file);
        }
    }

    // Reset modal ketika ditutup
    document.getElementById('uploadModal').addEventListener('hidden.bs.modal', function() {
        document.getElementById('modalUploadForm').reset();
        document.getElementById('modalPreview').style.display = 'none';
        document.getElementById('modalPreview').src = '';
        document.getElementById('modalPlaceholder').style.display = 'block';
        document.getElementById('fotoInput').value = '';
        document.getElementById('modalFotoInput').value = '';
    });
</script>
@endsection