<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use App\Repository\DataRepo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployee;
use App\Http\Requests\UpdateEmployee;
use Spatie\Permission\Models\Role;
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
        // if (!auth()->user()->can('view_employee')) {
        //     abort(403, 'Unauthorized Action');
        // }
        return view('employee.index');
    }

    public function ssd()
    {
        // if (!auth()->user()->can('view_employee')) {
        //     abort(403, 'Unauthorized Action');
        // }

        $data = $this->repo->ssd();
        return $data;
    }

    public function create()
    {
        // if (!auth()->user()->can('create_employee')) {
        //     abort(403, 'Unauthorized Action');
        // }

        $departments = $this->repo->createPage();
        $roles = Role::all();
        // return $roles;
        return view('employee.create', compact('departments', 'roles'));
    }


    public function store(StoreEmployee $request)
    {
        // if (!auth()->user()->can('create_employee')) {
        //     abort(403, 'Unauthorized Action');
        // }

        $this->repo->storeData($request);
        return redirect()->route('employee.index')->with('create', 'Employee is successfully created');
    }

    public function edit($id)
    {
        // if (!auth()->user()->can('edit_employee')) {
        //     abort(403, 'Unauthorized Action');
        // }

        $employee = $this->repo->editPage($id);
        $departments = Department::orderBy('title')->get();
        $roles = Role::all();
        $old_roles = $employee->roles->pluck('id')->toArray();
        return view('employee.edit', compact('employee', 'departments', 'roles', 'old_roles'));
    }

    public function update($id, UpdateEmployee $request)
    {
        $this->repo->updateData($id, $request);
        return redirect()->route('employee.index')->with('update', 'Employee is successfully updated');
    }

    public function show($id)
    {
        // if (!auth()->user()->can('view_employee')) {
        //     abort(403, 'Unauthorized Action');
        // }
        $employee = User::findOrFail($id);
        return view('employee.show', compact('employee'));
    }

    public function destroy($id)
    {
        // if (!auth()->user()->can('delete_employee')) {
        //     abort(403, 'Unauthorized Action');
        // }

        $employee = User::findOrFail($id);
        $employee->delete();

        return 'success';
    }
}
