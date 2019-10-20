<?php

namespace App\Http\Controllers;

use App\Functionary;
use Illuminate\Http\Request;

class CL_Functionary extends Controller {

    private $func;

    public function __construct() {
        $this->func = new Functionary();
    }
    
    public function getFunc($id) {
        $result = $this->func->getFunc($id);

        return $result;
    }

    public function register(Request $request) {

        if ($request->isMethod('post')) {
            $this->func->register($request);
            
            return redirect('functionary/list');
        } else {
            return view('functionary.create', ['user' => $request->session()->get('data')[0]]);  
        }
    }

    public function list(Request $request) {
        $result = $this->func->search();
        return view('functionary.list', ['list' => $result, 'user' => $request->session()->get('data')[0]]);
    }
    
    public function search(Request $request) {
        if ($request->isMethod('post')) {
            $result = $this->func->search($request->name);
            return view('functionary.list', ['list' => $result, 'user' => $request->session()->get('data')[0]]);
        } else {
            return redirect('functionary/list');
        }
    }

    public function del($id) {
        $this->func->del($id);

        return redirect('functionary/list');
    }

    public function change(Request $request, $id) {
        if ($request->isMethod('post')) {
            $this->func->change($request, $id);
            
            return redirect('functionary/list');
        } else {
            $result = $this->getFunc($id);

            return view('functionary.change', ['item' => $result, 'user' => $request->session()->get('data')[0]]);  
        }
    }

}
