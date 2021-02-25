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
    <div class="card container p-3 my-3">

      <!-- Title -->
      <div class="mb-3 bg-light text-center">
        <h1 class="display-4">Pengajuan</h1>
      </div>

      <!-- Table -->
      <table class="table table-hover" id="table_id">
        <thead class="thead-dark">
          <tr align="center">
            <th scope="col">No</th>
            <th scope="col">ID / Nama Pegawai</th>
            <th scope="col">Tanggal Pengajuan</th>
            <th scope="col">Lama Cuti</th>
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
            <td scope="row"> {{ $loop->iteration }} </td>
            <td> {{ $data->pegawai_id }} / {{ $data->nama }} </td>
            <td> {{ $data->tanggal_pengajuan }} </td>
            <td> {{ $data->lama_cuti }} </td>
            <td> {{ $data->mulai }} </td>
            <td> {{ $data->hingga }} </td>
            <td> {{ $data->nama_unit }} </td>
            <td> {{ $data->nama_jabatan }} </td>
            <td> {{ $data->status }} </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </section>

  <!-- CDN Javascript dan Custom Javascript -->
  @include('behavior')

</body>
</html>
