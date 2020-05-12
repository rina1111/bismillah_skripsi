<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\training;
use Session;
use Alert;
use Validator;
class mknn extends Controller
{
  protected $dataset;
    public function index()
    {
      return view ('mknn/index');
    }
    public function datatraining()
    {
      $data= DB::table('training')->orderBy('id', 'desc')->paginate(5);

      return view('mknn/datatraining', ['data' => $data]);
    }

    public function inserttraining(Request $request)
    {
      $data = new \App\training;
      $data->nim = $request->get('nim');
      $data->nama = $request->get('nama');
      $data->fakultas = $request->get('fakultas');
      $data->jurusan = $request->get('jurusan');
      $data->semester= $request->get('semester');
      $data->rerata_rapor = $request->get('rerata_rapor');
      $data->rerata_un = $request->get('rerata_un');
      $data->jml_saudara= $request->get('jml_saudara');
      $data->nama_ayah = $request->get('nama_ayah');
      $data->status_ayah = $request->get('status_ayah');
      $data->penghasilan_ayah = $request->get('penghasilan_ayah');
      $data->pekerjaan_ayah = $request->get('pekerjaan_ayah');
      $data->nama_ibu = $request->get('nama_ibu');
      $data->status_ibu = $request->get('status_ibu');
      $data->penghasilan_ibu = $request->get('penghasilan_ibu');
      $data->pekerjaan_ibu = $request->get('pekerjaan_ibu');
      $data->pbb = $request->get('pbb');
      $data->rekening_listrik = $request->get('rekening_listrik');
      $data->sktm = $request->get('sktm');
      $data->status_beasiswa = $request->get('status_beasiswa');
      $data->save();
        return redirect('mknn/datatraining')->with('toast_success', 'Data Berhasil Disimpan!');


    }
    public function delete($id)
      {
      $data= \App\training::find($id);
      $data->delete();
      return redirect('/mknn/datatraining')->with('toast_error', 'Data Berhasil Dihapus!');
      }

    public function edit($id)
      {
          $data= \App\training::find($id);
      return view('mknn/edittraining', compact('data'))->with('info', 'Silahkan Edit Data');
      }
      public function update(Request $request, $id)
        {
          $data= \App\training::find($id);
          $data->update($request->all());
          return redirect('mknn/datatraining')->with('toast_success', 'Data Berhasil Diupdate!');
        }


    public function importfile(Request $request){
      if ($request->input('submit') != null ){

      $file = $request->file('file');

      // File Details
      $filename = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      $tempPath = $file->getRealPath();
      $fileSize = $file->getSize();
      $mimeType = $file->getMimeType();

      // Valid File Extensions
      $valid_extension = array("csv");

      // 2MB in Bytes
      $maxFileSize = 3097152;

      // Check file extension
      if(in_array(strtolower($extension),$valid_extension)){

        // Check file size
        if($fileSize <= $maxFileSize){

          // File upload location
          $location = 'uploads';

          // Upload file
          $file->move($location,$filename);

          // Import CSV to Database
          $filepath = public_path($location."/".$filename);

          // Reading file
          $file = fopen($filepath,"r");

          $importData_arr = array();
          $i = 0;


          while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
             $num = count($filedata );

             // Skip first row (Remove below comment if you want to skip the first row)
             /*if($i == 0){
                $i++0
                contiue;
             }*/
             for ($c=0; $c<$num; $c++) {
                $importData_arr[$i][] = $filedata [$c];
             }
             $i++;
          }
          fclose($file);

          // Insert to MySQL database
          foreach($importData_arr as $row){

            $insertData = array(
            "nim"=>isset($row[0])? $row[0]: '',
            "nama"=>isset($row[1])? $row[1]: '',
            "fakultas"=>isset($row[2])? $row[2]: '',
            "jurusan"=>isset($row[3])? $row[3]: '',
            "semester"=>isset($row[4])? $row[4]: '',
            "jml_saudara"=>isset($row[5])? $row[5]: '',
            "rerata_rapor"=>isset($row[6])? $row[6]: '',
            "rerata_un"=>isset($row[7])? $row[7]: '',
            "nama_ayah"=>isset($row[8])? $row[8]: '',
            "status_ayah"=>isset($row[9])? $row[9]: '',
            "pekerjaan_ayah"=>isset($row[10])? $row[10]: '',
            "penghasilan_ayah"=>isset($row[11])? $row[11]: '',
            "nama_ibu"=>isset($row[12])? $row[12]: '',
            "status_ibu"=>isset($row[13])? $row[13]: '',
            "pekerjaan_ibu"=>isset($row[14])? $row[14]: '',
            "penghasilan_ibu"=>isset($row[15])? $row[15]: '',
            "pbb"=>isset($row[16])? $row[16]: '',
            "rekening_listrik"=>isset($row[17])? $row[17]: '',
            "sktm"=>isset($row[18])? $row[18]: '',
            "status_beasiswa"=>isset($row[19])? $row[19]: '');

        training::insertData($insertData);

          }

                Session::flash('message','Import Successful.');
              }else{
                Session::flash('message','File too large. File must be less than 2MB.');
              }

            }else{
               Session::flash('message','Invalid File Extension.');
            }

          }

          // Redirect to index
          return redirect()->action('mknn/datatraining');
        }


    public function ImportExcel(Request $request)
    {
      $validator=Validator::make($request->all(),[
        'file'=>'required|max:5000|mimes:xlsx,xls,csv'
      ]);
      $dateTime=date('Yms_His');
      $file= $request->file('file');
      $fileName= $dateTime . '-' . $file->getClientOriginalName();
      $savePath = public_path('/uploads/');
      $file->move($savePath, $fileName);
      $collection - $excel->getCollection();

      if (sizeof($collection[1]==[5])){

      }else{
        return redirect()->back()->with(['errors'=>[0=>'Please Provide Data in File According']]);
      }

      if ($validator->passes()){
          return redirect()->back()->with(['success'=>'file berhasil di import']);
      }else{
        return redirect()->back()->with(['errors'=>$validator->errors()->all()]);
      }
    }

    public function normalisasi_data()
    {

        $rows=DB::table('training')->select('jml_saudara','rerata_un','rerata_rapor','status_ayah','status_ibu',  'penghasilan_ayah',  'penghasilan_ibu','sktm','pbb','rekening_listrik','status_beasiswa')
        ->orderBy('training.rerata_un','desc')
        ->get();

        $arr = array();
        foreach($rows as $key => $val){
          foreach($val as $k => $v){
            $arr[$k][$key] = $v;
          }
        }
        $minmax = array();
        foreach($arr as $key => $val){
          $minmax[$key]['max'] = max($val);
          $minmax[$key]['min'] = min($val);
        }
        foreach($rows as $key => $val){
          foreach($val as $k => $v){
            $min = $minmax[$k]['min'];
            $max = $minmax[$k]['max'];
            $normal_dt[$key][$k] = ($v - $min) / ($max - $min);
          }
        }
  return view('mknn/normalisasidata', compact('normal_dt'));

}
}
