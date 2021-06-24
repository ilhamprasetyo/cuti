<!DOCTYPE html>
<html>
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

  <!-- Modal form input pegawai -->
  @include('pegawai_input')

  <!-- Content -->
  <section class="margin-top" id="pegawai">
    <div class="container-fluid">
      <div class="card p-3">
        <!-- Title -->
        <div class="mb-3">
          <h1 class="title display-4">Pegawai</h1>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-hover display nowrap dataTable dtr-inline" style="overflow-x: auto;" id="table_id">
            <thead class="thead-dark">
              <tr align="center">
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Unit</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Cuti</th>
                <th scope="col">Foto</th>
                <th scope="col">Opsi</th>
              </tr>
            </thead>
            <tbody>

              <!-- Data from database -->
              @foreach($pegawai as $data)
              <tr align="center">
                <th class="align-middle" scope="row"> {{ $loop->iteration }} </td>
                  <td class="align-middle"> {{ $data->id}} </td>
                  <td class="align-middle"> {{ $data->nama}} </td>
                  <td class="align-middle"> {{ $data->alamat }} </td>
                  <td class="align-middle"> {{ $data->nama_unit }}</td>
                  <td class="align-middle"> {{ $data->nama_jabatan }} </td>
                  <td class="align-middle"> {{ $data->cuti }} </td>
                  <td class="align-middle">

                    <!-- Jika tidak ada foto -->
                    @if ($data->file === null)
                    Null
                    <!-- Jika foto ada -->
                    @else
                    <img class="photo-thumbnail" src="photos/{{$data->file}}">

                    @endif

                  </td>
                  <td class="align-middle">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#pegawai_edit"
                    data-id="{{ $data->id }}"
                    data-nama="{{ $data->nama }}"
                    data-alamat="{{ $data->alamat }}"
                    data-unit_id="{{ $data->unit_id }}"
                    data-jabatan_id="{{$data->jabatan_id}}"
                    data-cuti="{{ $data->cuti }}"
                    data-cuti="{{ $data->file }}"
                    data-simpan="/pegawai/update/{{ $data->id }}">Edit</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete" data-hapus="/pegawai/hapus/{{ $data->id }}">Hapus</button>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>

      </div>

      <!-- Modal form edit data -->
      @include('pegawai_edit')

      <!-- Modal form delete data -->
      @include('delete')

    </section>

    <!-- CDN Javascript dan Custom Javascript -->
    @include('behavior')

    <script type="text/javascript">

    </script>

  </body>
  </html>
