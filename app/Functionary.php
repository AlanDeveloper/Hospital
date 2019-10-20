<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Functionary extends Model {

    protected $table = 'functionary';
    
    protected $fillable = [
        'name',
        'office',
        'specialty'
    ];

    public function getFunc($id) {
        return DB::table('functionary')->where('id', '=', $id)->get();
    }

    public function register($res) {
        return $this->create($res->all());
    }

    public function search($cond = null)
    {
        if ($cond) {
            return DB::table('functionary')->where([['name', 'like', '%' . $cond . '%']])->orderBy('name', 'asc')->get();
        } else {
            return DB::table('functionary')->orderBy('name', 'asc')->get();
        }
    }

    public function del($id) {
        DB::table('functionary')->where('id', '=', $id)->delete();
    }

    public function change($res, $id) {
        DB::table('functionary')->where('id', '=', $id)->update(
            [
                'name' => $res->name,
                'specialty' => $res->specialty,
                'office' => $res->office
            ]);
    }
}
