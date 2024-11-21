<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="<?= base_url('admin') ?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('admin') ?>/assets/js/sidebar-menu.js"></script>
<script src="<?= base_url('admin') ?>/assets/js/dragdrop.js"></script>
<script src="<?= base_url('admin') ?>/assets/js/rangeslider.min.js"></script>
<script src="<?= base_url('admin') ?>/assets/js/sweetalert.js"></script>
<script src="<?= base_url('admin') ?>/assets/js/quill.min.js"></script>
<script src="<?= base_url('admin') ?>/assets/js/data-table.js"></script>
<script src="<?= base_url('admin') ?>/assets/js/prism.js"></script>
<script src="<?= base_url('admin') ?>/assets/js/clipboard.min.js"></script>
<script src="<?= base_url('admin') ?>/assets/js/feather.min.js"></script>
<script src="<?= base_url('admin') ?>/assets/js/simplebar.min.js"></script>
<script src="<?= base_url('admin') ?>/assets/js/apexcharts.min.js"></script>
<script src="<?= base_url('admin') ?>/assets/js/amcharts.js"></script>
<script src="<?= base_url('admin') ?>/assets/js/custom/ecommerce-chart.js"></script>
<script src="<?= base_url('admin') ?>/assets/js/custom/custom.js"></script>
<script src="<?= base_url('admin') ?>/assets/uploadImg/script.js"></script>
<!-- <script src="<?= base_url('admin') ?>/assets/css/filepond/filepond.js"></script> -->
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>


<script>
    // Register the plugin
    FilePond.registerPlugin(FilePondPluginImagePreview);

    // Get a reference to the file input element
    const inputElement = document.querySelector('.filepond');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mengambil semua toast yang ada
        const toastElements = document.querySelectorAll('.toast');

        // Menambahkan kelas animasi ke setiap toast dan menampilkan
        toastElements.forEach((toast, index) => {
            // Tambahkan kelas transisi masuk (slide-in-right)
            toast.classList.add('slide-in-right');

            // Buat instance toast untuk ditampilkan
            const toastInstance = new bootstrap.Toast(toast, {
                delay: 10000
            }); // Delay 10 detik

            // Tampilkan toast
            toastInstance.show();

            // Setelah delay, tambahkan animasi keluar
            setTimeout(() => {
                toast.classList.remove('slide-in-right');
                toast.classList.add('slide-out-right');
            }, 10000); // Setelah 10 detik, animasi keluar

            // Jika toast ditutup manual, animasi keluar juga berlaku
            toast.querySelector('.btn-close').addEventListener('click', () => {
                toast.classList.remove('slide-in-right');
                toast.classList.add('slide-out-right');
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('#deleteJurusanBtn').forEach(function(button) {
            button.addEventListener('click', function() {
                const jurusanId = this.getAttribute('data-id');
                const namaJurusan = this.getAttribute('data-nama');

                // SweetAlert konfirmasi
                Swal.fire({
                    title: `Apakah Anda yakin ingin menghapus jurusan "${namaJurusan}"?`,
                    text: "Data ini tidak dapat dikembalikan setelah dihapus.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal",
                    reverseButtons: true
                }).then(function(result) {
                    if (result.value) {
                        // Jika konfirmasi hapus, kirim permintaan AJAX
                        fetch(`/jurusan/${jurusanId}/hapus`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    id: jurusanId
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire("Dihapus!", data.message, "success").then(() => {
                                        // Reload atau hapus elemen dari DOM jika perlu
                                        location.reload(); // Reload halaman
                                    });
                                } else {
                                    Swal.fire("Gagal!", data.message, "error");
                                }
                            })
                            .catch(error => {
                                Swal.fire("Error!", "Terjadi kesalahan saat menghapus data.", "error");
                            });
                    } else if (result.dismiss === "cancel") {
                        Swal.fire("Dibatalkan", "Jurusan aman dan tidak dihapus.", "error");
                    }
                });
            });
        });
    });
</script>