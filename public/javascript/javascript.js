// Index Welcome Modal
$(document).ready(function() {
  if ($.cookie('disable') == null) {
    $('#myModal').modal('show');
    $.cookie('disable', '1');
  }
});

// DataTable
$(document).ready( function () {
  $('#table_id').DataTable();
});

// Bootstrap Custom File Upload
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

// Bootstrap Popover
$(function () {
  $('[data-toggle="popover"]').popover()
});

// Bootstrap Modal Data Edit
$('#edit').on('show.bs.modal', function (event) {
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
  modal.find('.simpan').closest("form").attr("action",simpan)
});

// Modal Delete Data
$('#hapus').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var hapus = button.data('hapus') // Extract info from data-* attributes

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.hapus').closest("form").attr("action",hapus)
});
