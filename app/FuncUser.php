<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class FuncUser extends Model
{
    protected $table = 'functionary_user';

    protected $fillable = [
        'user_id',
        'functionary_id'
    ];
    
    public function register($user_id, $func_id)
    {
        DB::table('functionary_user')->insert(
            ['user_id' => $user_id, 'functionary_id' => $func_id]
        );
    }

    public function search($func_id = null, $user_id = null)
    {
        if($func_id != null) {
            return DB::table('functionary_user')->where('functionary_id', '=', $func_id)->first();
        } if($user_id != null) {
            return DB::table('functionary_user')->where('user_id', '=', $user_id)->first();
        } else {
            return DB::table('functionary_user')->get();
        }
    }
}
