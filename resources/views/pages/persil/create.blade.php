@extends('layouts.app')

@section('title', 'Tambah Data Persil')

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
            Tambah Data
        </li>
    </ol>
</nav>

<div class="card border-0 shadow-sm" style="border-radius: 16px;">
    <div class="card-header" style="background: white; border-bottom: 1px solid #e2e8f0; padding: 1.5rem;">
        <h5 class="mb-0" style="font-weight: 700;">
            <i class="bi bi-plus-circle-fill text-success me-2"></i>
            Tambah Data Persil
        </h5>
    </div>

    <div class="card-body" style="padding: 2rem;">
        <form action="{{ route('persil.store') }}" method="POST" enctype="multipart/form-data" id="persilForm">
            @csrf

            <div class="row g-4">

                <!-- Kode Persil -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Kode Persil <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="kode_persil" 
                           class="form-control @error('kode_persil') is-invalid @enderror" 
                           value="{{ old('kode_persil') }}"
                           placeholder="Contoh: PRS-001"
                           required>
                    @error('kode_persil')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nama Pemilik -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Nama Pemilik <span class="text-danger">*</span>
                    </label>
                    <select name="pemilik_warga_id" 
                            class="form-select @error('pemilik_warga_id') is-invalid @enderror" 
                            required>
                        <option value="">-- Pilih Warga --</option>
                        @foreach($warga as $item)
                            <option value="{{ $item->warga_id }}" {{ old('pemilik_warga_id') == $item->warga_id ? 'selected' : '' }}>
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
                    <label class="form-label fw-semibold">
                        Luas (m²) <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="luas_m2"
                           class="form-control @error('luas_m2') is-invalid @enderror"
                           value="{{ old('luas_m2') }}"
                           placeholder="Contoh: 500"
                           required>
                    @error('luas_m2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Penggunaan -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Penggunaan <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="penggunaan"
                           class="form-control @error('penggunaan') is-invalid @enderror"
                           value="{{ old('penggunaan') }}"
                           placeholder="Contoh: Perumahan"
                           required>
                    @error('penggunaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Alamat Lahan -->
                <div class="col-md-12">
                    <label class="form-label fw-semibold">
                        Alamat Lahan <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="alamat_lahan"
                           class="form-control @error('alamat_lahan') is-invalid @enderror"
                           value="{{ old('alamat_lahan') }}"
                           placeholder="Jl. Contoh No. 123"
                           required>
                    @error('alamat_lahan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- RT -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        RT <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="rt"
                           class="form-control @error('rt') is-invalid @enderror"
                           value="{{ old('rt') }}"
                           placeholder="Contoh: 01"
                           required>
                    @error('rt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- RW -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        RW <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="rw"
                           class="form-control @error('rw') is-invalid @enderror"
                           value="{{ old('rw') }}"
                           placeholder="Contoh: 05"
                           required>
                    @error('rw')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Upload Files Section -->
                <div class="col-12">
                    <hr class="my-4">
                    <h6 class="mb-3 fw-bold">
                        <i class="bi bi-cloud-upload text-success me-2"></i>
                        Upload Dokumen Pendukung
                    </h6>
                    <p class="text-muted small mb-3">
                        Upload foto persil, sertifikat, peta, atau dokumen pendukung lainnya. 
                        Format: JPG, PNG, PDF, DOC, XLS (Max 5MB per file)
                    </p>

                    <!-- Dropzone Area -->
                    <div class="upload-area border-2 border-dashed rounded-3 p-4 text-center" 
                         style="border-color: #cbd5e1; background: #f8fafc; cursor: pointer; transition: all 0.3s;"
                         id="uploadArea">
                        <i class="bi bi-cloud-arrow-up display-4 text-muted mb-3"></i>
                        <h6 class="mb-2">Klik atau Drag & Drop File Di Sini</h6>
                        <p class="text-muted small mb-0">Maksimal 5MB per file</p>
                        <input type="file" name="files[]" id="fileInput" multiple 
                               accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.xls,.xlsx"
                               style="display: none;">
                    </div>

                    <!-- Preview Area -->
                    <div id="filePreview" class="mt-3"></div>
                </div>

            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-end gap-3 mt-4">
                <a href="{{ route('persil.index') }}" class="btn btn-light px-4">
                    <i class="bi bi-x-circle me-1"></i> Batal
                </a>
                <button type="submit" class="btn btn-success px-4">
                    <i class="bi bi-check-circle me-1"></i> Simpan Data
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
        transition: all 0.3s;
    }

    .file-preview-item:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transform: translateY(-2px);
    }

    .file-icon {
        width: 48px;
        height: 48px;
        background: #f1f5f9;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .btn-remove-file {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fee2e2;
        color: #dc2626;
        border: none;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-remove-file:hover {
        background: #dc2626;
        color: white;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('fileInput');
    const filePreview = document.getElementById('filePreview');
    let selectedFiles = [];

    // Click to upload
    uploadArea.addEventListener('click', () => fileInput.click());

    // Drag & Drop
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

    // File input change
    fileInput.addEventListener('change', (e) => {
        handleFiles(e.target.files);
    });

    function handleFiles(files) {
        const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf', 
                           'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                           'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
        const maxSize = 5 * 1024 * 1024; // 5MB

        Array.from(files).forEach(file => {
            if (!validTypes.includes(file.type)) {
                alert(`File ${file.name} tidak didukung. Gunakan format JPG, PNG, PDF, DOC, atau XLS.`);
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
                                `<div class="file-icon text-primary">
                                    <i class="bi ${icon}"></i>
                                </div>`
                            }
                            
                            <div class="flex-grow-1">
                                <div class="fw-semibold">${file.name}</div>
                                <div class="text-muted small">${formatFileSize(file.size)}</div>
                                <input type="text" name="captions[]" class="form-control form-control-sm mt-2" 
                                       placeholder="Keterangan file (opsional)">
                            </div>

                            <button type="button" class="btn-remove-file" onclick="removeFile(${index})">
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