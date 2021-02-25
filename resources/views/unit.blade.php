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
  <section class="margin-top" id="unit">

    <!-- Navbar -->
    @include('navbar_admin')

    <!-- Modal form input unit -->
    @include('unit_input')

    <!-- Content -->
    <div class="card container p-3 my-3">

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
            <td scope="row"> {{ $loop->iteration }} </td>
            <td> {{ $data->nama_unit}} </td>
            <td>
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit" data-id="{{$data->id}}" data-nama_unit="{{$data->nama_unit}}" data-simpan="/unit/update/{{ $data->id }}">Edit</button>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus" data-hapus="/unit/hapus/{{ $data->id }}">Hapus</button>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>

    <!-- Modal form edit data dan hapus -->
    @include('unit_opsi')

  </section>

  <!-- CDN Javascript dan Custom Javascript -->
  @include('behavior')

</body>
</html>
