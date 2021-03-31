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
  <section class="margin-top" id="jabatan">

    <!-- Navbar -->
    @include('navbar_admin')

    <!-- Modal form input jabatan -->
    @include('jabatan_input')

    <!-- Content -->
    <div class="container-fluid">
      <div class="card p-3 my-3">

        <!-- Title -->
        <div class="mb-3 bg-light text-center">
          <h1 class="display-4">Jabatan</h1>
        </div>

        <!-- Table -->
        <table class="table table-hover display nowrap dataTable dtr-inline" id="table_id">
          <thead class="thead-dark">
            <tr align="center">
              <th scope="col">No</th>
              <th scope="col">Nama Jabatan</th>
              <th scope="col">Opsi</th>
            </tr>
          </thead>
          <tbody>

            <!-- Data dari database -->
            @foreach($jabatan as $data)
            <tr align="center">
              <td class="align-middle" scope="row"> {{ $loop->iteration }} </td>
              <td class="align-middle"> {{ $data->nama_jabatan }} </td>
              <td class="align-middle">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#jabatan_edit" data-id="{{$data->id}}" data-nama_jabatan="{{$data->nama_jabatan}}" data-simpan="/jabatan/update/{{ $data->id }}">Edit</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete" data-hapus="/jabatan/hapus/{{ $data->id }}">Hapus</button>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>


    <!-- Modal form ubah data-->
    @include('jabatan_edit')

    <!-- Modal form hapus data -->
    @include('delete')

  </section>

  <!-- CDN Javascript dan Custom Javascript -->
  @include('behavior')

</body>
</html>
