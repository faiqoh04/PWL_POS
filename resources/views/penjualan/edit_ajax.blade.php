<form id="editPenjualanForm">
    <div class="modal-header">
        <h5 class="modal-title">Edit Penjualan</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label>Pembeli</label>
            <input type="text" class="form-control" name="pembeli" value="{{ $penjualan->pembeli }}" required>
            <small id="error-pembeli" class="error-text form-text text-danger"></small>
        </div>
        <div class="form-group">
            <label>Kode Penjualan</label>
            <input type="text" class="form-control" name="penjualan_kode" value="{{ $penjualan->penjualan_kode }}" required>
            <small id="error-penjualan_kode" class="error-text form-text text-danger"></small>
        </div>
        <div class="form-group">
            <label>Tanggal Penjualan</label>
            <input type="date" class="form-control" name="penjualan_tanggal" value="{{ $penjualan->penjualan_tanggal }}" required>
            <small id="error-penjualan_tanggal" class="error-text form-text text-danger"></small>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#editPenjualanForm').submit(function(e) {
            e.preventDefault();

            // Clear previous errors
            $('.error-text').text('');

            $.ajax({
                url: "{{ route('penjualan.update_ajax', $penjualan->penjualan_id) }}",
                method: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message
                        });
                        $('#myModal').modal('hide');
                        dataPenjualan.ajax.reload();
                    } else {
                        // Handle validation errors
                        $.each(response.errors, function(key, val) {
                            $('#error-' + key).text(val[0]);
                        });
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: response.message
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Terjadi kesalahan pada server.'
                    });
                }
            });
        });
    });
</script>
