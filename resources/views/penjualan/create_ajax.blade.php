<form id="createPenjualanForm">
    <div class="modal-header">
        <h5 class="modal-title">Tambah Penjualan</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label>Pembeli</label>
            <input type="text" class="form-control" name="pembeli" required>
        </div>
        <div class="form-group">
            <label>Kode Penjualan</label>
            <input type="text" class="form-control" name="penjualan_kode" required>
        </div>
        <div class="form-group">
            <label>Tanggal Penjualan</label>
            <input type="date" class="form-control" name="penjualan_tanggal" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#createPenjualanForm').submit(function(e) {
            e.preventDefault(); // Mencegah pengiriman form default

            $.ajax({
                url: "{{ route('penjualan.store_ajax') }}", // Pastikan route ini ada
                method: 'POST',
                data: $(this).serialize() + "&_token={{ csrf_token() }}", // Tambahkan CSRF token
                success: function(response) {
                    if (response.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                        });
                        $('#myModal').modal('hide'); // Menutup modal setelah berhasil
                        dataPenjualan.ajax.reload(); // Reload data di DataTable
                    } else {
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
                        text: 'Gagal menyimpan data. Silakan coba lagi.',
                    });
                }
            });
        });
    });
</script>
