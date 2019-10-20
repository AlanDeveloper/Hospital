<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class CL_Patient extends Controller {

    private $patient;

    public function __construct() {
        $this->patient = new Patient();
    }

    public function getPati($id)
    {
        $result = $this->patient->getPati($id);

        return $result;
    }

    public function register(Request $request) {

        if ($request->isMethod('post')) {
            $this->patient->register($request);
            
            return redirect('patient/list');
        } else {
            return view('patient.create', ['user' => $request->session()->get('data')[0]] );  
        }
    }

    public function list(Request $request) {
        $result = $this->patient->search();
        return view('patient.list', ['list' => $result, 'user' => $request->session()->get('data')[0]]);
    }

    public function search(Request $request) {
        if($request->isMethod('post')) {
            $result = $this->patient->search($request->name);
            return view('patient.list', ['list' => $result, 'user' => $request->session()->get('data')[0]]);
        } else {
            return redirect('patient/list');
        }
    }

    public function del($id)
    {
        $this->patient->del($id);

        return redirect('patient/list');
    }

    public function change(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $this->patient->change($request, $id);

            return redirect('patient/list');
        } else {
            $result = $this->getPati($id);

            return view('patient.change', ['item' => $result, 'user' => $request->session()->get('data')[0]]);
        }
    }

}
