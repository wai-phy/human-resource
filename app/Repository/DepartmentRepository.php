<?php

namespace App\Repository;

use Carbon\Carbon;
use App\Models\Department;
use GuzzleHttp\Psr7\Request;
use App\Http\Requests\StoreDepartment;
use App\Http\Requests\UpdateDepartment;
use Yajra\DataTables\Facades\DataTables;

class DepartmentRepository
{
    public function modal()
    {
        return Department::query();
    }

    public function ssd()
    {
        $departments = Department::query();

        return DataTables::of($departments)
            ->addColumn('plus-icon', function ($each) {
                return null;
            })
            ->addColumn('action', function ($each) {
                
                // $edit_icon = '';
                // $delete_icon = '';

                // if (auth()->user()->can('edit_department')) {
                    $edit_icon = '<a href="' . route('department.edit', $each->id) . '" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a>';
                // }

                // if (auth()->user()->can('delete_department')) {
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

    public function storeData(StoreDepartment $request)
    {
        $department = new Department();
        $department->title = $request->title;
        $department->save();
        return $department;
    }

    public function editPage($id)
    {

        $department = Department::findOrFail($id);
        return $department;
    }

    public function updateData($id, UpdateDepartment $request)
    {
        $department = Department::findOrFail($id);
        $department->title = $request->title;
        $department->update();

        return $department;
    }

}
