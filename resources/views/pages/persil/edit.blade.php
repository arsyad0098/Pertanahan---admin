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

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle me-2"></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card border-0 shadow-sm" style="border-radius: 16px;">
    <div class="card-header" style="background: white; border-bottom: 1px solid #e2e8f0; padding: 1.5rem;">
        <h5 class="mb-0 fw-bold">
            <i class="bi bi-pencil-square text-warning me-2"></i>
            Edit Data Persil
        </h5>
    </div>

    <div class="card-body p-4">
        <form action="{{ route('persil.update', $persil->persil_id) }}" method="POST" enctype="multipart/form-data">
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
                    <input type="text" name="rt" class="form-control"
                           value="{{ $persil->rt }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">RW</label>
                    <input type="text" name="rw" class="form-control"
                           value="{{ $persil->rw }}" required>
                </div>

                <!-- File yang sudah ada -->
                @if($persil->media->count() > 0)
                <div class="col-12">
                    <hr class="my-4">
                    <h6 class="mb-3 fw-bold">
                        <i class="bi bi-file-earmark-check text-primary me-2"></i>
                        File yang Sudah Diupload
                    </h6>

                    <div class="row g-3">
                        @foreach($persil->media as $media)
                        <div class="col-md-4" id="media-{{ $media->media_id }}">
                            <div class="card border h-100">
                                <div class="card-body p-3">
                                    @if($media->isImage())
                                        <img src="{{ asset('storage/uploads/' . $media->file_name) }}" 
                                             class="img-fluid rounded mb-2" 
                                             style="max-height: 150px; width: 100%; object-fit: cover;">
                                    @else
                                        <div class="text-center py-4">
                                            <i class="bi {{ $media->icon }} display-3 text-primary"></i>
                                        </div>
                                    @endif

                                    <div class="small text-muted mb-2">{{ $media->file_name }}</div>
                                    
                                    @if($media->caption)
                                    <div class="small mb-2">
                                        <strong>Keterangan:</strong> {{ $media->caption }}
                                    </div>
                                    @endif

                                    <div class="d-flex gap-2 mt-2">
                                        <a href="{{ asset('storage/uploads/' . $media->file_name) }}" 
                                           target="_blank" 
                                           class="btn btn-sm btn-outline-primary flex-grow-1">
                                            <i class="bi bi-eye"></i> Lihat
                                        </a>
                                        <button type="button" 
                                                class="btn btn-sm btn-outline-danger btn-delete-media"
                                                data-persil-id="{{ $persil->persil_id }}"
                                                data-media-id="{{ $media->media_id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Upload File Baru -->
                <div class="col-12">
                    <hr class="my-4">
                    <h6 class="mb-3 fw-bold">
                        <i class="bi bi-cloud-upload text-success me-2"></i>
                        Tambah File Baru
                    </h6>

                    <div class="upload-area border-2 border-dashed rounded-3 p-4 text-center" 
                         style="border-color: #cbd5e1; background: #f8fafc; cursor: pointer;"
                         id="uploadArea">
                        <i class="bi bi-cloud-arrow-up display-4 text-muted mb-3"></i>
                        <h6 class="mb-2">Klik atau Drag & Drop File Di Sini</h6>
                        <p class="text-muted small mb-0">Maksimal 5MB per file</p>
                        <input type="file" name="files[]" id="fileInput" multiple 
                               accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.xls,.xlsx"
                               style="display: none;">
                    </div>

                    <div id="filePreview" class="mt-3"></div>
                </div>

            </div>

            <div class="mt-4 d-flex justify-content-end gap-2">
                <a href="{{ route('persil.index') }}" class="btn btn-light px-4">
                    <i class="bi bi-x-circle me-1"></i> Batal
                </a>

                <button type="submit" class="btn btn-success px-4">
                    <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>

