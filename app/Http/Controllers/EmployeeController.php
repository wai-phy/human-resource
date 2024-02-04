<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use App\Repository\DataRepo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployee;
use App\Http\Requests\UpdateEmployee;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = DataRepo::employee();
    }
    public function index()
    {
        return view('employee.index');
    }

    public function ssd()
    {
        $data = $this->repo->ssd();
        return $data;
    }

    public function create()
    {
        $departments = $this->repo->createPage();
        return view('employee.create', compact('departments'));
    }


    public function store(StoreEmployee $request)
    {
        $this->repo->storeData($request);
        return redirect()->route('employee.index')->with('create', 'Employee is successfully created');
    }

    public function edit($id)
    {
        $departments = Department::orderBy('title')->get();
        $employee = $this->repo->editPage($id);
        return view('employee.edit', compact('employee', 'departments'));
    }

    public function update($id, UpdateEmployee $request)
    {
        $this->repo->updateData($id, $request);
        return redirect()->route('employee.index')->with('update', 'Employee is successfully updated');
    }

    public function show($id)
    {
        $employee = User::findOrFail($id);
        return view('employee.show', compact('employee'));
    }

    public function destroy($id){
        $employee = User::findOrFail($id);
        $employee->delete();

        return 'success';
    }
}
