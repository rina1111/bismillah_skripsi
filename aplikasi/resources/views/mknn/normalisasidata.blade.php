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
          <li ><a href="#">Data Training</a></li>
          <li class="active"><a href="#">Normalisasi Data</a></li>
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



<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col"  style="color:white;font-size:12px;">Jumlah Saudara</th>
        <th scope="col"  style="color:white;font-size:12px;">Rerata Rapor</th>
        <th scope="col"  style="color:white;font-size:12px;">Rerata UN</th>
        <th scope="col"  style="color:white;font-size:12px;">Status Ayah</th>
        <th scope="col" style="color:white;font-size:12px;">Penghasilan Ayah</th>
        <th scope="col" style="color:white;font-size:12px;">Status Ibu</th>
        <th scope="col" style="color:white;font-size:12px;">Penghasilan Ibu</th>
        <th scope="col" style="color:white;font-size:12px;">PBB</th>
        <th scope="col" style="color:white;font-size:12px;">Rekening Listrik</th>
        <th scope="col" style="color:white;font-size:12px;">SKTM</th>
        <th scope="col" style="color:white;font-size:12px;">Status Penerimaan</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($normal_dt as $date => $array)
        <tr>
            <td style="color:white;font-size:12px; ">{{ $array['jml_saudara'] }}</td>
            <td style="color:white;font-size:12px; ">{{ $array['rerata_rapor'] }}</td>
            <td style="color:white;font-size:12px; ">{{ $array['rerata_un'] }}</td>
            <td style="color:white;font-size:12px; ">{{ $array['status_ayah'] }}</td>
            <td style="color:white;font-size:12px; ">{{ $array['penghasilan_ayah'] }}</td>
            <td style="color:white;font-size:12px; ">{{ $array['status_ibu'] }}</td>
            <td style="color:white;font-size:12px; ">{{ $array['penghasilan_ibu'] }}</td>
            <td style="color:white;font-size:12px; ">{{ $array['pbb'] }}</td>
            <td style="color:white;font-size:12px; ">{{ $array['rekening_listrik'] }}</td>
            <td style="color:white;font-size:12px; ">{{ $array['sktm'] }}</td>
            <td style="color:white;font-size:12px; ">{{ $array['status_beasiswa'] }}</td>




        </tr>

      @endforeach
    </tbody>
  </table>
</div>

    </section>
  </body>
</html>
