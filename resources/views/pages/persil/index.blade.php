@extends('layouts.app')

@section('title', 'Data Persil')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb" style="background: transparent; padding: 0;">
        <li class="breadcrumb-item">
            <a href="#" style="color: #64748b; text-decoration: none;">
                <i class="bi bi-house-door-fill"></i>
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="#" style="color: #64748b; text-decoration: none;">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" style="color: var(--primary-green); font-weight: 600;">
            Data Persil
        </li>
    </ol>
</nav>

<!-- Main Card -->
<div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">

    <!-- Card Header -->
    <div class="card-header" style="background: white; border-bottom: 1px solid #e2e8f0; padding: 1.5rem;">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h5 class="mb-1" style="font-weight: 700; display: flex; align-items: center; gap: 0.75rem;">
                    <div style="width: 40px; height: 40px;
                                    background: linear-gradient(135deg, var(--primary-green), var(--primary-dark));
                                    border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-grid-fill text-white"></i>
                    </div>
                    Data Persil
                </h5>
                <p class="mb-0 text-muted" style="font-size: 0.875rem;">
                    Kelola data persil & kepemilikan lahan warga
                </p>
            </div>

            <a href="{{ route('persil.create') }}"
                style="background: linear-gradient(135deg, var(--primary-green), var(--primary-dark));
                          color: white; padding: 0.75rem 1.5rem; border-radius: 12px;
                          text-decoration: none; font-weight: 600;">
                <i class="bi bi-plus-circle-fill"></i> Tambah Persil
            </a>
        </div>
    </div>

    <!-- Card Body -->
    <div class="card-body p-0">

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert"
            style="border-radius: 12px; border-left: 4px solid var(--primary-green);
                            background: rgba(16,185,129,0.06);">
            <strong>Berhasil!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <!-- Search & Filters -->
        <div class="px-3 py-3" style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
            <form method="GET" action="{{ route('persil.index') }}" id="searchForm">
                <div class="row g-3 align-items-center">

                    <!-- Search (server-side) -->
                    <div class="col-md-6">
                        <div style="position: relative;">
                            <i class="bi bi-search"
                                style="position: absolute; left: 1rem; top: 50%;
                                          transform: translateY(-50%); color: #64748b;"></i>
                            <input type="text"
                                name="search"
                                class="form-control"
                                placeholder="Cari kode persil, pemilik, RT atau RW..."
                                style="padding-left: 2.75rem; border-radius: 10px;"
                                value="{{ request('search') }}">
                            
                            @if(request('search'))
                            <a href="{{ route('persil.index', ['rt' => request('rt'), 'rw' => request('rw')]) }}" 
                               class="btn btn-sm"
                               style="position: absolute; right: 0.5rem; top: 50%; transform: translateY(-50%); 
                                      background: transparent; border: none; color: #64748b;"
                               title="Clear search">
                                <i class="bi bi-x-circle-fill"></i>
                            </a>
                            @endif
                        </div>
                    </div>

                    <!-- Filter RT -->
                    <div class="col-md-3">
                        <select name="rt" class="form-select" style="border-radius: 10px;" onchange="this.form.submit()">
                            <option value="">Semua RT</option>
                            @for ($i = 1; $i <= 30; $i++)
                                <option value="{{ sprintf('%02d', $i) }}" {{ request('rt') == sprintf('%02d', $i) ? 'selected' : '' }}>
                                    RT {{ sprintf('%02d', $i) }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <!-- Filter RW -->
                    <div class="col-md-3">
                        <select name="rw" class="form-select" style="border-radius: 10px;" onchange="this.form.submit()">
                            <option value="">Semua RW</option>
                            @for ($i = 1; $i <= 30; $i++)
                                <option value="{{ sprintf('%02d', $i) }}" {{ request('rw') == sprintf('%02d', $i) ? 'selected' : '' }}>
                                    RW {{ sprintf('%02d', $i) }}
                                </option>
                            @endfor
                        </select>
                    </div>

                </div>
            </form>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="dataTable">
                <thead style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                    <tr>
                        <th style="padding: 1rem;">NO</th>
                        <th style="padding: 1rem;">KODE PERSIL</th>
                        <th style="padding: 1rem;">NAMA PEMILIK</th>
                        <th style="padding: 1rem;">ALAMAT LAHAN</th>
                        <th style="padding: 1rem;">LUAS</th>
                        <th style="padding: 1rem;">RT</th>
                        <th style="padding: 1rem;">RW</th>
                        <th style="padding: 1rem;">PENGGUNAAN</th>
                        <th style="padding: 1rem; text-align:center;">AKSI</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($data as $index => $item)
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 1.25rem 1rem; font-weight:600; color:#64748b;">
                            {{ ($data->currentPage() - 1) * $data->perPage() + $index + 1 }}
                        </td>

                        <td style="padding: 1.25rem 1rem; font-weight:600; color:#0f172a;">
                            {{ $item->kode_persil }}
                        </td>

                        <td style="padding: 1.25rem 1rem;">
                            {{ $item->warga->nama ?? $item->nama_pemilik ?? '-' }}
                        </td>

                        <td style="padding: 1.25rem 1rem;">
                            {{ $item->alamat_lahan ?? '-' }}
                        </td>

                        <td style="padding: 1.25rem 1rem; font-weight:600;">
                            {{ $item->luas_m2 ?? $item->luas ?? '-' }} m²
                        </td>

                        <td style="padding: 1.25rem 1rem;">
                            {{ $item->rt ?? '-' }}
                        </td>

                        <td style="padding: 1.25rem 1rem;">
                            {{ $item->rw ?? '-' }}
                        </td>

                        <td style="padding: 1.25rem 1rem;">
                            {{ $item->penggunaan ?? '-' }}
                        </td>

                        <td style="padding: 1.25rem 1rem; text-align:center;">
                            <div style="display:flex; gap:0.5rem; justify-content:center;">

                                <a href="{{ route('persil.edit', $item->persil_id) }}"
                                    class="btn btn-sm btn-warning text-white"
                                    title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('persil.destroy', $item->persil_id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button" class="btn btn-sm btn-danger btn-delete" title="Hapus">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" style="padding:3rem; text-align:center; color:#94a3b8;">
                            <i class="bi bi-inbox" style="font-size:3rem;"></i>
                            <div style="font-size:1.125rem; font-weight:600;">
                                @if(request('search'))
                                    Tidak ada hasil untuk "{{ request('search') }}"
                                @else
                                    Belum Ada Data
                                @endif
                            </div>
                            <div style="font-size:0.875rem;">
                                @if(request('search'))
                                    Coba kata kunci lain atau <a href="{{ route('persil.index') }}">hapus pencarian</a>
                                @else
                                    Klik "Tambah Persil" untuk menambahkan data
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4 d-flex justify-content-end pe-4">
                {{ $data->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <!-- Card Footer -->
    <div class="card-footer" style="background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 1rem 1.5rem;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
            <div style="color: #64748b; font-size: 0.875rem;">
                @if(request('search'))
                    Menampilkan <strong>{{ $data->count() }}</strong> hasil dari <strong>{{ $data->total() }}</strong> data
                    untuk "<strong>{{ request('search') }}</strong>"
                @else
                    Menampilkan <strong>{{ $data->count() }}</strong> data pada halaman ini
                @endif
            </div>
            <div style="color: #64748b; font-size: 0.875rem; font-weight: 600;">
                Total Data Persil: <span style="color: var(--primary-green);">{{ $data->total() }}</span>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Delete SweetAlert
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function() {
                const form = this.closest('form');

                Swal.fire({
                    title: 'Hapus Data?',
                    text: 'Data persil akan dihapus permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // Auto submit form on search with debounce
        const searchInput = document.querySelector('input[name="search"]');
        if (searchInput) {
            let timeout = null;
            searchInput.addEventListener('keyup', function () {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    document.getElementById('searchForm').submit();
                }, 500); // Submit after 500ms of no typing
            });
        }
    });
</script>

@endsection