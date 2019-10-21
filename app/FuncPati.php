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
        return DB::table('functionary_patient')->insert(
            ['patient_id' => $pati_id, 'functionary_id' => $func_id]
        );
    }

    public function search($id = null)
    {
        if($id != null) {
            return DB::table('functionary_patient')->where('functionary_id', '=', $id)->get();
        } else {
            return DB::table('functionary_patient')->get();
        }
    }
}
