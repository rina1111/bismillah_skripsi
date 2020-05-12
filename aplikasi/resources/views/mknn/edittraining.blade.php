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


  <div class="card card-body" style="background-color: #312450;">
    <div class="container">
    <form method="post" action= '/mknn/{{$data->id}}/updatetraining' enctype="multipart/form-data">
  @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label style="color:white;">NIM</label>
        <input name="nim" type="text" class="form-control" id="inputEmail4" value="{{$data->nim}}">
      </div>
      <div class="form-group col-md-6">
        <label style="color:white;">Nama</label>
        <input name="nama" type="text" class="form-control" id="inputPassword4" value="{{$data->nama}}">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label style="color:white;">Jurusan</label>
        <input name="jurusan" type="text" class="form-control" id="inputEmail4" value="{{$data->jurusan}}">
      </div>
      <div class="form-group col-md-6">
        <label style="color:white;">Fakultas</label>
        <select name="fakultas" id="fakultas" class="form-control" >
          <option value="Adab dan Humaniora"@if($data->fakultas=='Adab dan Humaniora') selected='selected' @endif>Adab dan Humaniora</option>
          <option value="Ushuludin"@if($data->fakultas=='Ushuludin') selected='selected' @endif >Ushuludin</option>
          <option value="Syariah dan Hukum"@if($data->fakultas=='Syariah dan Hukum') selected='selected' @endif >Syariah dan Hukum</option>
          <option value="Dakwah dan Komunikasi"@if($data->fakultas=='Dakwah dan Komunikasi') selected='selected' @endif>Dakwah dan Komunikasi</option>
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
        <input name="jml_saudara" type="text" class="form-control" id="inputEmail4" value="{{$data->jml_saudara}}">
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Rerata Rapor</label>
        <input name="rerata_rapor" type="text" class="form-control" id="inputPassword4" value="{{$data->rerata_rapor}}">
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Rerata UN</label>
        <input name="rerata_un" type="text" class="form-control" id="inputPassword4" value="{{$data->rerata_un}}">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label style="color:white;">Nama Ayah</label>
        <input name="nama_ayah" type="text" class="form-control" id="inputEmail4" value="{{$data->nama_ayah}}">
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Status</label>
        <select name="status_ayah" id="inputState" class="form-control">
          <option value="1" {{ $data->status_ayah== 1 ? 'selected' : '' }}>Hidup</option>
          <option value="2" {{ $data->status_ayah == 1 ? 'selected' : '' }}>Meninggal</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Pekerjaan</label>
        <select name="pekerjaan_ayah" id="inputState" class="form-control">
        <option value="PNS"@if($data->pekerjaan_ayah=='PNS') selected='selected' @endif >PNS</option>
        <option value="Pensiunan PNS"@if($data->pekerjaan_ayah=='Pensiunan PNS') selected='selected' @endif >Pensiunan PNS</option>
        <option value="Pegawai Swasta"@if($data->pekerjaan_ayah=='Pegawai Swasta') selected='selected' @endif >Pegawai Swasta</option>
        <option value="Petani"@if($data->pekerjaan_ayahu=='Petani') selected='selected' @endif >Petani</option>
        <option value="Pedagang"@if($data->pekerjaan_ayah=='Pedagang') selected='selected' @endif >Pedagang</option>
        <option value="Lain-lain"@if($data->pekerjaan_ayah=='Lain-lain') selected='selected' @endif >Lain-lain</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Penghasilan Ayah</label>
        <input name="penghasilan_ayah" type="text" class="form-control" id="inputPassword4" value="{{$data->penghasilan_ayah}}">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label style="color:white;">Nama Ibu</label>
        <input  name="nama_ibu" type="text" class="form-control" id="inputEmail4" value="{{$data->nama_ibu}}">
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Status</label>
        <select  name="status_ibu" id="inputState" class="form-control">
          <option value="1" {{ $data->status_ibu == 1 ? 'selected' : '' }}>Hidup</option>
          <option value="2" {{ $data->status_ibu == 1 ? 'selected' : '' }}>Meninggal</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Pekerjaan</label>
        <select  name="pekerjaan_ibu" id="inputState" class="form-control">
          <option value="PNS"@if($data->pekerjaan_ibu=='PNS') selected='selected' @endif >PNS</option>
          <option value="Pensiunan PNS"@if($data->pekerjaan_ibu=='Pensiunan PNS') selected='selected' @endif >Pensiunan PNS</option>
          <option value="Pegawai Swasta"@if($data->pekerjaan_ibu=='Pegawai Swasta') selected='selected' @endif >Pegawai Swasta</option>
          <option value="Petani"@if($data->pekerjaan_ibu=='Petani') selected='selected' @endif >Petani</option>
          <option value="Pedagang"@if($data->pekerjaan_ibu=='Pedagang') selected='selected' @endif >Pedagang</option>
          <option value="Ibu Rumah Tangga"@if($data->pekerjaan_ibu=='Ibu Rumah Tangga') selected='selected' @endif >Ibu Rumah Tangga</option>
          <option value="Lain-lain"@if($data->pekerjaan_ibu=='Lain-lain') selected='selected' @endif >Lain-lain</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Penghasilan Ibu</label>
        <input name="penghasilan_ibu" type="text" class="form-control" id="inputPassword4" value="{{$data->penghasilan_ibu}}">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-3">
        <label style="color:white;">Pajak Bumi Bangunan</label>
        <input name="pbb" type="text" class="form-control" id="inputEmail4" value="{{$data->pbb}}">
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Rekening Listrik</label>
        <input name="rekening_listrik" type="text" class="form-control" id="inputEmail4" value="{{$data->rekening_listrik}}">
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;"> SKTM</label>
        <select name="sktm" id="inputState" class="form-control">
          <option value="1" {{ $data->sktm == 1 ? 'selected' : '' }}>Ada</option>
          <option value="0" {{ $data->sktm == 0 ? 'selected' : '' }}>Tidak Ada</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label style="color:white;">Statu Penerima Beasiswa</label>
        <select name="status_beasiswa" id="inputState" class="form-control">
          <option value="1" {{ $data->status_beasiswa == 1 ? 'selected' : '' }}>Menerima</option>
          <option value="0" {{ $data->status_beasiswa == 0 ? 'selected' : '' }}>Tidak Menerima</option>
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Update Data</button>
  </form>
  </div>
  </div>



    </section>
  </body>
</html>
