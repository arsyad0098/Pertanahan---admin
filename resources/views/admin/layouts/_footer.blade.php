<footer class="footer-custom bg-white shadow-sm rounded-4 mt-5 py-3 px-4">
    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
        <div class="text-muted small">
            © 2019 - <span class="current-year fw-semibold text-dark"></span>
            <a class="text-decoration-none fw-semibold text-primary" href="https://themesberg.com" target="_blank">
                Themesberg
            </a>. All rights reserved.
        </div>

        <div class="footer-links d-flex align-items-center gap-3">
            <a href="#" class="text-secondary text-decoration-none small footer-link">About</a>
            <a href="#" class="text-secondary text-decoration-none small footer-link">Themes</a>
            <a href="#" class="text-secondary text-decoration-none small footer-link">Blog</a>
            <a href="#" class="text-secondary text-decoration-none small footer-link">Contact</a>
        </div>
    </div>
</footer>

<!-- Tambahkan style -->
<style>
    .footer-custom {
        border-top: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .footer-custom:hover {
        box-shadow: 0 4px 20px rgba(13, 110, 253, 0.08);
    }

    .footer-link {
        position: relative;
        transition: color 0.2s ease;
    }

    .footer-link:hover {
        color: #0d6efd !important;
    }

    .footer-link::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -3px;
        width: 0;
        height: 2px;
        background-color: #0d6efd;
        transition: width 0.3s ease;
    }

    .footer-link:hover::after {
        width: 100%;
    }
</style>

<!-- Auto-update tahun -->
<script>
    document.querySelector('.current-year').textContent = new Date().getFullYear();
</script>
