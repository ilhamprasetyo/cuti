<div class="modal fade" id="approval" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <input type="text" class="form-control id" name="id" disabled>
          </div>
          <div class="form-group">
            <label>ID / Nama Pegawai</label>
            <input type="hidden" class="form-control pegawai_id" name="pegawai_id">
            <input type="text" class="form-control nama" disabled>
          </div>
          <div class="form-group">
            <label>Tanggal Pengajuan</label>
            <input type="hidden" class="form-control tanggal_pengajuan" name="tanggal_pengajuan">
            <input type="date" class="form-control tanggal_pengajuan" disabled>
          </div>
          <div class="form-group">
            <label>Lama Cuti</label>
            <input type="hidden" class="form-control lama_cuti" name="lama_cuti">
            <input type="number" class="form-control lama_cuti" disabled>
          </div>
          <div class="form-group">
            <label>Mulai</label>
            <input type="hidden" class="form-control mulai" name="mulai">
            <input type="date" class="form-control mulai" disabled>
          </div>
          <div class="form-group">
            <label>Hingga</label>
            <input type="hidden" class="form-control hingga" name="hingga">
            <input type="date" class="form-control hingga" disabled>
          </div>
          <div class="form-group">
            <label>Unit</label>
            <input type="hidden" class="form-control unit_id" name="unit_id">
            <input type="text" class="form-control nama_unit" disabled>
          </div>
          <div class="form-group">
            <label>Jabatan</label>
            <input type="text" class="form-control nama_jabatan" disabled>
            <input type="hidden" class="form-control jabatan_id" name="jabatan_id">
          </div>
          <div class="form-group">
            <label>Status</label>
            <select multiple class="form-control status" name="status">
              <option value="Disetujui">Disetujui</option>
              <option value="Tidak Disetujui">Tidak Disetujui</option>
              <option value="Dibatalkan">Dibatalkan</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary simpan">Simpan</button>
        </form>
      </div>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
$('#approval').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  var pegawai_id = button.data('pegawai_id') // Extract info from data-* attributes
  var nama = button.data('nama') // Extract info from data-* attributes
  var tanggal_pengajuan = button.data('tanggal_pengajuan') // Extract info from data-* attributes
  var lama_cuti = button.data('lama_cuti') // Extract info from data-* attributes
  var mulai = button.data('mulai') // Extract info from data-* attributes
  var hingga = button.data('hingga') // Extract info from data-* attributes
  var unit_id = button.data('unit_id') // Extract info from data-* attributes
  var nama_unit = button.data('nama_unit') // Extract info from data-* attributes
  var jabatan_id = button.data('jabatan_id') // Extract info from data-* attributes
  var nama_jabatan = button.data('nama_jabatan') // Extract info from data-* attributes
  var status = button.data('status') // Extract info from data-* attributes
  var simpan = button.data('simpan') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.id').val(id)
  modal.find('.pegawai_id').val(pegawai_id)
  modal.find('.nama').val(nama)
  modal.find('.tanggal_pengajuan').val(tanggal_pengajuan)
  modal.find('.lama_cuti').val(lama_cuti)
  modal.find('.mulai').val(mulai)
  modal.find('.hingga').val(hingga)
  modal.find('.unit_id').val(unit_id)
  modal.find('.nama_unit').val(nama_unit)
  modal.find('.jabatan_id').val(jabatan_id)
  modal.find('.nama_jabatan').val(nama_jabatan)
  modal.find('.status').val(status)
  modal.find('.simpan').closest("form").attr("action",simpan)
})

$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
