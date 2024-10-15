<div class="modal-header">
    <h5 class="modal-title">Konfirmasi Penghapusan</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <p>Apakah Anda yakin ingin menghapus data penjualan dengan kode <b>{{ $penjualan->penjualan_kode }}</b>?</p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
    <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
</div>

<script>
    // Klik tombol "Hapus" untuk mengonfirmasi penghapusan
    $('#confirmDelete').click(function() {
        $.ajax({
            url: "{{ url('penjualan/' . $penjualan->id . '/delete_ajax') }}", // Gantilah dengan URL yang benar
            type: 'DELETE',
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(response) {
                if (response.status) {
                    // Tampilkan pesan berhasil dan tutup modal
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.message,
                    });
                    $('#myModal').modal('hide'); // Menutup modal setelah penghapusan berhasil
                    dataPenjualan.ajax.reload(); // Reload data di DataTable
                } else {
                    // Tampilkan pesan kesalahan
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.message,
                    });
                }
            },
            error: function(xhr) {
                // Tangani error dari AJAX
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Penghapusan gagal dilakukan. Coba lagi nanti.',
                });
            }
        });
    });
</script>
