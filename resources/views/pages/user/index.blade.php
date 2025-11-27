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

    <!-- Main Card -->
    <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">

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
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            <!-- Search & Filter -->
            <form action="{{ route('data_user.index') }}" method="GET">
                <div class="px-3 py-3" style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">

                    <div class="row g-3 align-items-center">

                        <div class="col-md-6">
                            <div style="position: relative;">
                                <i class="bi bi-search"
                                   style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #64748b;"></i>

                                <input type="text"
                                       name="search"
                                       class="form-control"
                                       id="searchInput"
                                       value="{{ request('search') }}"
                                       placeholder="Cari nama user atau email..."
                                       style="padding-left: 2.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">
                            </div>
                        </div>

                        <div class="col-md-3" style="padding-left: 50px;">
                            <select class="form-select"
                                    name="status"
                                    id="statusFilter"
                                    onchange="this.form.submit()"
                                    style="border-radius: 10px; border: 1px solid #e2e8f0;">
                                <option value="">Semua Status</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Non-Aktif</option>
                            </select>
                        </div>

                        <!-- Tombol CLEAR (hanya muncul setelah submit search) -->
                        <div class="col-md-2">
                            @if(request('search') || request('status'))
                                <a href="{{ route('data_user.index') }}"
                                   id="clearBtn"
                                   style="width: 100%;
                                       border-radius: 10px;
                                       border: none;
                                       font-weight: 600;
                                       padding: 0.65rem 1rem;
                                       background: linear-gradient(135deg, #94a3b8, #64748b);
                                       color: white;
                                       text-align: center;
                                       display: inline-block;
                                       transition: 0.3s;">
                                    CLEAR
                                </a>
                            @endif
                        </div>

                    </div>
                </div>
            </form>


            <!-- TABLE -->
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="dataTable">
                    <thead style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                        <tr>
                            <th style="padding: 1rem; font-weight: 600;">NO</th>
                            <th style="padding: 1rem; font-weight: 600;">NAMA USER</th>
                            <th style="padding: 1rem; font-weight: 600;">EMAIL</th>
                            <th style="padding: 1rem; font-weight: 600;">ROLE</th>
                            <th style="padding: 1rem; font-weight: 600;">STATUS</th>
                            <th style="padding: 1rem; font-weight: 600;">TANGGAL DAFTAR</th>
                            <th style="padding: 1rem; font-weight: 600; text-align:center;">AKSI</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($data as $index => $item)
                            <tr data-status="{{ $item->status }}">

                                <td style="padding: 1.25rem 1rem;">
                                    {{ ($data->currentPage() - 1) * $data->perPage() + $index + 1 }}
                                </td>

                                <td style="padding: 1.25rem 1rem; font-weight: 600;">
                                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                                        <div style="width: 40px; height: 40px; background: rgba(59,130,246,0.15); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-person-fill" style="color: #3b82f6;"></i>
                                        </div>
                                        <span>{{ $item->name }}</span>
                                    </div>
                                </td>

                                <td style="padding: 1.25rem 1rem;">{{ $item->email }}</td>

                                <td style="padding: 1.25rem 1rem;">
                                    <span style="background: #f59e0b; color: white; padding: 5px 12px; border-radius: 20px; font-size: 0.75rem;">
                                        {{ $item->role }}
                                    </span>
                                </td>

                                <td style="padding: 1.25rem 1rem;">
                                    @if($item->status == 'active')
                                        <span style="background:#10b981; color:white; padding:5px 12px; border-radius:20px;">Aktif</span>
                                    @else
                                        <span style="background:#475569; color:white; padding:5px 12px; border-radius:20px;">Non-Aktif</span>
                                    @endif
                                </td>

                                <td style="padding: 1.25rem 1rem;">
                                    {{ \Carbon\Carbon::parse($item->tanggal_daftar)->format('d/m/Y') }}
                                </td>

                                <td style="text-align:center;">
                                    <div style="display:flex; gap:0.5rem; justify-content:center;">
                                        
                                        <!-- Edit -->
                                        <a href="{{ route('data_user.edit', $item->user_id) }}"
                                           style="padding: 0.5rem 1rem; background: #f59e0b; color:white; border-radius:8px;">
                                            Edit
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('data_user.destroy', $item->user_id) }}"
                                              method="POST"
                                              class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                    class="btn-delete"
                                                    style="padding: 0.5rem 1rem; background:#ef4444; color:white; border-radius:8px;">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>

                <div class="mt-4 d-flex justify-content-end pe-4">
                    {{ $data->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>

        <div class="card-footer" style="background:#f8fafc; padding:1rem 1.5rem;">
            <div style="display:flex; justify-content:space-between;">
                <div>Menampilkan <strong>{{ $data->count() }}</strong> data user</div>
                <div>Total User: <strong>{{ $data->total() }}</strong></div>
            </div>
        </div>

    </div>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // SEARCH ENTER SUBMIT
            document.getElementById('searchInput').addEventListener('keyup', function (e) {
                if (e.key === "Enter") {
                    this.form.submit();
                }
            });

            // DELETE CONFIRM
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function () {
                    const form = this.closest('form');

                    Swal.fire({
                        title: "Hapus Data User?",
                        text: "Data akan dihapus permanen.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Ya, Hapus",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) form.submit();
                    });
                });
            });

        });
    </script>

@endsection
