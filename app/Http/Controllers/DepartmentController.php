<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Repository\DataRepo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDepartment;
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
        
        // if(!auth()->user()->can('view_department')){
        //     abort(403,'Unauthorized Action');
        // }

        return view('department.index');
    }

    public function ssd()
    {
        // if(!auth()->user()->can('view_department')){
        //     abort(403,'Unauthorized Action');
        // }

        $data = $this->repo->ssd();
        return $data;
    }

    public function create()
    {
        // if(!auth()->user()->can('create_department')){
        //     abort(403,'Unauthorized Action');
        // }
        return view('department.create');
    }


    public function store(StoreDepartment $request)
    {
        // if(!auth()->user()->can('create_department')){
        //     abort(403,'Unauthorized Action');
        // }
        
        $this->repo->storeData($request);
        return redirect()->route('department.index')->with('create', 'Department is successfully created');
    }

    public function edit($id)
    {
        // if(!auth()->user()->can('edit_department')){
        //     abort(403,'Unauthorized Action');
        // }
        $department = $this->repo->editPage($id);
        return view('department.edit', compact('department'));
    }

    public function update($id, UpdateDepartment $request)
    {
        $this->repo->updateData($id, $request);
        return redirect()->route('department.index')->with('update', 'Department is successfully updated');
    }

    public function destroy($id){
        // if(!auth()->user()->can('delete_department')){
        //     abort(403,'Unauthorized Action');
        // }

        $department = Department::findOrFail($id);
        $department->delete();

        return 'success';
    }
}
