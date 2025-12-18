@extends('layouts.app')

@section('content')
<div class="py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7" />
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Identitas Pengembang</li>
        </ol>
    </nav>

    <!-- Header -->
    <div class="d-flex justify-content-between flex-wrap mb-4">
        <div>
            <h1 class="h4">Identitas Pengembang</h1>
            <p class="mb-0 text-muted">Informasi pengembang sistem</p>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-xl-8 col-lg-10 col-md-12">
        <div class="card border-0 shadow">
            <div class="card-body p-4">

                <div class="row align-items-center">
                    <!-- FOTO -->
                    <div class="col-md-4 text-center mb-4 mb-md-0">
                        {{-- GUNAKAN FOTO ASLI --}}
                        <img src="{{ asset('uploads/pengembang/foto.jpg') }}"
                            alt="Foto Pengembang"
                            class="img-fluid rounded-3 shadow"
                            style="max-width: 180px;">
                    </div>

                    <!-- IDENTITAS -->
                    <div class="col-md-8">
                        <table class="table table-borderless mb-3">
                            <tr>
                                <th width="150">Nama</th>
                                <td>: Arsyad Ramadhan</td>
                            </tr>
                            <tr>
                                <th>NIM</th>
                                <td>: 2457301018</td>
                            </tr>
                            <tr>
                                <th>Program Studi</th>
                                <td>: Sistem Informasi</td>
                            </tr>
                            <tr>
                                <th>Institusi</th>
                                <td>: Politeknik Caltex Riau</td>
                            </tr>
                        </table>

                        <!-- SOSIAL MEDIA -->
                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <a href="https://www.linkedin.com/in/username"
                               target="_blank"
                               class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-linkedin me-1"></i> LinkedIn
                            </a>

                            <a href="https://github.com/arsyad0098"
                               target="_blank"
                               class="btn btn-outline-dark btn-sm">
                                <i class="bi bi-github me-1"></i> GitHub
                            </a>

                            <a href="https://instagram.com/arsyad.rmdhn"
                               target="_blank"
                               class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-instagram me-1"></i> Instagram
                            </a>

                            <a href="https://wa.me/6285264203527"
                               target="_blank"
                               class="btn btn-outline-success btn-sm">  
                                <i class="bi bi-whatsapp me-1"></i> WhatsApp
                            </a>

                            <a href="mailto:arsyad24si@mahasiswa.pcr.ac.id"
                               class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-envelope-fill me-1"></i> Email
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
