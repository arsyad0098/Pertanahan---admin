@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Welcome Section -->
    <div class="mb-4">
        <div style="background: linear-gradient(135deg, var(--primary-green), var(--primary-dark)); padding: 2rem; border-radius: 20px; color: white; box-shadow: 0 8px 30px rgba(16, 185, 129, 0.3); position: relative; overflow: hidden;">
            <!-- Background Pattern -->
            <div style="position: absolute; top: -50px; right: -50px; width: 200px; height: 200px; background: rgba(255, 255, 255, 0.1); border-radius: 50%;"></div>
            <div style="position: absolute; bottom: -30px; left: -30px; width: 150px; height: 150px; background: rgba(255, 255, 255, 0.1); border-radius: 50%;"></div>

            <div style="position: relative; z-index: 1;">
                <h2 style="font-weight: 700; margin-bottom: 0.5rem; font-size: 2rem;">
                    Selamat Datang, Admin! 👋
                </h2>
                <p style="opacity: 0.9; margin-bottom: 0; font-size: 1.125rem;">
                    <i class="bi bi-calendar-check me-2"></i>
                    <span id="currentDate"></span> |
                    <i class="bi bi-clock ms-2 me-2"></i>
                    <span id="currentTime"></span>
                </p>
            </div>
        </div>
    </div>

    <!-- Stats Cards Grid -->
    <div class="row g-4 mb-4">
        <!-- Card 1: Total Data -->
        <div class="col-xl-3 col-md-6">
            <div class="stats-card" style="background: linear-gradient(135deg, #3b82f6, #2563eb); color: white;">
                <div style="position: absolute; top: -10px; right: -10px; width: 100px; height: 100px; background: rgba(255, 255, 255, 0.1); border-radius: 50%;"></div>

                <div style="position: relative; z-index: 1;">
                    <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                        <div>
                            <div style="font-size: 0.875rem; opacity: 0.9; font-weight: 500; margin-bottom: 0.5rem;">
                                Total Data
                            </div>
                            <div class="stats-number">
                                {{ $totalData ?? 0 }}
                            </div>
                        </div>
                        <div class="stats-icon" style="background: rgba(255, 255, 255, 0.2);">
                            <i class="bi bi-clipboard-data"></i>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.875rem; opacity: 0.9;">
                        <i class="bi bi-arrow-up"></i>
                        <span>Data Penggunaan Tanah</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Status Aktif -->
        <div class="col-xl-3 col-md-6">
            <div class="stats-card" style="background: linear-gradient(135deg, #10b981, #059669); color: white;">
                <div style="position: absolute; top: -10px; right: -10px; width: 100px; height: 100px; background: rgba(255, 255, 255, 0.1); border-radius: 50%;"></div>

                <div style="position: relative; z-index: 1;">
                    <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                        <div>
                            <div style="font-size: 0.875rem; opacity: 0.9; font-weight: 500; margin-bottom: 0.5rem;">
                                Status Aktif
                            </div>
                            <div class="stats-number">
                                {{ $statusAktif ?? 0 }}
                            </div>
                        </div>
                        <div class="stats-icon" style="background: rgba(255, 255, 255, 0.2);">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.875rem; opacity: 0.9;">
                        <i class="bi bi-check-circle"></i>
                        <span>Data Aktif Terdaftar</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Update Terakhir -->
        <div class="col-xl-3 col-md-6">
            <div class="stats-card" style="background: linear-gradient(135deg, #f59e0b, #d97706); color: white;">
                <div style="position: absolute; top: -10px; right: -10px; width: 100px; height: 100px; background: rgba(255, 255, 255, 0.1); border-radius: 50%;"></div>

                <div style="position: relative; z-index: 1;">
                    <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                        <div>
                            <div style="font-size: 0.875rem; opacity: 0.9; font-weight: 500; margin-bottom: 0.5rem;">
                                Update Terakhir
                            </div>
                            <div style="font-size: 1.5rem; font-weight: 700;">
                                Hari Ini
                            </div>
                        </div>
                        <div class="stats-icon" style="background: rgba(255, 255, 255, 0.2);">
                            <i class="bi bi-clock-history"></i>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.875rem; opacity: 0.9;">
                        <i class="bi bi-calendar-event"></i>
                        <span>{{ date('d M Y') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4: Total Warga -->
        <div class="col-xl-3 col-md-6">
            <div class="stats-card" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed); color: white;">
                <div style="position: absolute; top: -10px; right: -10px; width: 100px; height: 100px; background: rgba(255, 255, 255, 0.1); border-radius: 50%;"></div>

                <div style="position: relative; z-index: 1;">
                    <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                        <div>
                            <div style="font-size: 0.875rem; opacity: 0.9; font-weight: 500; margin-bottom: 0.5rem;">
                                Total Warga
                            </div>
                            <div class="stats-number">
                                {{ $totalWarga ?? 0 }}
                            </div>
                        </div>
                        <div class="stats-icon" style="background: rgba(255, 255, 255, 0.2);">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.875rem; opacity: 0.9;">
                        <i class="bi bi-person-check"></i>
                        <span>Data Warga Terdaftar</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats Row -->
    <div class="row g-4 mb-4">
        <!-- RT Terdaftar -->
        <div class="col-md-4">
            <div style="background: white; padding: 1.5rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 56px; height: 56px; background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(124, 58, 237, 0.1)); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-houses-fill" style="font-size: 1.75rem; color: #8b5cf6;"></i>
                    </div>
                    <div style="flex: 1;">
                        <div style="color: #64748b; font-size: 0.875rem; margin-bottom: 0.25rem;">RT Terdaftar</div>
                        <div style="font-size: 1.75rem; font-weight: 700; color: var(--dark-bg);">{{ $totalRT ?? 0 }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RW Terdaftar -->
        <div class="col-md-4">
            <div style="background: white; padding: 1.5rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 56px; height: 56px; background: linear-gradient(135deg, rgba(236, 72, 153, 0.1), rgba(219, 39, 119, 0.1)); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-building" style="font-size: 1.75rem; color: #ec4899;"></i>
                    </div>
                    <div style="flex: 1;">
                        <div style="color: #64748b; font-size: 0.875rem; margin-bottom: 0.25rem;">RW Terdaftar</div>
                        <div style="font-size: 1.75rem; font-weight: 700; color: var(--dark-bg);">{{ $totalRW ?? 0 }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wilayah Kelurahan -->
        <div class="col-md-4">
            <div style="background: white; padding: 1.5rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 56px; height: 56px; background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.1)); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-geo-alt-fill" style="font-size: 1.75rem; color: var(--primary-green);"></i>
                    </div>
                    <div style="flex: 1;">
                        <div style="color: #64748b; font-size: 0.875rem; margin-bottom: 0.25rem;">Kelurahan</div>
                        <div style="font-size: 1.25rem; font-weight: 700; color: var(--dark-bg);">Bina Dera</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row g-4 mb-4">
        <div class="col-12">
            <div style="background: white; padding: 2rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">
                <h5 style="font-weight: 700; color: var(--dark-bg); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem;">
                    <i class="bi bi-lightning-charge-fill" style="color: var(--primary-green);"></i>
                    Aksi Cepat
                </h5>
                <div class="row g-3">
                    <div class="col-md-3">
                        <a href="{{ route('jenis_penggunaan.create') }}"
                           class="quick-action-card"
                           style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(37, 99, 235, 0.05)); border: 1px solid rgba(59, 130, 246, 0.2);">
                            <i class="bi bi-plus-circle-fill" style="color: #3b82f6; font-size: 2rem;"></i>
                            <div style="font-weight: 600; color: #3b82f6; margin-top: 0.75rem;">Tambah Data Penggunaan</div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('warga.create') }}"
                           class="quick-action-card"
                           style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.05)); border: 1px solid rgba(16, 185, 129, 0.2);">
                            <i class="bi bi-person-plus-fill" style="color: var(--primary-green); font-size: 2rem;"></i>
                            <div style="font-weight: 600; color: var(--primary-green); margin-top: 0.75rem;">Tambah Data Warga</div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('jenis_penggunaan.index') }}"
                           class="quick-action-card"
                           style="background: linear-gradient(135deg, rgba(245, 158, 11, 0.1), rgba(217, 119, 6, 0.05)); border: 1px solid rgba(245, 158, 11, 0.2);">
                            <i class="bi bi-list-ul" style="color: #f59e0b; font-size: 2rem;"></i>
                            <div style="font-weight: 600; color: #f59e0b; margin-top: 0.75rem;">Lihat Data Penggunaan</div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('warga.index') }}"
                           class="quick-action-card"
                           style="background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(124, 58, 237, 0.05)); border: 1px solid rgba(139, 92, 246, 0.2);">
                            <i class="bi bi-people" style="color: #8b5cf6; font-size: 2rem;"></i>
                            <div style="font-weight: 600; color: #8b5cf6; margin-top: 0.75rem;">Lihat Data Warga</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Section -->
    <div class="row g-4">
        <div class="col-md-8">
            <div style="background: white; padding: 2rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">
                <h5 style="font-weight: 700; color: var(--dark-bg); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem;">
                    <i class="bi bi-info-circle-fill" style="color: var(--primary-green);"></i>
                    Informasi Sistem
                </h5>
                <div style="color: #64748b; line-height: 1.8;">
                    <p style="margin-bottom: 1rem;">
                        <i class="bi bi-check-circle-fill me-2" style="color: var(--primary-green);"></i>
                        Sistem Pertanahan Digital Kelurahan Bina Dera
                    </p>
                    <p style="margin-bottom: 1rem;">
                        <i class="bi bi-check-circle-fill me-2" style="color: var(--primary-green);"></i>
                        Pengelolaan Data Tanah Terintegrasi
                    </p>
                    <p style="margin-bottom: 0;">
                        <i class="bi bi-check-circle-fill me-2" style="color: var(--primary-green);"></i>
                        Manajemen Data Warga & Penggunaan Lahan
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div style="background: linear-gradient(135deg, var(--primary-green), var(--primary-dark)); padding: 2rem; border-radius: 16px; color: white; box-shadow: 0 4px 20px rgba(16, 185, 129, 0.3);">
                <i class="bi bi-headset" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                <h6 style="font-weight: 700; margin-bottom: 0.75rem;">Butuh Bantuan?</h6>
                <p style="opacity: 0.9; font-size: 0.875rem; margin-bottom: 1.5rem;">
                    Hubungi admin untuk informasi lebih lanjut
                </p>
                <a href="https://wa.me/6281234567890"
                   target="_blank"
                   style="display: inline-block; background: white; color: var(--primary-green); padding: 0.75rem 1.5rem; border-radius: 10px; text-decoration: none; font-weight: 600;">
                    <i class="bi bi-whatsapp me-2"></i>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>

    <style>
        .stats-card {
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.18);
        }

        .stats-number {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1;
        }

        .stats-icon {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }

        .quick-action-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.5rem;
            border-radius: 16px;
            text-decoration: none;
            transition: all 0.3s ease;
            text-align: center;
        }

        .quick-action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .stats-number {
                font-size: 2.5rem;
            }
        }
    </style>

    <script>
        // Update Date & Time
        function updateDateTime() {
            const now = new Date();

            // Format tanggal
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const dateString = now.toLocaleDateString('id-ID', options);
            document.getElementById('currentDate').textContent = dateString;

            // Format waktu
            const timeString = now.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            document.getElementById('currentTime').textContent = timeString;
        }

        // Update setiap detik
        updateDateTime();
        setInterval(updateDateTime, 1000);
    </script>
@endsection
