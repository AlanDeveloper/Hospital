<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $table = 'patient';

    protected $fillable = [
        'name',
        'address',
        'telephone',
        'date',
        'entry',
        'observation'
    ];

    public function register($res)
    {
        return $this->create($res->all());
    }

    public function search()
    {
        return DB::table('patient')->orderBy('name', 'asc')->get();
    }

    public function del($id)
    {
        DB::table('patient')->where('id', '=', $id)->delete();
    }

    public function change($res, $id)
    {
        DB::table('patient')->where('id', '=', $id)->update(
            [
                'name' => $res->name,
                'matriculation' => $res->matriculation,
                'salary' => $res->salary,
                'office' => $res->office,
                'bonification' => $res->bonification
            ]
        );
    }
}
