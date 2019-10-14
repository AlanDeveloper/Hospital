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

    public function search($array = Null) {
        if($array != Null) {
            if($array['office'] != - 1 && isset($array['text']) && $array['order'] != 'alf') {
                return DB::table('functionary')->where([
                    is_numeric($array['text']) ? ['matriculation', '=', $array['text']] : ['name', 'like', '%'.$array['text'].'%'],
                    ['office', '=', $array['office']]
                ])->orderBy('salary', $array['order'])->get();
            } else if($array['office'] != - 1 && isset($array['text']) && $array['order'] == 'alf') {
                return DB::table('functionary')->where([
                    is_numeric($array['text']) ? ['matriculation', '=', $array['text']] : ['name', 'like', '%'.$array['text'].'%'],
                    ['office', '=', $array['office']]
                ])->orderBy('name', 'asc')->get();
            } else if($array['office'] != - 1 && $array['order'] != 'alf') {
                return DB::table('functionary')->where([
                    ['office', '=', $array['office']]
                ])->orderBy('salary', $array['order'])->get();
            } else if($array['office'] != - 1 && $array['order'] == 'alf') {
                return DB::table('functionary')->where([
                    ['office', '=', $array['office']]
                ])->orderBy('name', 'asc')->get();
            } else if(isset($array['text']) && $array['order'] != 'alf') {
                return DB::table('functionary')->where([
                    is_numeric($array['text']) ? ['matriculation', '=', $array['text']] : ['name', 'like', '%'.$array['text'].'%'],
                ])->orderBy('salary', $array['order'])->get();
            } else if(isset($array['text']) && $array['order'] == 'alf') {
                return DB::table('functionary')->where([
                    is_numeric($array['text']) ? ['matriculation', '=', $array['text']] : ['name', 'like', '%'.$array['text'].'%'],
                ])->orderBy('name', 'asc')->get();
            } else {
                return DB::table('functionary')->orderBy('name', 'asc')->get();
            }
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
                'matriculation' => $res->matriculation,
                'salary' => $res->salary,
                'office' => $res->office,
                'bonification' => $res->bonification
            ]);
    }
}
