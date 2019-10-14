<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class CL_Patient extends Controller {

    private $patient;

    public function __construct() {
        $this->patient = new Patient();
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

}
