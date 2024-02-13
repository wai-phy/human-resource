<?php

namespace App\Repository;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Department;
use GuzzleHttp\Psr7\Request;
use App\Http\Requests\StoreEmployee;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateEmployee;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class EmployeeRepository
{
    public function modal()
    {
        return User::query();
    }

    public function ssd()
    {
        $employees = User::with('department');

        return DataTables::of($employees)
            ->filterColumn('department_name',function($query, $keyword){
                $query->whereHas('department',function($q1) use ($keyword){
                    $q1->where('title','like','%'.$keyword.'%');
                });
            })
            ->editColumn('profile_img', function ($each) {
                return '<img class="profile-thumbnail" src="'.$each->profile_img_path().'"/><p class="mb-1">'.$each->name.'</p>';
            })
            ->addColumn('department_name', function ($each) {
                return $each->department ? $each->department->title : '-';
            })
            ->editColumn('is_present', function ($each) {
                if ($each->is_present == 1) {
                    return '<span class="badge badge-pill badge-success ">Present</span>';
                } else {
                    return '<span class="badge badge-pill badge-danger">Leave</span>';
                }
            })
            ->editColumn('updated_at', function ($each) {
                return Carbon::parse($each->updated_at)->format('Y-m-d H:i:s');
            })
            ->addColumn('plus-icon', function ($each) {
                return null;
            })
            ->addColumn('role', function($each){
                $output = '';
                foreach($each->roles as $role){
                    $output .= '<span class="badge badge-primary m-1 badge-pill">'.$role->name.'</span>';
                }
                return $output;
            })
            ->addColumn('action', function ($each) {

                // $edit_icon = '';
                // $info_icon = '';
                // $delete_icon = '';

                // if (auth()->user()->can('edit_employee')) {
                    $edit_icon = '<a href="' . route('employee.edit', $each->id) . '" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a>';
                // }
                // if (auth()->user()->can('view_employee')) {
                    $info_icon = '<a href="' . route('employee.show', $each->id) . '" class="text-primary"><i class="fa-solid fa-circle-info"></i></a>';                   
                // }

                // if (auth()->user()->can('delete_employee')) {
                    $delete_icon = '<a href="#" data-id="'.$each->id.'" class="text-danger delete-btn"><i class="fa-solid fa-trash"></i></a>';                   
                // }
                return '<div class="action-icon">' . $edit_icon . $info_icon .$delete_icon. '</div>';
            })
            ->rawColumns(['role','profile_img','is_present', 'action'])
            ->make(true);
    }

    public function createPage()
    {
        $departments = Department::orderBy('title')->get();
        return $departments;
    }

    public function storeData(StoreEmployee $request)
    {
        $profile_img_name = null;
        if ($request->hasFile('profile_img')) {
            $profile_img_file = $request->file('profile_img');
            $profile_img_name = uniqid() . '_' . time() . '.' . $profile_img_file->getClientOriginalExtension();

            Storage::disk('public')->put('employee/' . $profile_img_name, file_get_contents($profile_img_file));
        }
        $employee = new User();
        $employee->employee_id = $request->employee_id;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->gender = $request->gender;
        $employee->birthday = $request->birthday;
        $employee->nrc_number = $request->nrc_number;
        $employee->address = $request->address;
        $employee->department_id = $request->department_id;
        $employee->date_of_join = $request->date_of_join;
        $employee->is_present = $request->is_present;
        $employee->profile_img = $profile_img_name;
        $employee->password =  Hash::make($request->password);
        $employee->save();
        $employee->syncRoles($request->roles);

        return $employee;
    }

    public function editPage($id)
    {

        $employee = User::findOrFail($id);
        return $employee;
    }

    public function updateData($id, UpdateEmployee $request)
    {
        $employee = User::findOrFail($id);

        $profile_img_name = $employee->profile_img;
        if ($request->hasFile('profile_img')) {

            Storage::disk('public')->delete('employee/' . $employee->profile_img);

            $profile_img_file = $request->file('profile_img');
            $profile_img_name = uniqid() . '_' . time() . '.' . $profile_img_file->getClientOriginalExtension();

            Storage::disk('public')->put('employee/' . $profile_img_name, file_get_contents($profile_img_file));
        }

        $employee->employee_id = $request->employee_id;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->gender = $request->gender;
        $employee->birthday = $request->birthday;
        $employee->nrc_number = $request->nrc_number;
        $employee->address = $request->address;
        $employee->department_id = $request->department_id;
        $employee->date_of_join = $request->date_of_join;
        $employee->is_present = $request->is_present;
        $employee->profile_img = $profile_img_name;
        $employee->password = $request->password ? Hash::make($request->password) : $employee->password;
        $employee->update();
        $employee->syncRoles($request->roles);

        return $employee;
    }

}
