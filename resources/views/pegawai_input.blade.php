<div class="modal fade dark" id="input" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form action="/pegawai/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat" required>
            </div>
            <div class="form-group">
              <label>Unit</label>
              <select multiple class="form-control" name="unit_id" required>

                @foreach($unit as $unit)
                <option value=" {{ $unit->id }} ">
                  {{ $unit->nama_unit}}
                </option>
                @endforeach

              </select>
            </div>
            <div class="form-group">
              <label>Jabatan</label>
              <select multiple class="form-control" name="jabatan_id" required>

                @foreach($jabatan as $jabatan)
                <option value=" {{ $jabatan->id }} ">
                  {{ $jabatan->nama_jabatan }}
                </option>
                @endforeach

              </select>
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name="cuti" value="12">
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn btn-danger">Reset</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
