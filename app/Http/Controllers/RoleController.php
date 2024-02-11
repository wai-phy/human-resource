<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRole;
use App\Repository\DataRepo;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateRole;
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
        return view('role.create');
    }


    public function store(StoreRole $request)
    {
        $this->repo->storeData($request);
        return redirect()->route('role.index')->with('create', 'Role is successfully created');
    }

    public function edit($id)
    {
        $role = $this->repo->editPage($id);
        return view('role.edit', compact('role'));
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
