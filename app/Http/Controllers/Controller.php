<?php

namespace App\Http\Controllers;

use App\User;
use App\Patient;
use App\Functionary;
use App\FuncPati;
use App\FuncUser;
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
        $this->fu = new FuncUser();

        if(!$this->user->searchAdmin()) {
            $this->user->registerAdmin();
        }
    }

    public function index(Request $request) {
        $user = $request->session()->get('data')[0];
        $patis = [];

        if(isset($user->admin)) {
            if(!$user->admin) {
                $func = $this->fu->search(null, $user->id);
                $func = $this->fp->search(null, $func->functionary_id);
    
                for ($i=0; $i < count($func); $i++) { 
                    array_push($patis, $this->patient->getPati($func[$i]->patient_id));
                }
            }
        }
        
        return view('template.home', ['user' => $user, 'list' => $patis]);
    }

    public function register(Request $request) {
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
    
    public function exit(Request $request) {
        $request->session()->forget('data');

        return redirect('/');
    }

    public function binds(Request $request, $id) {
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
            $list1 = []; $list2 = [];
            $funcs = $this->functionary->search();
            $pati = $this->patient->getPati($id);
            $cont = 0;
            
            for ($i=0; $i < count($funcs); $i++) {
                $u = $this->fp->search($id, $funcs[$i]->id);
                
                if(!$u) {
                    $i % 2 === 0 ? 
                        array_push($list1, $funcs[$i]) : array_push($list2, $funcs[$i]);
                } else { $cont++; }
            }
            if(count($list1) < count($list2)) { 
                $aux = $list1;
                $list1 = $list2;
                $list2 = $aux;
            }
            
            return view('template.binds', ['vet' => $pati, 'list1' => $list1, 'list2' => $list2, 'cont' => $cont, 'user' => $request->session()->get('data')[0]]);
        }
    }

    public function bond(Request $request, $id) {
        $pati = $this->fp->search($id);
        $funcs = [];
        for ($i=0; $i < count($pati); $i++) { 
            array_push($funcs, $this->functionary->getFunc($pati[$i]->functionary_id));
        }
        
        return view('patient.bond', ['list' => $funcs, 'user' => $request->session()->get('data')[0]]);  
    }

    public function register_user_functionary(Request $request) {

        if ($request->isMethod('post')) {
            $func_id = $this->functionary->register($request);
            $user_id = $this->user->register($request);

            $this->fu->register($user_id, $func_id);

            if(isset($request->session()->get('data')[0])) {
                if($request->session()->get('data')[0]->admin) {
                    return redirect('functionary/list');
                } else {
                    return redirect('/');
                }
            } else {
                return redirect('/');
            }
        } else {
            return view('functionary.create', ['user' => $request->session()->get('data')[0]]);  
        }
    }

    public function del(Request $request, $id) {
        $this->fp->del($id, $request->session()->get('data')[0]->id);
        
        return redirect('/');
    }

}
