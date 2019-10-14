<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = 'user';

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public function search()
    {
        return DB::table('user')->where([['name', 'admin'], ['password', 'admin']])->first();
    }

}
