<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label>ID</label>
            <input type="text" class="form-control id" disabled="disabled">
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control nama" name="nama">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control alamat" name="alamat">
          </div>
          <div class="form-group">
            <label>Unit</label>
            <select multiple class="form-control unit_id" name="unit_id">
                @foreach($unit as $unit)
                <option value="{{ $unit->id }}">
                  {{ $unit->nama_unit }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Jabatan</label>
              <select multiple class="form-control jabatan_id" name="jabatan_id">
                @foreach($jabatan as $jabatan)
                <option value="{{ $jabatan->id }}">
                  {{ $jabatan->nama_jabatan }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Cuti</label>
              <input type="text" class="form-control cuti" name="cuti">
            </div>
            <button type="submit" class="btn btn-success simpan">Simpan</button>
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
  var nama = button.data('nama') // Extract info from data-* attributes
  var alamat = button.data('alamat') // Extract info from data-* attributes
  var unit_id = button.data('unit_id') // Extract info from data-* attributes
  var jabatan_id = button.data('jabatan_id') // Extract info from data-* attributes
  var cuti = button.data('cuti') // Extract info from data-* attributes
  var file = button.data('file') // Extract info from data-* attributes
  var simpan = button.data('simpan') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.id').val(id)
  modal.find('.nama').val(nama)
  modal.find('.alamat').val(alamat)
  modal.find('.unit_id').val(unit_id)
  modal.find('.jabatan_id').val(jabatan_id)
  modal.find('.cuti').val(cuti)
  modal.find('.file').val(file)
  modal.find('.simpan').closest("form").attr("action", simpan)
})

$('#hapus').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var hapus = button.data('hapus') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.hapus').closest("form").attr("action", hapus)
})

$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
