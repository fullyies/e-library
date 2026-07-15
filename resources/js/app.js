// resources/js/app.js

document.addEventListener('DOMContentLoaded', () => {

    // Auto-hilangkan alert sukses setelah beberapa detik
    const alerts = document.querySelectorAll('.alert-success');
    alerts.forEach((alert) => {
        setTimeout(() => {
            alert.classList.add('fade');
            setTimeout(() => alert.remove(), 300);
        }, 3000);
    });

    // Aktifkan semua tooltip Bootstrap (kalau ada elemen data-bs-toggle="tooltip")
    const tooltipEls = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipEls.forEach((el) => new bootstrap.Tooltip(el));

});
