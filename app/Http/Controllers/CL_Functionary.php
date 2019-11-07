<?php

namespace App\Http\Controllers;

use App\Functionary;
use Illuminate\Http\Request;

class CL_Functionary extends Controller {

    private $functionary;

    public function __construct() {
        $this->functionary = new Functionary();
    }
    
    public function getFunc($id) {
        $result = $this->functionary->getFunc($id);

        return $result;
    }

    public function list(Request $request) {
        $result = $this->functionary->search();

        return view('functionary.list', ['list' => $result, 'user' => $request->session()->get('data')[0]]);
    }
    
    public function search(Request $request) {
        if ($request->isMethod('post')) {
            $result = isset($request->name) ? $this->functionary->search($request->name) : $this->functionary->getFunc($request->code);
            
            return view('functionary.list', ['list' => $result, 'user' => $request->session()->get('data')[0]]);
        } else {
            return redirect('functionary/list');
        }
    }

    public function del($id) {
        $this->functionary->del($id);

        return redirect('functionary/list');
    }

    public function change(Request $request, $id) {
        if ($request->isMethod('post')) {
            $this->functionary->change($request, $id);
            
            return redirect('functionary/list');
        } else {
            $result = $this->getFunc($id);

            return view('functionary.change', ['item' => $result, 'user' => $request->session()->get('data')[0]]);  
        }
    }

}
