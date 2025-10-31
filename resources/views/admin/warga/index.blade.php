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
        <div
            class="card-header bg-primary text-white rounded-top-4 py-3 px-4 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 d-flex align-items-center">
                <i class="bi bi-people-fill me-2"></i> Data Warga
            </h5>
            <a href="{{ route('warga.create') }}" class="btn btn-add shadow-sm btn-custom">
                <i class="bi bi-plus-circle me-1"></i> Tambah Data
            </a>
        </div>

        <div class="card-body">
            @if (session('success'))
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
                                    <a href="{{ route('warga.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning me-2 btn-custom">
                                        <i class="bi bi-pencil-square me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('warga.destroy', $item->id) }}" method="POST"
                                        class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger btn-custom btn-delete">
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

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Gaya pop-up elegan dengan efek blur kaca */
        .swal2-popup {
            border-radius: 20px !important;
            background: rgba(255, 255, 255, 0.85) !important;
            backdrop-filter: blur(12px) !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2) !important;
        }

        .swal2-title {
            font-weight: 700 !important;
            color: #2d3748 !important;
        }

        .swal2-html-container {
            color: #4a5568 !important;
            font-size: 15px !important;
        }

        .swal2-confirm {
            background-color: #e53e3e !important;
            border-radius: 12px !important;
            font-weight: 600 !important;
            padding: 10px 24px !important;
        }

        .swal2-cancel {
            background-color: #718096 !important;
            border-radius: 12px !important;
            font-weight: 600 !important;
            padding: 10px 24px !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Hapus Data Ini?',
                        html: "<b>Data warga</b> akan dihapus secara permanen dan tidak bisa dikembalikan.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus sekarang',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#e53e3e',
                        cancelButtonColor: '#718096',
                        reverseButtons: true,
                        allowOutsideClick: false,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },
                        backdrop: `
                    rgba(0,0,0,0.4)
                    left top
                    no-repeat
                `
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
        });
    </script>
    <!-- Floating Button WhatsApp -->
    <a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20ingin%20bertanya%20tentang%20penggunaan%20tanah."
        class="whatsapp-float" target="_blank" title="Hubungi Admin via WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <style>
        /* Floating WhatsApp Button */
        .whatsapp-float {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background-color: #25D366;
            color: white;
            border-radius: 50%;
            font-size: 28px;
            padding: 15px 18px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            z-index: 999;
            transition: all 0.3s ease;
            animation: pulse 2s infinite;
        }

        .whatsapp-float:hover {
            background-color: #1ebe5d;
            transform: scale(1.15);
            animation: none;
        }

        /* Animasi denyut lembut */
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.5);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }
    </style>
@endsection
