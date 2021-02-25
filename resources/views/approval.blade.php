<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS CDN and Custom CSS -->
  @include('style')

  <title>CutiKu - Approval</title>
</head>
<body>
  <!-- Navbar -->
  @include('navbar')

  <!-- Form Modal Pengajuan Cuti -->
  @include('pengajuan_input')

  <!-- Content -->
  <section class="margin-top" id="approval">
    <div class="container-fluid">
      <div class="card p-3">

        <!-- Form Title -->
        <div class="mb-3 bg-light text-center">
          <h1 class="display-4">Approval</h1>
        </div>

        <!-- Table -->
        <div class="table-responsive table-hover text-center">
          <table class="table" id="table_id">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">ID / Nama Pegawai</th>
                <th scope="col">Cuti</th>
                <th scope="col">Tanggal Pengajuan</th>
                <th scope="col">Lama Cuti</th>
                <th scope="col">Mulai</th>
                <th scope="col">Hingga</th>
                <th scope="col">Status</th>
                <th scope="col">Opsi</th>
              </tr>
            </thead>
            <tbody>

              <!-- Data from Database -->
              @foreach($pengajuan as $data)
              <tr>
                <th scope="row"> {{ $loop->iteration }} </th>
                <td> {{ $data->pegawai_id }} / {{ $data->nama }} </td>
                <td> {{ $data->cuti }} </td>
                <td> {{ $data->tanggal_pengajuan }} </td>
                <td> {{ $data->lama_cuti }} </td>
                <td> {{ $data->mulai }} </td>
                <td> {{ $data->hingga }} </td>
                <td> {{ $data->status }} </td>
                <td>

                  <!-- Jika lama cuti melebihi sisa cuti -->
                  @if ($data->lama_cuti > $data->cuti)

                    <!-- Jika disetujui -->
                    @if ($data->status === "Disetujui")
                    <a class="btn btn-danger" href="/pengajuan/batal/{{$data->id}}" role="button">Batal</a>

                    <!-- Jika tidak disetujui -->
                    @else

                    @endif

                  <!-- Jika lama cuti tidak melebihi sisa cuti -->
                  @else

                    <!-- Jika disetujui -->
                    @if ($data->status === "Disetujui")
                    <a class="btn btn-danger" href="/pengajuan/batal/{{$data->id}}" role="button">Batal</a>

                    <!-- Jika dibatalkan -->
                    @elseif ($data->status === "Dibatalkan")

                    <!-- Jika tidak disetujui -->
                    @else
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#approval"
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
                      data-status="{{$data->status}}"
                      data-simpan="/pengajuan/update/{{ $data->id }}">

                      @if ($data->status === "Tidak Disetujui")
                      Re-approval
                      @else
                      Approval
                      @endif

                    </button>
                    @endif
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal Rincian Pengajuan -->
  @include('rincian')

</section>

<!-- Javascript CDN and Custom Javascript -->
@include('behavior')

</body>
</html>
