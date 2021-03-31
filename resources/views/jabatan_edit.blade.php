<div class="modal fade" id="jabatan_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
