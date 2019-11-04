<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = 'user';

    protected $fillable = [
        'admin',
        'name',
        'password'
    ];

    public function register($res)
    {
        $admin = isset($res->admin) ? $res->admin : 0;

        DB::table('user')->insert(
            [
                'admin' => $admin,
                'name' => $res->name,
                'password' => md5($res->password)
            ]
        );
    }

    public function search()
    {
        return DB::table('user')->where([['name', 'admin'], ['password', 'admin']])->first();
    }

    public function searchMedic()
    {
        return DB::table('user')->where([['name', 'alan'], ['password', 'alan']])->first();
    }

    public function login($res) {
        return DB::table('user')->where([
                ['name', '=',  $res->name], 
                ['password', '=', md5($res->password)]
        ])->first();
    }

}
