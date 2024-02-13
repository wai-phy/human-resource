<?php

namespace App\Repository;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use App\Http\Requests\StorePermission;
use App\Http\Requests\UpdatePermission;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class PermissionRepository
{
    public function modal()
    {
        return Permission::query();
    }

    public function ssd()
    {
        $permissions = Permission::query();

        return DataTables::of($permissions)
            ->addColumn('plus-icon', function ($each) {
                return null;
            })
            ->addColumn('action', function ($each) {
                // $edit_icon = '';
                // $delete_icon = '';

                // if (auth()->user()->can('edit_permission')) {
                    $edit_icon = '<a href="' . route('permission.edit', $each->id) . '" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a>';     
                // }
                // if (auth()->user()->can('delete_permission')) {
                    $delete_icon = '<a href="#" data-id="'.$each->id.'" class="text-danger delete-btn"><i class="fa-solid fa-trash"></i></a>';                  
                // }
                return '<div class="action-icon">' . $edit_icon  .$delete_icon. '</div>';
            })
            ->editColumn('updated_at', function ($each) {
                return Carbon::parse($each->updated_at)->format('Y-m-d H:i:s');
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function storeData(StorePermission $request)
    {
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->save();
        return $permission;
    }

    public function editPage($id)
    {

        $permission = Permission::findOrFail($id);
        return $permission;
    }

    public function updateData($id, UpdatePermission $request)
    {
        $permission = Permission::findOrFail($id);
        $permission->name = $request->name;
        $permission->update();

        return $permission;
    }

}
