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

        $u = array();
        $u = (object) $u;
        $u->name = 'admin';
        $u->password = 'admin';

        if(!$this->user->login($u)) {
            $u->admin = 1;
            $this->user->register($u);
        }
    }

    public function index(Request $request) {
        $user = $request->session()->get('data')[0];

        return view('template.home', ['user' => $user]);
    }

    public function register(Request $request)
    {
        $this->user->register($request);

    }

    public function login(Request $request) {
        if ($request->isMethod('post')) {
            $u = $this->user->login($request);

            if($u) {
                $request->session()->put('data', [$u]);

                return redirect('/');
            } else {
                $error = 'Dados incorretos';
                
                return view('template.login', ['error' => $error]);
            }
        } else {
            return view('template.login');
        }  
    }

    public function loginMedic(Request $request) {
        $u = $this->user->searchMedic();

        if($u) {
            $request->session()->put('data', [$u]);
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
            $vet = $this->funct($this->functionary->search(), $this->fp->search());
            return view('template.binds', ['list' => $result, 'list2' => $vet, 'user' => $request->session()->get('data')[0]]);
        }
    }

    public function funct($list1, $list2) {
        $vet = [];

        foreach($list1 as $item1) {
            $add = null;
            $cont = 0;
            foreach($list2 as $item2) {

                if($item1->id == $item2->functionary_id) {
                    $cont++;
                }
                $add = $item1;
            }
            if (count($list2) === 0) {
                array_push($vet, $item1);
                echo 'oi';
            } else if($cont < 2) {
                array_push($vet, $add);
            }
        }

        return $vet;
    }

}
