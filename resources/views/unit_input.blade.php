<div class="modal fade dark" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Unit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/unit/store">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Nama Unit</label>
            <input type="text" class="form-control" name="nama_unit">
          </div>
          <button type="submit" class="btn btn-dark">Submit</button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
