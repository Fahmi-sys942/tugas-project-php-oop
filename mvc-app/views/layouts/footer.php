        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-auto">
        <div class="container text-center">
            <p class="mb-0 text-muted">
                &copy; <?= date('Y') ?> <?= APP_NAME ?>. All rights reserved.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto dismiss alerts after 5 seconds
        setTimeout(function() {
            let alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                let bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Confirm delete
        function confirmDelete(url, item) {
            if (confirm('Apakah Anda yakin ingin menghapus ' + item + ' ini?')) {
                window.location.href = url;
            }
            return false;
        }
    </script>
</body>
</html>
