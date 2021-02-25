<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pengajuan Cuti</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form action="/pengajuan/store" method="head">
            {{ csrf_field() }}
            <div class="form-group">
              <label>Tanggal Pengajuan</label>
              <input type="date" class="form-control" name="tanggal_pengajuan">
            </div>
            <div class="form-group">
              <label>Lama Cuti</label>
              <input type="number" class="form-control" min="0" max="{{$pegawai->cuti}}" name="lama_cuti">
            </div>
            <div class="form-group">
              <label>Mulai</label>
              <input type="date" class="form-control" name="mulai">
            </div>
            <div class="form-group">
              <label>Hingga</label>
              <input type="date" class="form-control" name="hingga">
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name="pegawai_id" value="{{$pegawai->id}}">
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name="unit_id" value="{{$pegawai->unit_id}}">
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name="jabatan_id" value="{{$pegawai->jabatan_id}}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
