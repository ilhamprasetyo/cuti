<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pengajuan Cuti</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form  action="/pengajuan/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label>Jenis Cuti</label>
              <select class="form-control" name="jenis_cuti" id="jenis_cuti" required>
                <option value="Tahunan">Cuti Tahunan</option>
                <option value="Sakit">Cuti Sakit</option>
                <option value="Penting">Cuti Penting</option>
                <option value="Hamil">Cuti Hamil</option>
              </select>
            </div>
            
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

            <div class="form-group" id="upload_file" style="display:none;">
              <label for="">Upload dokument pendukung</label>
              <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile"></label>
              </div>
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
