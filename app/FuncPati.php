<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class FuncPati extends Model
{
    protected $table = 'functionary_patient';

    protected $fillable = [
        'patient_id',
        'functionary_id'
    ];
    
    public function register($pati_id, $func_id)
    {
        DB::table('functionary_patient')->insert(
            ['patient_id' => $pati_id, 'functionary_id' => $func_id]
        );
    }

    public function search($pati_id = null, $func_id = null) {
        if($func_id != null && $pati_id != null) {
            return DB::table('functionary_patient')->where([
                ['functionary_id', '=', $func_id],
                ['patient_id', '=', $pati_id]]
            )->first();
        } else if($pati_id != null) {
             return DB::table('functionary_patient')->where('patient_id', '=', $pati_id)->get();
        } else if($func_id != null) {
             return DB::table('functionary_patient')->where('functionary_id', '=', $func_id)->get();
        } else {
            return DB::table('functionary_patient')->get();
        }
    }

    public function del($func_id, $pati_id) {
        DB::table('functionary_patient')->where(
            [
                ['functionary_id', '=', $func_id],
                ['patient_id', '=', $pati_id]
            ]
        )->delete();
    }
}
