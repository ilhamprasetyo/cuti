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


  <!-- Navbar -->
  @include('navbar_admin')

  <!-- Modal form input unit -->
  @include('unit_input')

  <!-- Content -->
  <section class="margin-top" id="unit">
    <div class="container-fluid">
      <div class="card p-3">

        <!-- Title -->
        <div class="mb-3 bg-light text-center">
          <h1 class="display-4">Unit</h1>
        </div>

        <!-- Table -->
        <table class="table table-hover" id="table_id">
          <thead class="thead-dark">
            <tr align="center">
              <th scope="col">No</th>
              <th scope="col">Nama Unit</th>
              <th scope="col">Opsi</th>
            </tr>
          </thead>
          <tbody>

            <!-- Data dari Database -->
            @foreach($unit as $data)
            <tr align="center">
              <td class="align-middle" scope="row"> {{ $loop->iteration }} </td>
              <td class="align-middle"> {{ $data->nama_unit}} </td>
              <td class="align-middle">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#unit_edit" data-id="{{$data->id}}" data-nama_unit="{{$data->nama_unit}}" data-simpan="/unit/update/{{ $data->id }}">Edit</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete" data-hapus="/unit/hapus/{{ $data->id }}">Hapus</button>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>


    <!-- Modal form edit data -->
    @include('unit_edit')

    <!-- Modal form edit data -->
    @include('delete')

  </section>

  <!-- CDN Javascript dan Custom Javascript -->
  @include('behavior')

</body>
</html>
