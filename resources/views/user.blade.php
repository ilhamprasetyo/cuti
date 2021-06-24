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
        <div class="mb-3">
          <h1 class="title display-4">Cuti Saya</h1>          
        </div>

        <!-- Table -->
        <table class="table table-hover display nowrap dataTable dtr-inline" id="table_id">
          <thead class="thead-dark">
            <tr align="center">
              <th scope="col">No</th>
              <th scope="col">ID</th>
              <th scope="col">Jenis</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Lama</th>
              <th scope="col">Mulai</th>
              <th scope="col">Hingga</th>
              <th scope="col">Lampiran</th>
              <th scope="col">Status</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Opsi</th>
            </tr>
          </thead>
          <tbody>

            <!-- Data dari database -->
            @foreach($pengajuan as $data)
            <tr align="center">
              <th class="align-middle" scope="row"> {{ $loop->iteration }} </th>
              <td class="align-middle"> {{ $data->id }} </td>
              <td class="align-middle"> {{ $data->jenis_cuti }} </td>
              <td class="align-middle"> {{ $data->tanggal_pengajuan }} </td>
              <td class="align-middle"> {{ $data->lama_cuti }} hari</td>
              <td class="align-middle"> {{ $data->mulai }} </td>
              <td class="align-middle"> {{ $data->hingga }} </td>
              <td class="align-middle">
                @if ($data->file === null)

                @else
                <a class="btn btn-primary" href="pengajuan/download/{{ $data->id }}">Download</a>
                @endif
              </td>
              <td class="align-middle"> {{ $data->status }} </td>
              <td class="align-middle"> {{ $data->keterangan }} </td>
              <td class="align-middle">

                <!-- Jika status disetujui -->
                @if ($data->status === "Disetujui")
                <!-- Tidak ada opsi -->

                @elseif ($data->status === "Dibatalkan")
                <!-- Tidak ada opsi -->

                <!-- Jika status belum atau tidak disetujui -->
                @else
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#pengajuan_edit"
                data-id="{{$data->id}}"
                data-jenis_cuti="{{$data->jenis_cuti}}"
                data-tanggal_pengajuan="{{$data->tanggal_pengajuan}}"
                data-lama_cuti="{{$data->lama_cuti}}"
                data-mulai="{{$data->mulai}}"
                data-hingga="{{$data->hingga}}"
                data-simpan="/pengajuan/update/{{ $data->id }}">Edit</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete"
                data-hapus="/pengajuan/hapus/{{ $data->id }}">Hapus</button>
                @endif
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>

    <!-- Modal form edit data -->
    @include('pengajuan_edit')

    <!-- Modal form hapus data -->
    @include('delete')

  </section>

  <!-- CDN Javascript dan Custom Javascript -->
  @include('behavior')

</body>
</html>
