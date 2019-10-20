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

    public function getPati($id)
    {
        return DB::table('patient')->where('id', '=', $id)->get();
    }

    public function register($res)
    {
        return $this->create($res->all());
    }

    public function search($cond = null)
    {
        if($cond) {
            return DB::table('patient')->where([['name', 'like', '%' . $cond . '%']])->orderBy('name', 'asc')->get();
        } else {
            return DB::table('patient')->orderBy('name', 'asc')->get();
        }
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
                'address' => $res->address,
                'telephone' => $res->telephone,
                'date' => $res->date,
                'observation' => $res->observation
            ]
        );
    }
}
