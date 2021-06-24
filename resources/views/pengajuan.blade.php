<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS CDN and  Custom CSS -->
  @include('style')

  <title>CutiKu - Admin</title>
</head>
<body>
  <section class="margin-top" id="pengajuan">

    <!-- Navbar -->
    @include('navbar_admin')

    <!-- Content -->
    <div class="container-fluid">
      <div class="card p-3 my-3">

        <!-- Title -->
        <div class="mb-3">
          <h1 class="title display-4">Pengajuan</h1>
        </div>

        <!-- Table -->
        <table class="table table-hover display nowrap dataTable dtr-inline" id="table_id">
          <thead class="thead-dark">
            <tr align="center">
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Lama</th>
              <th scope="col">Mulai</th>
              <th scope="col">Hingga</th>
              <th scope="col">Unit</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>

            <!-- Data dari database -->
            @foreach($pengajuan as $data)
            <tr align="center">
              <td class="align-middle" scope="row"> {{ $loop->iteration }} </td>
              <td class="align-middle"> {{ $data->nama }} </td>
              <td class="align-middle"> {{ $data->tanggal_pengajuan }} </td>
              <td class="align-middle"> {{ $data->lama_cuti }} hari </td>
              <td class="align-middle"> {{ $data->mulai }} </td>
              <td class="align-middle"> {{ $data->hingga }} </td>
              <td class="align-middle"> {{ $data->nama_unit }} </td>
              <td class="align-middle"> {{ $data->nama_jabatan }} </td>
              <td class="align-middle"> {{ $data->status }} </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>

  </section>

  <!-- CDN Javascript dan Custom Javascript -->
  @include('behavior')

</body>
</html>
