<div class="modal fade" id="pegawai_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          @if (auth()->user()->jabatan_id === 0)

          @else
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control email" name="email">
          </div>
          @endif
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control alamat" name="alamat">
          </div>
          @if (auth()->user()->jabatan_id === 0)
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
          @else

          @endif
          <button type="submit" class="btn btn-success simpan">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
