<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Peserta</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  
    <!-- Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  </head>
  <body>

    <div class="container shadow my-5 p-4">
      <h2 class="fw-semibold text-center mb-5">Detail Peserta</h2>
      <div class="table-responsive">
        <table class="table table-hover table-borderless">
          <tr>
            <th >Nama</th>
            <td>:</td>
            <td>{{ $participant->nama }}</td>
          </tr>
          <tr>
            <th>NIK</th>
            <td>:</td>
            <td>{{ $participant->nik }}</td>
          </tr>
          <tr>
            <th>Tempat Lahir</th>
            <td>:</td>
            <td>{{ $participant->tempat_lhr }}</td>
          </tr>
          <tr>
            <th>Tanggal Lahir</th>
            <td>:</td>
            <td>{{ date('d-M-Y', strtotime($participant->tanggal_lhr)) }}</td>
          </tr>
          <tr>
            <th>Jenis Kelamin</th>
            <td>:</td>
            <td>{{ $participant->gender }}</td>
          </tr>
          <tr>
            <th>Pangkat, Golongan</th>
            <td>:</td>
            <td>{{ $participant->golongan }}</td>
          </tr>
          <tr>
            <th>Jabatan</th>
            <td>:</td>
            <td>{{ $participant->jabatan }}</td>
          </tr>
          <tr>
            <th>Instansi</th>
            <td>:</td>
            <td>{{ $participant->instansi }}</td>
          </tr>
          <tr>
            <th>Alamat Instansi</th>
            <td>:</td>
            <td>{{ $participant->alamat_instansi }}</td>
          </tr>
          <tr>
            <th>No Telp / HP</th>
            <td>:</td>
            <td>{{ $participant->no_hp }}</td>
          </tr>
          <tr>
            <th>Alamat Rumah</th>
            <td>:</td>
            <td>{{ $participant->alamat_rumah }}</td>
          </tr>
          <tr>
            <th>Email</th>
            <td>:</td>
            <td>{{ $participant->email }}</td>
          </tr>
          <tr>
            <th>NIK</th>
            <td>:</td>
            <td>{{ $participant->nik }}</td>
          </tr>
          <tr>
            <th>No NPWP</th>
            <td>:</td>
            <td>{{ $participant->no_npwp }}</td>
          </tr>
          <tr>
            <th>Nama Bank</th>
            <td>:</td>
            <td>{{ $participant->nama_bank }}</td>
          </tr>
          <tr>
            <th>No Rekening</th>
            <td>:</td>
            <td>{{ $participant->no_rek }}</td>
          </tr>
        </table>
      </div>
      <div class="d-flex justify-content-end mt-4">
        <a href="{{ route("kehadiran.ttd", [$kegiatan->id_kegiatan, $participant->nik]) }}" class="btn btn-success shadow-sm"><i class="d-flex justify-content-end"></i> Selanjutnya</a>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

  </body>
</html>