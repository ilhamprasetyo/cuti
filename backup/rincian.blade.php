@include('navbar')
<div class="card container p-3 my-3 w-50">
  <form method="head" action="/pengajuan/update/{{ $pengajuan->id }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
      <label>ID / Nama</label>
      <input type="text" class="form-control" value="{{ $pengajuan->pegawai_id }} / {{ $pengajuan->nama }}" disabled>
      <input type="hidden" class="form-control" name="pegawai_id" value="{{$pengajuan->pegawai_id}}">
    </div>
    <div class="form-group">
      <label>Tanggal Pengajuan</label>
      <input type="date" class="form-control" value="{{ $pengajuan->tanggal_pengajuan }}" disabled>
      <input type="hidden" class="form-control" name="tanggal_pengajuan" value="{{$pengajuan->tanggal_pengajuan}}">
    </div>
    <div class="form-group">
      <div class="form-row">
        <div class="col-auto">
          <label>Cuti</label>
          <input type="number" class="form-control" value="{{ $pengajuan->cuti }}" disabled>
        </div>
        <div class="col-auto">
          <label>Lama Cuti</label>
          <input type="number" class="form-control" value="{{ $pengajuan->lama_cuti }}" disabled>
          <input type="hidden" class="form-control" name="lama_cuti"value="{{$pengajuan->lama_cuti}}">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label>Mulai</label>
      <input type="date" class="form-control" value="{{ $pengajuan->mulai }}" disabled>
      <input type="hidden" class="form-control" name="mulai"value="{{$pengajuan->mulai}}">
    </div>
    <div class="form-group">
      <label>Hingga</label>
      <input type="date" class="form-control" value="{{ $pengajuan->hingga }}" disabled>
      <input type="hidden" class="form-control" name="hingga"value="{{$pengajuan->hingga}}">
    </div>
    <div class="form-group">
      <label>Unit</label>
      <input type="text" class="form-control" value="{{$pengajuan->nama_unit}}" disabled>
      <input type="hidden" class="form-control" name="unit_id"value="{{$pengajuan->unit_id}}">
    </div>
    <div class="form-group">
      <label>Jabatan</label>
      <input type="text" class="form-control" value="{{$pengajuan->nama_jabatan}}" disabled>
      <input type="hidden" class="form-control" name="jabatan_id"value="{{$pengajuan->jabatan_id}}">
    </div>
    <div class="form-group">
      <label>Status</label>
      <select class="form-control" name="status">
        <option value="{{$pengajuan->status}}">{{$pengajuan->status}}</option>
        <option value="Disetujui">Disetujui</option>
        <option value="Tidak Disetujui">Tidak Disetujui</option>
      </select>
    </div>
    @if ($pengajuan->lama_cuti > $pengajuan->cuti)
    <button type="button" class="btn btn-danger" data-toggle="popover" title="Info" data-content="Lama Cuti melebihi limit">Simpan</button>
    @else
    <button type="submit" class="btn btn-primary">Simpan</button>
    @endif
  </form>
</div>

<script type="text/javascript">
$(function () {
$('[data-toggle="popover"]').popover()
})
</script>
</body>
</html>
