<div class="modal fade" id="rincian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Approval</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="form-group">
            <label>ID Pengajuan : </label>
            <input type="text" class="form-control id" readonly>
          </div>
          <div class="form-group">
            <label>Nama : </label>
            <input type="text" class="form-control nama" readonly>
          </div>
          <div class="form-group">
            <label>Status : </label>
            <select class="form-control status" name="status" required>
              <option value="Disetujui">Disetujui</option>
              <option value="Tidak Disetujui">Tidak Disetujui</option>
              <option value="Dibatalkan">Dibatalkan</option>
            </select>
          </div>
          <div class="form-group">
            <label>Keterangan : </label>
            <textarea class="form-control keterangan" name="keterangan"></textarea>
          </div>
          <button type="submit" class="btn btn-primary simpan">Simpan</button>
        </form>
      </div>
        </div>
      </div>
    </div>
  </div>
