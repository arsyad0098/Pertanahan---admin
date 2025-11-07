@extends('layouts.app')

@section('title', 'Data Penggunaan Tanah')

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
                Data Penggunaan
            </li>
        </ol>
    </nav>

    <!-- Stats Cards -->
    {{-- <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div style="background: linear-gradient(135deg, #3b82f6, #2563eb); padding: 1.5rem; border-radius: 16px; color: white; box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <div style="font-size: 0.875rem; opacity: 0.9; margin-bottom: 0.5rem;">Total Data</div>
                        <div style="font-size: 2rem; font-weight: 700;">{{ count($data) }}</div>
                    </div>
                    <div style="width: 56px; height: 56px; background: rgba(255,255,255,0.2); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-clipboard-data" style="font-size: 1.75rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div style="background: linear-gradient(135deg, #10b981, #059669); padding: 1.5rem; border-radius: 16px; color: white; box-shadow: 0 4px 20px rgba(16, 185, 129, 0.3);">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <div style="font-size: 0.875rem; opacity: 0.9; margin-bottom: 0.5rem;">Status Aktif</div>
                        <div style="font-size: 2rem; font-weight: 700;">{{ count($data) }}</div>
                    </div>
                    <div style="width: 56px; height: 56px; background: rgba(255,255,255,0.2); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-check-circle-fill" style="font-size: 1.75rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div style="background: linear-gradient(135deg, #f59e0b, #d97706); padding: 1.5rem; border-radius: 16px; color: white; box-shadow: 0 4px 20px rgba(245, 158, 11, 0.3);">
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
    </div> --}}

    <!-- Main Card -->
    <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
        <!-- Card Header -->
        <div class="card-header" style="background: white; border-bottom: 1px solid #e2e8f0; padding: 1.5rem;">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h5 class="mb-1" style="font-weight: 700; color: var(--dark-bg); display: flex; align-items: center; gap: 0.75rem;">
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary-green), var(--primary-dark)); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-clipboard-data text-white"></i>
                        </div>
                        Data Penggunaan Tanah
                    </h5>
                    <p class="mb-0 text-muted" style="font-size: 0.875rem; margin-top: 0.5rem;">
                        Kelola data jenis penggunaan tanah di wilayah Kelurahan Bina Dera
                    </p>
                </div>
                <a href="{{ route('jenis_penggunaan.create') }}"
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
                    <i class="bi bi-plus-circle-fill" style="font-size: 1.125rem;"></i>
                    <span>Tambah Data</span>
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
                    <div class="col-md-8">
                        <div style="position: relative;">
                            <i class="bi bi-search" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #64748b;"></i>
                            <input type="text"
                                   class="form-control"
                                   id="searchInput"
                                   placeholder="Cari nama penggunaan atau keterangan..."
                                   style="padding-left: 2.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" style="border-radius: 10px; border: 1px solid #e2e8f0;">
                            <option>Semua Data</option>
                            <option>Terbaru</option>
                            <option>Terlama</option>
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
                            <th style="padding: 1rem; font-weight: 600; color: #475569; font-size: 0.875rem;">NAMA PENGGUNAAN</th>
                            <th style="padding: 1rem; font-weight: 600; color: #475569; font-size: 0.875rem;">KETERANGAN</th>
                            <th style="padding: 1rem; font-weight: 600; color: #475569; font-size: 0.875rem; width: 200px; text-align: center;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $index => $item)
                            <tr style="border-bottom: 1px solid #f1f5f9; transition: all 0.3s ease;">
                                <td style="padding: 1.25rem 1rem; color: #64748b; font-weight: 600;">
                                    {{ $index + 1 }}
                                </td>
                                <td style="padding: 1.25rem 1rem; color: var(--dark-bg); font-weight: 600;">
                                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.1)); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-geo-alt-fill" style="color: var(--primary-green);"></i>
                                        </div>
                                        <span>{{ $item->nama_penggunaan }}</span>
                                    </div>
                                </td>
                                <td style="padding: 1.25rem 1rem; color: #64748b;">
                                    {{ $item->keterangan ?? '-' }}
                                </td>
                                <td style="padding: 1.25rem 1rem; text-align: center;">
                                    <div style="display: inline-flex; gap: 0.5rem;">
                                        <a href="{{ route('jenis_penggunaan.edit', $item->jenis_id) }}"
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

                                        <form action="{{ route('jenis_penggunaan.destroy', $item->jenis_id) }}"
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
                                <td colspan="4" style="padding: 3rem; text-align: center;">
                                    <div style="color: #94a3b8;">
                                        <i class="bi bi-inbox" style="font-size: 3rem; margin-bottom: 1rem; display: block;"></i>
                                        <div style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.5rem;">Belum Ada Data</div>
                                        <div style="font-size: 0.875rem;">Klik tombol "Tambah Data" untuk menambahkan data penggunaan tanah</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20ingin%20bertanya%20tentang%20penggunaan%20tanah."
       class="whatsapp-float"
       target="_blank"
       title="Hubungi Admin via WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Hover Effects */
        .table tbody tr:hover {
            background-color: #f8fafc;
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

        /* Floating WhatsApp Button */
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #25D366, #20ba5a);
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            z-index: 999;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .whatsapp-float:hover {
            transform: scale(1.1) translateY(-5px);
            box-shadow: 0 8px 30px rgba(37, 211, 102, 0.6);
            color: white;
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
                        title: 'Hapus Data Ini?',
                        html: "Data penggunaan akan dihapus secara <strong>permanen</strong> dan tidak bisa dikembalikan.",
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
            const table = document.getElementById('dataTable');
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            searchInput.addEventListener('keyup', function() {
                const filter = this.value.toLowerCase();

                for (let i = 0; i < rows.length; i++) {
                    const cells = rows[i].getElementsByTagName('td');
                    let found = false;

                    for (let j = 0; j < cells.length; j++) {
                        const cellText = cells[j].textContent || cells[j].innerText;
                        if (cellText.toLowerCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }

                    rows[i].style.display = found ? '' : 'none';
                }
            });
        });
    </script>
@endsection
