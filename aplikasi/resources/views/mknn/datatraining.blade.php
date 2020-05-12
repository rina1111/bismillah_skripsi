<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link href="{{asset('css/mknn.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
          <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
          <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

  </head>
  <body>
    <main class="main">
    <aside class="sidebar">
      <nav class="nav">
        <ul>
          <li ><a href="{{url('mknn/index')}}">Dashboard</a></li>
          <li class="active"><a href="#">Data Training</a></li>
          <li><a href="#">Normalisasi Data</a></li>
          <li><a href="#">Validitas Data</a></li>
            <li><a href="#">Weight Voting</a></li>
        </ul>
      </nav>
    </aside>
  </main>
  <section class="twitter">
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@include('sweetalert::alert')
    @if(session('errors'))
      @foreach ($errors as $error)
      <li>{{$error}}</li>
      @endforeach
    @endif

    @if(session('success'))
    {{session('success')}}
    @endif
  <p style="align-text:center;">
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  Tambahkan Data Training
  </button>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
  Import Data Training
  </button>
</p>
</div>
<div class="collapse" id="collapseExample">
  <div class="card card-body" style="background-color: #312450;">
    <div class="container">
    <form method="post" action='{{url('/mknn/inserttraining')}}' enctype="multipart/form-data">
  @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label style="color:white;">NIM</label>
        <input name="nim" type="text" class="form-control" id="inputEmail4">
      </div>
      <div class="form-group col-md-6">
        <label style="color:white;">Nama</label>
        <input name="nama" type="text" class="form-control" id="inputPassword4">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label style="color:white;">Jurusan</label>
        <input name="jurusan" type="text" class="form-control" id="inputEmail4">
      </div>
      <div class="form-group col-md-6">
        <label style="color:white;">Fakultas</label>
        <select name="fakultas" id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option value="Adab dan Humaniora">Adab dan Humaniora</option>
          <option value="Ushuludin">Ushuludin</option>
          <option value="Syariah dan Hukum">Syariah dan Hukum</option>
          <option value="Dakwah dan Komunikasi">Dakwah dan Komunikasi</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label style="color:white;">Semester</label>
        <input name="semester" type="text" class="form-control" value="1">
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Jumlah Saudara</label>
        <input name="jml_saudara" type="text" class="form-control" id="inputEmail4">
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Rerata Rapor</label>
        <input name="rerata_rapor" type="text" class="form-control" id="inputPassword4">
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Rerata UN</label>
        <input name="rerata_un" type="text" class="form-control" id="inputPassword4">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label style="color:white;">Nama Ayah</label>
        <input name="nama_ayah" type="text" class="form-control" id="inputEmail4">
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Status</label>
        <select name="status_ayah" id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option value="1">Hidup</option>
          <option value="2">Meninggal</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Pekerjaan</label>
        <select name="pekerjaan_ayah" id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option value="PNS">PNS</option>
          <option value="Pensiunan PNS">Pensiunan PNS</option>
          <option value="Pegawai Swasta">Pegawai Swasta</option>
          <optio value="Petani">Petani</option>
          <option value="Pedagang">Pedagang</option>
          <option value="Lain-lain">Lain-lain</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Penghasilan Ayah</label>
        <input name="penghasilan_ayah" type="text" class="form-control" id="inputPassword4">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label style="color:white;">Nama Ibu</label>
        <input  name="nama_ibu" type="text" class="form-control" id="inputEmail4">
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Status</label>
        <select  name="status_ibu" id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option value="1">Hidup</option>
          <option value="2">Meninggal</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Pekerjaan</label>
        <select  name="pekerjaan_ibu" id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option value="PNS">PNS</option>
          <option value="Pensiunan PNS">Pensiunan PNS</option>
          <option value="Pegawai Swasta">Pegawai Swasta</option>
          <optio value="Petani">Petani</option>
          <option value="Pedagang">Pedagang</option>
          <option value="Ibu Rumah Tangga"> Ibu Rumah Tangga</option>
          <option value="Lain-lain">Lain-lain</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Penghasilan Ibu</label>
        <input name="penghasilan_ibu" type="text" class="form-control" id="inputPassword4">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-3">
        <label style="color:white;">Pajak Bumi Bangunan</label>
        <input name="pbb" type="text" class="form-control" id="inputEmail4">
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Rekening Listrik</label>
        <input name="rekening_listrik" type="text" class="form-control" id="inputEmail4">
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;"> SKTM</label>
        <select name="sktm" id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option value="1">ada</option>
          <option value="0">tidak ada</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Statu Penerima Beasiswa</label>
        <select name="status_beasiswa" id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option value="1">Menerima</option>
          <option value="0">Tidak Menerima</option>
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
  </div>
  </div>
</div>

