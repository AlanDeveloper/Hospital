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
            $func = $this->func->register($request);
            
            return redirect('functionary/list');
        } else {
            return view('functionary.create', ['user' => $request->session()->get('data')[0]]);  
        }
    }

    public function salary($id) {
        $request = $this->func->getFunc($id);
        
        $salary = $request[0]->salary;
        $inss = $salary*0.11;
        $irrf =  $salary*0.16;
        $liquidsalary  = $salary - $salary*0.11 -  $salary*0.16 + 200;
        if($request[0]->office == "Gerente" && $request[0]->bonification == "1" ){
            $liquidsalary =  $liquidsalary*0.15 + $liquidsalary ;
        }

        if($request[0]->office == "Diretor" && $request[0]->bonification == "1" ){
            $liquidsalary =  $liquidsalary*0.10 +  $liquidsalary ;
        }

        if($request[0]->office == "Engenheiro" && $request[0]->bonification == "1" ){
            $liquidsalary =  $liquidsalary*0.20 + $liquidsalary ;
        }
        return view('functionary.salary', [
            'liquidsalary' => $liquidsalary,
            'salary' => $salary,
            'inss' => $inss,
            'irrf' => $irrf, 'user' => $request->session()->get('data')[0]
        ]); 
    }

    public function list(Request $request) {
        $result = $this->func->search();
        return view('functionary.list', ['list' => $result, 'user' => $request->session()->get('data')[0]]);
    }
    
    public function search(Request $request) {
        $condition = [
            'text' => $request->inputSearch,
            'office' => $request->officeSearch,
            'order' => $request->orderSearch
        ];
        $result = $this->func->search($condition);
        return view('functionary.list', ['list' => $result, 'user' => $request->session()->get('data')[0]]);
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
