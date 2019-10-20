<?php

namespace App\Http\Controllers;

use App\User;
use App\Patient;
use App\Functionary;
use App\FuncPati;
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
        $this->fp = new FuncPati();
    }

    public function index(Request $request) {
        return view('template.home', ['user' => $request->session()->get('data')[0]]);
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

    public function binds(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            if($request->m === $request->e) {
                $this->fp->register($id, $request->m);
            } else if($request->m != -1 && $request->e != -1) {
                $this->fp->register($id, $request->m);
                $this->fp->register($id, $request->e);
            } else {
                if($request->m != -1) {
                    $this->fp->register($id, $request->m);
                } else {
                    $this->fp->register($id, $request->e);
                }
            }

            return redirect('patient/list');
        } else {
            $result = $this->patient->getPati($id);
            $result2 = $this->functionary->search();
            return view('template.binds', ['list' => $result, 'list2' => $result2, 'user' => $request->session()->get('data')[0]]);
        }
    }

}