<div class="collapse" id="collapseExample2">
  <div class="card card-body">
    <form method='post' action='{{url('/mknn/importfile')}}' enctype='multipart/form-data' >
      @csrf
        <input type='file' name='file'  class="form-control">
        <input type='submit' name='submit' value='Import' class="form-control">
      </form>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col"  style="color:white;font-size:10px;">NIM</th>
        <th scope="col"  style="color:white;font-size:10px;">Nama</th>
        <th scope="col"  style="color:white;font-size:10px;">Fakultas</th>
        <th scope="col"  style="color:white;font-size:10px;">Jurusan</th>
        <th scope="col"  style="color:white;font-size:10px;">Semester</th>
        <th scope="col"  style="color:white;font-size:10px;">Jumlah Saudara</th>
        <th scope="col"  style="color:white;font-size:10px;">Rerata Rapor</th>
        <th scope="col"  style="color:white;font-size:10px;">Rerata UN</th>
        <th scope="col"  style="color:white;font-size:10px;">Nama Ayah</th>
        <th scope="col"  style="color:white;font-size:10px;">Status Ayah</th>
        <th scope="col"  style="color:white;font-size:10px;">Pekerjaan Ayah</th>
        <th scope="col" style="color:white;font-size:10px;">Penghasilan Ayah</th>
        <th scope="col" style="color:white;font-size:10px;">Nama Ibu</th>
        <th scope="col" style="color:white;font-size:10px;">Status Ibu</th>
        <th scope="col" style="color:white;font-size:10px;">Pekerjaan Ibu</th>
        <th scope="col" style="color:white;font-size:10px;">Penghasilan Ibu</th>
        <th scope="col" style="color:white;font-size:10px;">PBB</th>
        <th scope="col" style="color:white;font-size:10px;">Rekening Listrik</th>
        <th scope="col" style="color:white;font-size:10px;">SKTM</th>
        <th scope="col" style="color:white;font-size:10px;">Status Penerimaan</th>
        <th scope="col" style="color:white;font-size:10px;">aksi</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($data as $index => $dataku)
      <tr>
        <td style="color:white;font-size:10px;">{{$dataku->nim}}</td>
        <td style="color:white;font-size:10px;">{{$dataku->nama}}</td>
        <td style="color:white;font-size:10px;">{{$dataku->fakultas}}</td>
        <td style="color:white;font-size:10px;">{{$dataku->jurusan}}</td>
        <td style="color:white;font-size:10px;">{{$dataku->semester}}</td>
        <td style="color:white;font-size:10px;">{{$dataku->jml_saudara}}</td>
        <td style="color:white;font-size:10px;">{{$dataku->rerata_rapor}}</td>
        <td style="color:white;font-size:10px;">{{$dataku->rerata_un}}</td>
        <td style="color:white;font-size:10px;">{{$dataku->nama_ayah}}</td>
        <td>@if($dataku->status_ayah=='1') <i style="color:white;font-size:10px;">Hidup</i>
            @else ($dataku->status_ayah=='2')<i style="color:white;font-size:10px;">Meninggal</i> @endif</td>
        <td style="color:white;font-size:10px;">{{$dataku->pekerjaan_ayah}}</td>
        <td style="color:white;font-size:10px;">{{$dataku->penghasilan_ayah}}</td>
        <td style="color:white;font-size:10px;">{{$dataku->nama_ibu}}</td>
        <td>@if($dataku->status_ibu=='1') <i style="color:white;font-size:10px;">Hidup</i>
            @else ($dataku->status_ibu=='2')<i style="color:white;font-size:10px;">Meninggal</i> @endif</td>
        <td style="color:white;font-size:10px;">{{$dataku->pekerjaan_ibu}}</td>
        <td style="color:white;font-size:10px;">{{$dataku->penghasilan_ibu}}</td>
        <td style="color:white;font-size:10px;">{{$dataku->pbb}}</td>
        <td style="color:white;font-size:10px;">{{$dataku->rekening_listrik}}</td>
        <td>@if($dataku->sktm=='1') <i  style="color:white;font-size:10px;">Ada</i>
            @else ($dataku->sktm=='0')<i  style="color:white;font-size:10px;">Tidak Ada</i> @endif</td>
        <td>@if($dataku->status_beasiswa=='1')<a href=''  class="btn btn-success btn-sm" style="color:white;font-size:10px;"> <i class="fas fa-check"></i>Menerima</a>
             @else ($dataku->status_beasiswa=='0')<a href=''  class="btn btn-danger btn-sm" style="color:white;font-size:10px;"> <i class="fas fa-times"></i>Tidak Menerima</a> @endif</td>
        <td>  <a class="btn btn-primary btn-sm" href="/mknn/{{$dataku->id}}/edittraining" style="font-size:8px;"><i class="far fa-edit" style="font-size:10px;"></i></a>
              <a class="btn btn-danger btn-sm" href="/mknn/{{$dataku->id}}/deletetraining"style="font-size:8px;"> <i class="fas fa-window-close" style="font-size:10px;"></i> </a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
        {{ $data->links() }}
    </section>
  </body>
</html>
