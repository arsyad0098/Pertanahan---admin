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
            <form method="GET" action="{{ route('warga.index') }}" class="d-flex flex-wrap align-items-center gap-2">
                <div style="position: relative; min-width: 250px;">
                    <i class="bi bi-search"
                        style="position: absolute; left: 0.75rem; top: 50%; transform: translateY(-50%); color: #64748b;"></i>

                    <input type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control"
                        placeholder="Cari nama, NIK, email..."
                        style="padding-left: 2.5rem; border-radius: 10px;">

                    {{-- SHOW CLEAR ONLY AFTER SEARCH SUBMIT --}}
                    @if(request()->has('search') && request('search') !== '')
                        <a href="{{ route('warga.index') }}"
                            class="btn btn-sm"
                            style="
                                position: absolute;
                                right: -80px;
                                top: 0;
                                padding: 6px 14px;
                                border-radius: 10px;
                                background: #e2e8f0;
                                color: #1e293b;
                                font-weight: 600;
                                font-size: 0.85rem;
                                transition: 0.2s ease;"
                            onmouseover="this.style.background='#cbd5e1'"
                            onmouseout="this.style.background='#e2e8f0'">
                            CLEAR
                        </a>
                    @endif
                </div>

                <!-- Filter Horizontal -->
                <div class="d-flex flex-wrap gap-2 flex-grow-1 justify-content-end">
                    <select name="jenis_kelamin" class="form-select form-select-sm" style="width: 120px; border-radius: 10px;">
                        <option value="">Kelamin</option>
                        @foreach($jenis_kelamin_all as $jk)
                        <option value="{{ $jk->jenis_kelamin }}" {{ request('jenis_kelamin') == $jk->jenis_kelamin ? 'selected' : '' }}>
                            {{ $jk->jenis_kelamin }}
                        </option>
                        @endforeach
                    </select>

                    <select name="agama" class="form-select form-select-sm" style="width: 120px; border-radius: 10px;">
                        <option value="">Agama</option>
                        @foreach($agama_all as $a)
                        <option value="{{ $a->agama }}" {{ request('agama') == $a->agama ? 'selected' : '' }}>
                            {{ $a->agama }}
                        </option>
                        @endforeach
                    </select>

                    <select name="pekerjaan" class="form-select form-select-sm" style="width: 120px; border-radius: 10px;">
                        <option value="">Pekerjaan</option>
                        @foreach($pekerjaan_all as $p)
                        <option value="{{ $p->pekerjaan }}" {{ request('pekerjaan') == $p->pekerjaan ? 'selected' : '' }}>
                            {{ $p->pekerjaan }}
                        </option>
                        @endforeach
                    </select>

                    <select name="rt" class="form-select form-select-sm" style="width: 80px; border-radius: 10px;">
                        <option value="">RT</option>
                        @foreach($rt_all as $rt)
                        <option value="{{ $rt->rt }}" {{ request('rt') == $rt->rt ? 'selected' : '' }}>
                            {{ $rt->rt }}
                        </option>
                        @endforeach
                    </select>

                    <select name="rw" class="form-select form-select-sm" style="width: 80px; border-radius: 10px;">
                        <option value="">RW</option>
                        @foreach($rw_all as $rw)
                        <option value="{{ $rw->rw }}" {{ request('rw') == $rw->rw ? 'selected' : '' }}>
                            {{ $rw->rw }}
                        </option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-success btn-sm" style="border-radius:10px;">Filter</button>
                </div>

            </form>
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
                        
                        {{-- ✅ NAMA + FOTO PROFIL --}}
                        <td style="padding: 1.25rem 1rem; font-weight: 600;">
                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                <div style="width: 40px; height: 40px; border-radius: 10px; overflow: hidden; background: rgba(59,130,246,0.15); display: flex; align-items: center; justify-content: center;">
                                    @if($item->profile_picture)
                                        <img src="{{ asset('uploads/profile/' . $item->profile_picture) }}"
                                             alt="{{ $item->nama }}"
                                             style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <i class="bi bi-person-fill" style="color: #3b82f6;"></i>
                                    @endif
                                </div>
                                <span>{{ $item->nama }}</span>
                            </div>
                        </td>
                        
                        <td>{{ $item->no_ktp }}</td>
                        <td>{{ $item->jenis_kelamin ?? '-' }}</td>
                        <td>{{ $item->agama ?? '-' }}</td>
                        <td>{{ $item->pekerjaan ?? '-' }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->email ?? '-' }}</td>
                        <td>{{ $item->telp ?? '-' }}</td>
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
            <div class="p-3">
                {{ $data->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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