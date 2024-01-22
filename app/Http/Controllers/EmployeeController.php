<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployee;
use App\Repository\DataRepo;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = DataRepo::employee();
    }
    public function index(){
        return view('employee.index');
    }

    public function ssd(){
        $data = $this->repo->ssd();
        return $data;
    }

    public function create(){
       $departments = $this->repo->createPage();
        return view('employee.create',compact('departments'));
    }

    
    public function store(StoreEmployee $request){
        $this->repo->storeData($request);
        return redirect()->route('employee.index')->with('create','Employee is successfully created');
    }
    
}
