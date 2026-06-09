                <!-- Footer -->
                <footer class="text-center text-muted pt-3 border-top mt-auto">
                    <small>&copy; 2026 Pemrograman Web &mdash; Universitas Bumigora</small>
                </footer>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            // DataTable
            if ($('#datatable').length && $.fn.DataTable) {
                if (!$.fn.dataTable.isDataTable('#datatable')) {
                    $('#datatable').DataTable({
                        responsive: true,
                        pageLength: 10,
                        language: {
                            search: 'Cari:',
                            lengthMenu: 'Tampilkan _MENU_ data',
                            info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                            infoEmpty: 'Tidak ada data yang ditampilkan',
                            zeroRecords: 'Data tidak ditemukan',
                            paginate: {
                                previous: 'Sebelumnya',
                                next: 'Berikutnya'
                            }
                        }
                    });
                }
            }

            // SweetAlert flashdata
            <?php $swal = $this->session->flashdata('swal'); ?>
            <?php if ($swal): ?>
                Swal.fire({
                    icon: '<?php echo $swal['icon']; ?>',
                    title: '<?php echo $swal['title']; ?>',
                    text: '<?php echo $swal['text']; ?>',
                    confirmButtonColor: '#0d6efd'
                });
            <?php endif; ?>

            // Toggle password visibility
            $(document).on('click', '.btn-toggle-password', function () {
                var input = $(this).closest('.input-group').find('input');
                var icon = $(this).find('i');

                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('bi-eye').addClass('bi-eye-slash');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('bi-eye-slash').addClass('bi-eye');
                }
            });

            // Konfirmasi hapus
            $(document).on('click', '.btn-hapus', function (e) {
                e.preventDefault();
                var url = $(this).attr('href');

                Swal.fire({
                    title: 'Hapus data ini?',
                    text: 'Data yang sudah dihapus tidak bisa dikembalikan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal'
                }).then(function (result) {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>
</body>
</html>