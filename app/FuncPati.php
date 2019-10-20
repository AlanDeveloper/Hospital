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
}
