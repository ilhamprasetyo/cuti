

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
        <form>
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="form-group">
            <label>ID</label>
            <input type="text" class="form-control id" name="id" disabled="disabled">
          </div>
          <div class="form-group">
            <label>Nama Jabatan</label>
            <input type="text" class="form-control nama_jabatan" name="nama_jabatan">
          </div>
          <button type="submit" class="btn btn-primary simpan">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
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
  var nama_jabatan = button.data('nama_jabatan') // Extract info from data-* attributes
  var simpan = button.data('simpan') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.id').val(id)
  modal.find('.nama_jabatan').val(nama_jabatan)
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
