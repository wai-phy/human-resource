<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRole;
use App\Repository\DataRepo;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateRole;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = DataRepo::role();
    }
    public function index()
    {
        return view('role.index');
    }

    public function ssd()
    {
        $data = $this->repo->ssd();
        return $data;
    }

    public function create()
    {
        
        $permissions = Permission::all();
        return view('role.create',compact('permissions'));
    }


    public function store(StoreRole $request)
    {
        $this->repo->storeData($request);
        return redirect()->route('role.index')->with('create', 'Role is successfully created');
    }

    public function edit($id)
    {
        $permissions = Permission::all();
        $role = $this->repo->editPage($id);
        $old_permissions = $role->permissions->pluck('id')->toArray();
        return view('role.edit', compact('role','permissions','old_permissions'));
    }

    public function update($id, UpdateRole $request)
    {
        $this->repo->updateData($id, $request);
        return redirect()->route('role.index')->with('update', 'Department is successfully updated');
    }

    public function destroy($id){
        $role = Role::findOrFail($id);
        $role->delete();

        return 'success';
    }
}
