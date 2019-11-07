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

    public function registerAdmin()
    {
        DB::table('user')->insert(
            [
                'admin' => 1,
                'name' => 'admin',
                'password' => md5('admin')
            ]
        );
    }

    public function register($res) {
        $admin = isset($res->admin) ? $res->admin : 0;

        return DB::table('user')->insertGetId(
            [
                'admin' => $admin,
                'name' => $res->name,
                'password' => md5($res->password)
            ]
        );
    }

    public function searchAdmin() {
        return DB::table('user')->where([['name', 'admin'], ['password', md5('admin')]])->first();
    }

    public function login($res) {
        return DB::table('user')->where([
                ['name', '=',  $res->name], 
                ['password', '=', md5($res->password)]
        ])->first();
    }

}
