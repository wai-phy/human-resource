<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartment;
use App\Models\Department;
use App\Repository\DataRepo;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateDepartment;

class DepartmentController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = DataRepo::department();
    }
    public function index()
    {
        return view('department.index');
    }

    public function ssd()
    {
        $data = $this->repo->ssd();
        return $data;
    }

    public function create()
    {
        return view('department.create');
    }


    public function store(StoreDepartment $request)
    {
        $this->repo->storeData($request);
        return redirect()->route('department.index')->with('create', 'Department is successfully created');
    }

    public function edit($id)
    {
        $department = $this->repo->editPage($id);
        return view('department.edit', compact('department'));
    }

    public function update($id, UpdateDepartment $request)
    {
        $this->repo->updateData($id, $request);
        return redirect()->route('department.index')->with('update', 'Department is successfully updated');
    }

    public function destroy($id){
        $department = Department::findOrFail($id);
        $department->delete();

        return 'success';
    }
}
