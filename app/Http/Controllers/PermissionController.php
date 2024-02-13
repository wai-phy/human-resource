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
        // if (!auth()->user()->can('view_permission')) {
        //     abort(403, 'Unauthorized Action');
        // }
        return view('permission.index');
    }

    public function ssd()
    {
        // if (!auth()->user()->can('view_permission')) {
        //     abort(403, 'Unauthorized Action');
        // }

        $data = $this->repo->ssd();
        return $data;
    }

    public function create()
    {
        // if (!auth()->user()->can('create_permission')) {
        //     abort(403, 'Unauthorized Action');
        // }

        return view('permission.create');
    }


    public function store(StorePermission $request)
    {
        // if (!auth()->user()->can('create_permission')) {
        //     abort(403, 'Unauthorized Action');
        // }

        $this->repo->storeData($request);
        return redirect()->route('permission.index')->with('create', 'Permission is successfully created');
    }

    public function edit($id)
    {
        // if (!auth()->user()->can('edit_permission')) {
        //     abort(403, 'Unauthorized Action');
        // }

        $permission = $this->repo->editPage($id);
        return view('permission.edit', compact('permission'));
    }

    public function update($id, UpdatePermission $request)
    {
        // if (!auth()->user()->can('edit_permission')) {
        //     abort(403, 'Unauthorized Action');
        // }

        $this->repo->updateData($id, $request);
        return redirect()->route('permission.index')->with('update', 'Department is successfully updated');
    }

    public function destroy($id)
    {
        // if(!auth()->user()->can('delete_permission')){
        //     abort(403,'Unauthorized Action');
        // }

        $permission = Permission::findOrFail($id);
        $permission->delete();

        return 'success';
    }
}
