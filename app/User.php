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
        'email',
        'password'
    ];

    public function search()
    {
        return DB::table('user')->where([['name', 'admin'], ['password', 'admin']])->first();
    }

    public function searchMedic()
    {
        return DB::table('user')->where([['name', 'alan'], ['password', 'alan']])->first();
    }

}
