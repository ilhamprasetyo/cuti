<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS CDN and Custom CSS -->
  @include('style')

  <title>CutiKu - Home User</title>
</head>
<body>

  <!-- Navbar -->
  @include('navbar')

  <!-- Modal form pengajuan cuti -->
  @include('pengajuan_input')

  <!-- Content -->
  <section class="margin-top" id="user">
    <div class="container-fluid">
      <div class="card p-3">

        <!-- Title -->
        <div class="mb-3 bg-light text-center">
          <h1 class="display-4">Cuti Saya</h1>
        </div>

        <!-- Table -->
        <div class="table table-hover text-center">
          <table class="table" id="table_id">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Pengajuan</th>
                <th scope="col">Lama Cuti</th>
                <th scope="col">Mulai</th>
                <th scope="col">Hingga</th>
                <th scope="col">Status</th>
                <th scope="col">Opsi</th>
              </tr>
            </thead>
            <tbody>

              <!-- Data dari database -->
              @foreach($pengajuan as $data)
              <tr>
                <th scope="row"> {{ $loop->iteration }} </th>
                <td> {{ $data->tanggal_pengajuan }} </td>
                <td> {{ $data->lama_cuti }} </td>
                <td> {{ $data->mulai }} </td>
                <td> {{ $data->hingga }} </td>
                <td> {{ $data->status }} </td>
                <td>

                  <!-- Jika status belum di-approve -->
                  @if ($data->status === null)
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit"
                  data-id="{{$data->id}}"
                  data-pegawai_id="{{$data->pegawai_id}}"
                  data-nama="{{$data->nama}}"
                  data-tanggal_pengajuan="{{$data->tanggal_pengajuan}}"
                  data-lama_cuti="{{$data->lama_cuti}}"
                  data-mulai="{{$data->mulai}}"
                  data-hingga="{{$data->hingga}}"
                  data-unit_id="{{$data->unit_id}}"
                  data-nama_unit="{{$data->nama_unit}}"
                  data-jabatan_id="{{$data->jabatan_id}}"
                  data-nama_jabatan="{{$data->nama_jabatan}}"
                  data-simpan="/pengajuan/update/{{ $data->id }}">Edit</button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus"
                  data-hapus="/pengajuan/hapus/{{ $data->id }}">Hapus</button>

                  <!-- Jika status sudah di-approve -->
                  @else

                  @endif
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Modal form edit data dan hapus -->
    @include('pengajuan_opsi')

  </section>

  <!-- CDN Javascript dan Custom Javascript -->
  @include('behavior')

</body>
</html>
