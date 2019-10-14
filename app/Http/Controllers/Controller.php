<?php

namespace App\Http\Controllers;

use App\User;
use App\Patient;
use App\Functionary;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $user;

    public function __construct()
    {
        $this->user = new User();
        $this->patient = new Patient();
        $this->functionary = new Functionary();
    }
    public function login(Request $request) {

        $u = $this->user->search();
        if($u) {
            $request->session()->put('data', [$u->name]);
            return redirect('/');
        }
    }
    
    public function exit(Request $request) {
        $request->session()->forget('data');
        return redirect('/');
    }

    public function binds(Request $request)
    {
        $result = $this->patient->search();
        return view('template.binds', ['list' => $result, 'user' => $request->session()->get('data')[0]]);
    }

}
