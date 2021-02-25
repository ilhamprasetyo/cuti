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
            <label>Tanggal Pengajuan</label>
            <input type="date" class="form-control tanggal_pengajuan" name="tanggal_pengajuan">
          </div>
          <div class="form-group">
            <label>Lama Cuti</label>
            <input type="number" class="form-control lama_cuti" name="lama_cuti">
          </div>
          <div class="form-group">
            <label>Mulai</label>
            <input type="date" class="form-control mulai" name="mulai">
          </div>
          <div class="form-group">
            <label>Hingga</label>
            <input type="date" class="form-control hingga" name="hingga">
          </div>          
          <button type="submit" class="btn btn-primary simpan">Simpan</button>
        </form>
      </div>
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
