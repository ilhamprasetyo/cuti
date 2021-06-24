<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS CDN and  Custom CSS -->
  @include('style')

  <title>CutiKu - Karyawan</title>
</head>
<body>

  <!-- Navbar -->
  @include('navbar')

  <!-- Content -->
  <section class="margin-top" id="karyawan">
    <div class="container-fluid">
      <div class="card p-3">
        <!-- Title -->
        <div class="mb-3">
          <h1 class="title display-4">Karyawan</h1>
        </div>

        <!-- Table -->
        <div class="">
          <table class="table table-hover display nowrap dataTable dtr-inline" id="table_id">
            <thead class="thead-dark">
              <tr align="center">
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Cuti</th>
                <th scope="col">Foto</th>
              </tr>
            </thead>
            <tbody>

              <!-- Data from database -->
              @foreach($karyawan as $data)
              <tr align="center">
                <th class="align-middle" scope="row"> {{ $loop->iteration }} </td>
                <td class="align-middle"> {{ $data->nama}} </td>
                <td class="align-middle"> {{ $data->alamat }} </td>
                <td class="align-middle"> {{ $data->cuti }} hari </td>
                <td class="align-middle">

                  <!-- Jika tidak ada foto -->
                  @if ($data->file === null)
                  Null
                  <!-- Jika foto ada -->
                  @else
                  <img class="photo-thumbnail img-thumbnail" src="photos/{{$data->file}}">

                  @endif

                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <!-- CDN Javascript dan Custom Javascript -->
  @include('behavior')

</body>
</html>