<style>
    .upload-area:hover {
        border-color: var(--primary-green) !important;
        background: #f0fdf4 !important;
    }

    .file-preview-item {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 1rem;
        margin-bottom: 0.75rem;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Event delegation untuk tombol delete media
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('btn-delete-media') || e.target.closest('.btn-delete-media')) {
        const btn = e.target.classList.contains('btn-delete-media') ? e.target : e.target.closest('.btn-delete-media');
        const persilId = btn.getAttribute('data-persil-id');
        const mediaId = btn.getAttribute('data-media-id');
        
        deleteMedia(persilId, mediaId);
    }
});

function deleteMedia(persilId, mediaId) {
    Swal.fire({
        title: 'Hapus File?',
        text: 'File akan dihapus permanen!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/persil/${persilId}/media/${mediaId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById(`media-${mediaId}`).remove();
                    Swal.fire('Terhapus!', data.message || 'File dihapus', 'success');
                } else {
                    Swal.fire('Error!', data.message || 'Gagal menghapus file', 'error');
                }
            })
            .catch(error => {
                console.error(error);
                Swal.fire('Error!', 'Terjadi kesalahan', 'error');
            });
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('fileInput');
    const filePreview = document.getElementById('filePreview');
    let selectedFiles = [];

    uploadArea.addEventListener('click', () => fileInput.click());

    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = 'var(--primary-green)';
        uploadArea.style.background = '#f0fdf4';
    });

    uploadArea.addEventListener('dragleave', () => {
        uploadArea.style.borderColor = '#cbd5e1';
        uploadArea.style.background = '#f8fafc';
    });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = '#cbd5e1';
        uploadArea.style.background = '#f8fafc';
        handleFiles(e.dataTransfer.files);
    });

    fileInput.addEventListener('change', (e) => handleFiles(e.target.files));

    function handleFiles(files) {
        const validTypes = [
            'image/jpeg','image/jpg','image/png',
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ];
        const maxSize = 5 * 1024 * 1024;

        Array.from(files).forEach(file => {
            if (!validTypes.includes(file.type)) {
                alert(`File ${file.name} tidak didukung.`);
                return;
            }
            if (file.size > maxSize) {
                alert(`File ${file.name} terlalu besar. Maksimal 5MB.`);
                return;
            }
            selectedFiles.push(file);
        });

        renderPreview();
        updateFileInput();
    }

    function renderPreview() {
        filePreview.innerHTML = '';

        selectedFiles.forEach((file, index) => {
            const reader = new FileReader();
            
            reader.onload = (e) => {
                const isImage = file.type.startsWith('image/');
                const icon = getFileIcon(file.type);

                const html = `
                    <div class="file-preview-item">
                        <div class="d-flex align-items-center gap-3">
                            ${isImage ? 
                                `<img src="${e.target.result}" alt="${file.name}" 
                                      style="width: 60px; height: 60px; object-fit: cover; border-radius: 10px;">` :
                                `<div style="width: 48px; height: 48px; background: #f1f5f9; border-radius: 10px; 
                                            display: flex; align-items: center; justify-content: center;">
                                    <i class="bi ${icon} text-primary fs-4"></i>
                                </div>`
                            }
                            
                            <div class="flex-grow-1">
                                <div class="fw-semibold">${file.name}</div>
                                <div class="text-muted small">${formatFileSize(file.size)}</div>
                                <input type="text" name="captions[]" class="form-control form-control-sm mt-2" 
                                       placeholder="Keterangan file (opsional)">
                            </div>

                            <button type="button" class="btn btn-sm btn-danger" onclick="removeFile(${index})">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                `;

                filePreview.innerHTML += html;
            };

            reader.readAsDataURL(file);
        });
    }

    window.removeFile = function(index) {
        selectedFiles.splice(index, 1);
        renderPreview();
        updateFileInput();
    };

    function updateFileInput() {
        const dt = new DataTransfer();
        selectedFiles.forEach(file => dt.items.add(file));
        fileInput.files = dt.files;
    }

    function getFileIcon(mimeType) {
        if (mimeType.includes('pdf')) return 'bi-file-pdf-fill';
        if (mimeType.includes('word')) return 'bi-file-word-fill';
        if (mimeType.includes('excel') || mimeType.includes('spreadsheet')) return 'bi-file-excel-fill';
        return 'bi-file-earmark-fill';
    }

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
    }
});
</script>

@endsection