@extends('admin.layouts.app')

@section('content')
<nav aria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
        <li class="breadcrumb-item">
            <a href="#"><i class="bi bi-house-door"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Data Warga</li>
    </ol>
</nav>

<!-- Card Data -->
<div class="card border-0 shadow-lg rounded-4 animate__animated animate__fadeInUp">
    <div class="card-header bg-primary text-white rounded-top-4 py-3 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 d-flex align-items-center">
            <i class="bi bi-people-fill me-2"></i> Data Warga
        </h5>
        <a href="{{ route('warga.create') }}" class="btn btn-add shadow-sm btn-custom">
            <i class="bi bi-plus-circle me-1"></i> Tambah Data
        </a>
    </div>

    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle mb-0 rounded-3 shadow-sm">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col" style="width: 5%">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Alamat</th>
                        <th scope="col" style="width: 10%">RT/RW</th>
                        <th scope="col" style="width: 20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->rt }}/{{ $item->rw }}</td>
                        <td>
                            <a href="{{ route('warga.edit', $item->id) }}" class="btn btn-sm btn-warning me-2 btn-custom">
                                <i class="bi bi-pencil-square me-1"></i> Edit
                            </a>
                            <form action="{{ route('warga.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger btn-custom">
                                    <i class="bi bi-trash me-1"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            <i class="bi bi-info-circle me-1"></i> Belum ada data warga
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
