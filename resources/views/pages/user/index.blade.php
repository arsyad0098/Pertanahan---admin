@extends('layouts.app')

@section('title', 'Data User Terdaftar')

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
                Data User
            </li>
        </ol>
    </nav>

    <!-- Stats Cards -->
    <!-- <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div style="background: linear-gradient(135deg, #3b82f6, #2563eb); padding: 1.5rem; border-radius: 16px; color: white; box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <div style="font-size: 0.875rem; opacity: 0.9; margin-bottom: 0.5rem;">Total User</div>
                        <div style="font-size: 2rem; font-weight: 700;">{{ count($data) }}</div>
                    </div>
                    <div style="width: 56px; height: 56px; background: rgba(255,255,255,0.2); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-people-fill" style="font-size: 1.75rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="background: linear-gradient(135deg, #10b981, #059669); padding: 1.5rem; border-radius: 16px; color: white; box-shadow: 0 4px 20px rgba(16, 185, 129, 0.3);">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <div style="font-size: 0.875rem; opacity: 0.9; margin-bottom: 0.5rem;">Status Aktif</div>
                        <div style="font-size: 2rem; font-weight: 700;">{{ $data->where('status', 'active')->count() }}</div>
                    </div>
                    <div style="width: 56px; height: 56px; background: rgba(255,255,255,0.2); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-check-circle-fill" style="font-size: 1.75rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="background: linear-gradient(135deg, #f59e0b, #d97706); padding: 1.5rem; border-radius: 16px; color: white; box-shadow: 0 4px 20px rgba(245, 158, 11, 0.3);">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <div style="font-size: 0.875rem; opacity: 0.9; margin-bottom: 0.5rem;">Status Non-Aktif</div>
                        <div style="font-size: 2rem; font-weight: 700;">{{ $data->where('status', 'inactive')->count() }}</div>
                    </div>
                    <div style="width: 56px; height: 56px; background: rgba(255,255,255,0.2); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-x-circle-fill" style="font-size: 1.75rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="background: linear-gradient(135deg, #8b5cf6, #7c3aed); padding: 1.5rem; border-radius: 16px; color: white; box-shadow: 0 4px 20px rgba(139, 92, 246, 0.3);">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <div style="font-size: 0.875rem; opacity: 0.9; margin-bottom: 0.5rem;">Update Terakhir</div>
                        <div style="font-size: 1.25rem; font-weight: 600;">Hari Ini</div>
                    </div>
                    <div style="width: 56px; height: 56px; background: rgba(255,255,255,0.2); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-clock-history" style="font-size: 1.75rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Main Card -->
    <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
        <!-- Card Header -->
        <div class="card-header" style="background: white; border-bottom: 1px solid #e2e8f0; padding: 1.5rem;">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h5 class="mb-1" style="font-weight: 700; color: var(--dark-bg); display: flex; align-items: center; gap: 0.75rem;">
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary-green), var(--primary-dark)); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-people-fill text-white"></i>
                        </div>
                        Data User Terdaftar
                    </h5>
                    <p class="mb-0 text-muted" style="font-size: 0.875rem; margin-top: 0.5rem;">
                        Kelola data user yang terdaftar dalam sistem Bina Data
                    </p>
                </div>
                <a href="{{ route('data_user.create') }}"
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
                          border: none;">
                    <i class="bi bi-person-plus-fill" style="font-size: 1.125rem;"></i>
                    <span>Tambah User</span>
                </a>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body p-0">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show m-3" role="alert"
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

            <!-- Search & Filter -->
            <div class="px-3 py-3" style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div style="position: relative;">
                            <i class="bi bi-search" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #64748b;"></i>
                            <input type="text"
                                   class="form-control"
                                   id="searchInput"
                                   placeholder="Cari nama user atau email..."
                                   style="padding-left: 2.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="statusFilter" style="border-radius: 10px; border: 1px solid #e2e8f0;">
                            <option value="">Semua Status</option>
                            <option value="active">Aktif</option>
                            <option value="inactive">Non-Aktif</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="sortFilter" style="border-radius: 10px; border: 1px solid #e2e8f0;">
                            <option value="newest">Terbaru</option>
                            <option value="oldest">Terlama</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="dataTable">
                    <thead style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                        <tr>
                            <th style="padding: 1rem; font-weight: 600; color: #475569; font-size: 0.875rem; width: 80px;">NO</th>
                            <th style="padding: 1rem; font-weight: 600; color: #475569; font-size: 0.875rem;">NAMA USER</th>
                            <th style="padding: 1rem; font-weight: 600; color: #475569; font-size: 0.875rem;">EMAIL</th>
                            <th style="padding: 1rem; font-weight: 600; color: #475569; font-size: 0.875rem;">ROLE</th>
                            <th style="padding: 1rem; font-weight: 600; color: #475569; font-size: 0.875rem;">STATUS</th>
                            <th style="padding: 1rem; font-weight: 600; color: #475569; font-size: 0.875rem;">TANGGAL DAFTAR</th>
                            <th style="padding: 1rem; font-weight: 600; color: #475569; font-size: 0.875rem; width: 200px; text-align: center;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $index => $item)
                            <tr style="border-bottom: 1px solid #f1f5f9; transition: all 0.3s ease;" 
                                data-status="{{ $item->status }}">
                                <td style="padding: 1.25rem 1rem; color: #64748b; font-weight: 600;">
                                    {{ $index + 1 }}
                                </td>
                                <td style="padding: 1.25rem 1rem; color: var(--dark-bg); font-weight: 600;">
                                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(37, 99, 235, 0.1)); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-person-fill" style="color: #3b82f6;"></i>
                                        </div>
                                        <span>{{ $item->name }}</span>
                                    </div>
                                </td>
                                <td style="padding: 1.25rem 1rem; color: #64748b;">
                                    {{ $item->email }}
                                </td>
                                <td style="padding: 1.25rem 1rem;">
                                    <span style="background: linear-gradient(135deg, #f59e0b, #d97706); color: white; padding: 0.375rem 0.75rem; border-radius: 20px; font-size: 0.75rem; font-weight: 600;">
                                        {{ $item->role }}
                                    </span>
                                </td>
                                <td style="padding: 1.25rem 1rem;">
                                    @if($item->status == 'active')
                                        <span style="background: linear-gradient(135deg, #10b981, #059669); color: white; padding: 0.375rem 0.75rem; border-radius: 20px; font-size: 0.75rem; font-weight: 600;">
                                            <i class="bi bi-check-circle-fill me-1"></i> Aktif
                                        </span>
                                    @else
                                        <span style="background: linear-gradient(135deg, #64748b, #475569); color: white; padding: 0.375rem 0.75rem; border-radius: 20px; font-size: 0.75rem; font-weight: 600;">
                                            <i class="bi bi-x-circle-fill me-1"></i> Non-Aktif
                                        </span>
                                    @endif
                                </td>
                                <td style="padding: 1.25rem 1rem; color: #64748b; font-weight: 500;">
                                    {{ \Carbon\Carbon::parse($item->tanggal_daftar)->format('d/m/Y') }}
                                </td>
                                <td style="padding: 1.25rem 1rem; text-align: center;">
                                    <div style="display: inline-flex; gap: 0.5rem;">
                                        <a href="{{ route('data_user.edit', $item->user_id) }}"
                                           style="padding: 0.5rem 1rem;
                                                  background: linear-gradient(135deg, #f59e0b, #d97706);
                                                  color: white;
                                                  border-radius: 8px;
                                                  text-decoration: none;
                                                  font-size: 0.875rem;
                                                  font-weight: 600;
                                                  display: inline-flex;
                                                  align-items: center;
                                                  gap: 0.375rem;
                                                  transition: all 0.3s ease;
                                                  border: none;">
                                            <i class="bi bi-pencil-square"></i>
                                            <span>Edit</span>
                                        </a>

                                        <form action="{{ route('data_user.destroy', $item->user_id) }}"
                                              method="POST"
                                              class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                    class="btn-delete"
                                                    style="padding: 0.5rem 1rem;
                                                           background: linear-gradient(135deg, #ef4444, #dc2626);
                                                           color: white;
                                                           border-radius: 8px;
                                                           font-size: 0.875rem;
                                                           font-weight: 600;
                                                           display: inline-flex;
                                                           align-items: center;
                                                           gap: 0.375rem;
                                                           transition: all 0.3s ease;
                                                           border: none;
                                                           cursor: pointer;">
                                                <i class="bi bi-trash-fill"></i>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="padding: 3rem; text-align: center;">
                                    <div style="color: #94a3b8;">
                                        <i class="bi bi-people" style="font-size: 3rem; margin-bottom: 1rem; display: block;"></i>
                                        <div style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.5rem;">Belum Ada Data User</div>
                                        <div style="font-size: 0.875rem;">Klik tombol "Tambah User" untuk menambahkan data user baru</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Card Footer -->
        <div class="card-footer" style="background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 1rem 1.5rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                <div style="color: #64748b; font-size: 0.875rem;">
                    Menampilkan <strong>{{ count($data) }}</strong> data user
                </div>
                <div style="color: #64748b; font-size: 0.875rem; font-weight: 600;">
                    Total Data User: <span style="color: var(--primary-green);">{{ count($data) }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Hover Effects */
        .table tbody tr:hover {
            background-color: #f8fafc;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        a[href*="edit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.4);
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
        }

        a[href*="create"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        }

        /* SweetAlert Custom Styles */
        .swal2-popup {
            border-radius: 16px !important;
            padding: 2rem !important;
        }

        .swal2-title {
            font-weight: 700 !important;
            color: var(--dark-bg) !important;
        }

        .swal2-html-container {
            color: #64748b !important;
        }

        .swal2-confirm {
            background: linear-gradient(135deg, #ef4444, #dc2626) !important;
            border-radius: 10px !important;
            font-weight: 600 !important;
            padding: 0.75rem 2rem !important;
        }

        .swal2-cancel {
            background: #94a3b8 !important;
            border-radius: 10px !important;
            font-weight: 600 !important;
            padding: 0.75rem 2rem !important;
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
                        title: 'Hapus Data User?',
                        html: "Data user akan dihapus secara <strong>permanen</strong> dan tidak bisa dikembalikan.",
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

            // Search Functionality
            const searchInput = document.getElementById('searchInput');
            const statusFilter = document.getElementById('statusFilter');
            const sortFilter = document.getElementById('sortFilter');
            const table = document.getElementById('dataTable');
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            function filterTable() {
                const searchTerm = searchInput.value.toLowerCase();
                const statusValue = statusFilter.value;
                const sortValue = sortFilter.value;

                for (let i = 0; i < rows.length; i++) {
                    const cells = rows[i].getElementsByTagName('td');
                    const rowStatus = rows[i].getAttribute('data-status');
                    let found = false;

                    // Search filter
                    for (let j = 0; j < cells.length - 1; j++) { // Exclude action column
                        const cellText = cells[j].textContent || cells[j].innerText;
                        if (cellText.toLowerCase().indexOf(searchTerm) > -1) {
                            found = true;
                            break;
                        }
                    }

                    // Status filter
                    if (statusValue && rowStatus !== statusValue) {
                        found = false;
                    }

                    rows[i].style.display = found ? '' : 'none';
                }

                // Sort functionality (you can implement actual sorting here)
                if (sortValue === 'oldest') {
                    // Implementation for sorting oldest first
                } else {
                    // Implementation for sorting newest first
                }
            }

            searchInput.addEventListener('keyup', filterTable);
            statusFilter.addEventListener('change', filterTable);
            sortFilter.addEventListener('change', filterTable);
        });
    </script>
@endsection