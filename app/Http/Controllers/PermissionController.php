<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermission;
use App\Repository\DataRepo;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePermission;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = DataRepo::permission();
    }
    public function index()
    {
        return view('permission.index');
    }

    public function ssd()
    {
        $data = $this->repo->ssd();
        return $data;
    }

    public function create()
    {
        return view('permission.create');
    }


    public function store(StorePermission $request)
    {
        $this->repo->storeData($request);
        return redirect()->route('permission.index')->with('create', 'Permission is successfully created');
    }

    public function edit($id)
    {
        $permission = $this->repo->editPage($id);
        return view('permission.edit', compact('permission'));
    }

    public function update($id, UpdatePermission $request)
    {
        $this->repo->updateData($id, $request);
        return redirect()->route('permission.index')->with('update', 'Department is successfully updated');
    }

    public function destroy($id){
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return 'success';
    }
}
