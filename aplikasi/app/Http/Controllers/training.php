<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class training extends Model
{
     public $timestamps = false;
  protected $table='training';
  protected $fillable = ['nim','nama','jurusan','fakultas','semester','jml_saudra',
  'rerata_rapor','rerata_un','nama_ayah','status_ayah','pekerjaan_ayah','penghasilan_ibu',
  'nama_ibu','status_ibu','pekerjaan_ibu','penghasilan_ibu','pbb','rekening_listrik','sktm','status_beasiswa'];
  
  public static function insertData($data){

     $value=DB::table('training')->where('id', $data['nim'])->get();
     if($value->count() == 0){
        DB::table('training')->insert($data);
     }
  }

}
