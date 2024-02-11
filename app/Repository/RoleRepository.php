<?php

namespace App\Repository;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use App\Http\Requests\StoreRole;
use App\Http\Requests\UpdateRole;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleRepository
{
    public function modal()
    {
        return Role::query();
    }

    public function ssd()
    {
        $roles = Role::query();

        return DataTables::of($roles)
            ->addColumn('plus-icon', function ($each) {
                return null;
            })
            ->addColumn('action', function ($each) {
                $edit_icon = '<a href="' . route('role.edit', $each->id) . '" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a>';
                $delete_icon = '<a href="#" data-id="'.$each->id.'" class="text-danger delete-btn"><i class="fa-solid fa-trash"></i></a>';
                return '<div class="action-icon">' . $edit_icon  .$delete_icon. '</div>';
            })
            ->editColumn('updated_at', function ($each) {
                return Carbon::parse($each->updated_at)->format('Y-m-d H:i:s');
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function storeData(StoreRole $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        return $role;
    }

    public function editPage($id)
    {

        $role = Role::findOrFail($id);
        return $role;
    }

    public function updateData($id, UpdateRole $request)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->update();

        return $role;
    }

}
