@extends('layouts.app')
@section('title', 'Data Warga')

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
                Data Warga
            </li>
        </ol>
    </nav>

    <!-- Main Card -->
    <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
        <div class="card-header" style="background: white; border-bottom: 1px solid #e2e8f0; padding: 1.5rem;">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h5 class="mb-1" style="font-weight: 700; color: var(--dark-bg); display: flex; align-items: center; gap: 0.75rem;">
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #3b82f6, #2563eb); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-people-fill text-white"></i>
                        </div>
                        Data Warga
                    </h5>
                    <p class="mb-0 text-muted" style="font-size: 0.875rem; margin-top: 0.5rem;">
                        Kelola data penduduk Kelurahan Bina Dera
                    </p>
                </div>
                <a href="{{ route('warga.create') }}"
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
                       transition: all 0.3s ease;">
                    <i class="bi bi-plus-circle-fill" style="font-size: 1.125rem;"></i>
                    <span>Tambah Data</span>
                </a>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body p-0">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show m-3" role="alert"
                     style="border: none; border-radius: 12px; background: rgba(16, 185, 129, 0.1); border-left: 4px solid var(--primary-green);">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Search -->
            <div class="px-3 py-3" style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                <div style="position: relative; max-width: 350px;">
                    <i class="bi bi-search" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #64748b;"></i>
                    <input type="text"
                           id="searchInput"
                           class="form-control"
                           placeholder="Cari nama, NIK, email..."
                           style="padding-left: 2.75rem; border-radius: 10px;">
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="dataTable">
                    <thead style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>NIK</th>
                            <th>JENIS KELAMIN</th>
                            <th>AGAMA</th>
                            <th>PEKERJAAN</th>
                            <th>ALAMAT</th>
                            <th>GMAIL</th>
                            <th>TELEPON</th>
                            <th style="text-align: center;">AKSI</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->no_ktp }}</td>
                                <td>{{ $item->jenis_kelamin ?? '-' }}</td>
                                <td>{{ $item->agama ?? '-' }}</td>
                                <td>{{ $item->pekerjaan ?? '-' }}</td>
                                <td>{{ $item->alamat }}</td>

                                <!-- Gmail -->
                                <td>{{ $item->email ?? '-' }}</td>

                                <!-- Telepon -->
                                <td>{{ $item->telepon ?? '-' }}</td>

                                <td class="text-center">
                                    <a href="{{ route('warga.edit', $item->warga_id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <form action="{{ route('warga.destroy', $item->warga_id) }}"
                                          method="POST"
                                          class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm btn-delete">
                                            <i class="bi bi-trash3-fill"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center py-4 text-muted">
                                    Belum Ada Data Warga
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Search
            const searchInput = document.getElementById('searchInput');
            const rows = document.querySelectorAll('#dataTable tbody tr');

            searchInput.addEventListener('keyup', function() {
                const filter = this.value.toLowerCase();

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(filter) ? '' : 'none';
                });
            });

            // Delete Confirmation
            document.querySelectorAll('.btn-delete').forEach(btn => {
                btn.addEventListener('click', function() {
                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Hapus Data?',
                        text: 'Data tidak dapat dikembalikan.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal'
                    }).then(result => {
                        if (result.isConfirmed) form.submit();
                    });
                });
            });
        });
    </script>
@endsection
