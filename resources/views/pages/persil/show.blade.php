@extends('layouts.app')

@section('title', 'Detail Persil')

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
            Detail Persil
        </li>
    </ol>
</nav>

<!-- Tombol Kembali -->
<div class="mb-3">
    <a href="{{ route('persil.index') }}" 
       class="btn btn-outline-secondary"
       style="border-radius: 10px; padding: 0.5rem 1.25rem;">
        <i class="bi bi-arrow-left"></i> Kembali ke Daftar
    </a>
</div>

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle me-2"></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="row g-4">
    
    <!-- Informasi Persil -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
            <div class="card-header" style="background: white; border-bottom: 1px solid #e2e8f0; padding: 1.5rem;">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">
                        <i class="bi bi-info-circle text-primary me-2"></i>
                        Informasi Persil
                    </h5>
                    <a href="{{ route('persil.edit', $persil->persil_id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                </div>
            </div>

            <div class="card-body p-4">
                <div class="row g-4">
                    
                    <div class="col-md-6">
                        <label class="text-muted small fw-semibold mb-1">Kode Persil</label>
                        <div class="fs-5 fw-bold text-success">{{ $persil->kode_persil }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="text-muted small fw-semibold mb-1">Nama Pemilik</label>
                        <div class="fs-6 fw-semibold">{{ $persil->warga->nama ?? '-' }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="text-muted small fw-semibold mb-1">Luas Tanah</label>
                        <div class="fs-6">
                            <span class="badge bg-primary px-3 py-2" style="font-size: 1rem;">
                                {{ $persil->luas_m2 }} m²
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="text-muted small fw-semibold mb-1">Penggunaan</label>
                        <div class="fs-6">
                            <span class="badge bg-info px-3 py-2" style="font-size: 0.95rem;">
                                {{ $persil->penggunaan }}
                            </span>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="text-muted small fw-semibold mb-1">Alamat Lahan</label>
                        <div class="fs-6">
                            <i class="bi bi-geo-alt text-danger me-2"></i>
                            {{ $persil->alamat_lahan }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="text-muted small fw-semibold mb-1">RT</label>
                        <div class="fs-6">RT {{ $persil->rt }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="text-muted small fw-semibold mb-1">RW</label>
                        <div class="fs-6">RW {{ $persil->rw }}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Summary -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm" style="border-radius: 16px; background: linear-gradient(135deg, var(--primary-green), var(--primary-dark)); color: white;">
            <div class="card-body p-4">
                <h6 class="mb-3 opacity-75">Ringkasan</h6>
                
                <div class="mb-3">
                    <div class="small opacity-75">Total File</div>
                    <div class="fs-3 fw-bold">{{ $persil->media->count() }}</div>
                </div>

                <div class="mb-3">
                    <div class="small opacity-75">Foto/Gambar</div>
                    <div class="fs-4 fw-bold">{{ $persil->images()->count() }}</div>
                </div>

                <div>
                    <div class="small opacity-75">Dokumen</div>
                    <div class="fs-4 fw-bold">{{ $persil->documents()->count() }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Galeri Foto -->
    @php
        $images = $persil->images()->get();
    @endphp
    
    @if($images->count() > 0)
    <div class="col-12">
        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
            <div class="card-header" style="background: white; border-bottom: 1px solid #e2e8f0; padding: 1.5rem;">
                <h5 class="mb-0 fw-bold">
                    <i class="bi bi-images text-success me-2"></i>
                    Galeri Foto ({{ $images->count() }})
                </h5>
            </div>

            <div class="card-body p-4">
                <div class="row g-3">
                    @foreach($images as $image)
                    <div class="col-md-4 col-lg-3">
                        <div class="position-relative gallery-item" style="border-radius: 12px; overflow: hidden;">
                            <img src="{{ asset('storage/uploads/' . $image->file_name) }}" 
                                 class="img-fluid w-100 gallery-image" 
                                 style="height: 200px; object-fit: cover; cursor: pointer;"
                                 data-image-url="{{ asset('storage/uploads/' . $image->file_name) }}"
                                 data-caption="{{ $image->caption ?? $persil->kode_persil }}"
                                 alt="{{ $image->caption ?? $persil->kode_persil }}">
                            
                            @if($image->caption)
                            <div class="position-absolute bottom-0 start-0 end-0 p-2" 
                                 style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                                <small class="text-white">{{ $image->caption }}</small>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Dokumen Pendukung -->
    @php
        $documents = $persil->documents()->get();
    @endphp
    
    @if($documents->count() > 0)
    <div class="col-12">
        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
            <div class="card-header" style="background: white; border-bottom: 1px solid #e2e8f0; padding: 1.5rem;">
                <h5 class="mb-0 fw-bold">
                    <i class="bi bi-file-earmark-text text-primary me-2"></i>
                    Dokumen Pendukung ({{ $documents->count() }})
                </h5>
            </div>

            <div class="card-body p-4">
                <div class="list-group list-group-flush">
                    @foreach($documents as $doc)
                    <div class="list-group-item border-0 px-0">
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 48px; height: 48px; background: #f1f5f9; border-radius: 10px; 
                                        display: flex; align-items: center; justify-content: center;">
                                <i class="bi {{ $doc->icon }} fs-3 text-primary"></i>
                            </div>

                            <div class="flex-grow-1">
                                <div class="fw-semibold">{{ $doc->file_name }}</div>
                                @if($doc->caption)
                                <div class="text-muted small">{{ $doc->caption }}</div>
                                @endif
                            </div>

                            <a href="{{ asset('storage/uploads/' . $doc->file_name) }}" 
                               target="_blank" 
                               class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-download"></i> Download
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($persil->media->count() == 0)
    <div class="col-12">
        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
            <div class="card-body text-center py-5">
                <i class="bi bi-inbox display-1 text-muted"></i>
                <h5 class="mt-3 text-muted">Belum Ada File</h5>
                <p class="text-muted">Silakan upload foto atau dokumen pendukung</p>
                <a href="{{ route('persil.edit', $persil->persil_id) }}" class="btn btn-success">
                    <i class="bi bi-upload"></i> Upload File
                </a>
            </div>
        </div>
    </div>
    @endif

</div>

<!-- Modal untuk preview gambar -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border-radius: 16px; overflow: hidden;">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="imageModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <img id="modalImage" src="" class="img-fluid w-100">
            </div>
        </div>
    </div>
</div>

<style>
    .gallery-item {
        transition: transform 0.3s ease;
    }

    .gallery-item:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
</style>

<script>
// Event delegation untuk gallery images
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('gallery-image')) {
        const imageUrl = e.target.getAttribute('data-image-url');
        const caption = e.target.getAttribute('data-caption');
        openImageModal(imageUrl, caption);
    }
});

function openImageModal(imageUrl, caption) {
    document.getElementById('modalImage').src = imageUrl;
    document.getElementById('imageModalLabel').textContent = caption;
    
    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
    modal.show();
}
</script>

@endsection