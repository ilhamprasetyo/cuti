<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="head">
          <div class="form-group">
            <label>ID</label>
            <input type="text" class="form-control id" disabled>
          </div>
          <div class="form-group">
            <label>Nama Unit</label>
            <input type="text" class="form-control nama_unit" name="nama_unit">
          </div>
          <button type="submit" class="btn btn-primary simpan">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div align="center" class="modal-body">
        <form>
          <button type="submit" class="px-5 mr-5 btn btn-danger hapus">Iya</button>
          <button type="button" class="px-5 btn btn-success" data-dismiss="modal" aria-label="Close">Tidak</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$('#edit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  var nama_unit = button.data('nama_unit') // Extract info from data-* attributes
  var simpan = button.data('simpan') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.id').val(id)
  modal.find('.nama_unit').val(nama_unit)
  modal.find('.simpan').closest("form").attr("action",simpan)
})

$('#hapus').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var hapus = button.data('hapus') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.hapus').closest("form").attr("action",hapus)
})
</script>
