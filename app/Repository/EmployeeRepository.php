<?php

namespace App\Repository;

use App\Models\User;
use App\Models\Department;
use GuzzleHttp\Psr7\Request;
use App\Http\Requests\StoreEmployee;
use Carbon\Carbon;
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
            ->editColumn('updated_at',function($each){
                return Carbon::parse($each->updated_at)->format('Y-m-d H:i:s');
            })
            ->addColumn('plus-icon', function($each){
                return null;
            })
            ->addColumn('action',function($each){
                $edit_icon = '<a href="'.route('employee.edit',$each->id).'" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a>' ;
                $info_icon = '<a href="'.route('employee.edit',$each->id).'" class="text-primary"><i class="fa-solid fa-circle-info"></i></a>' ;
                return '<div class="action-icon">'.$edit_icon.$info_icon.'</div>';
            })
            ->rawColumns(['is_present','action'])
            ->make(true);
    }

    public function createPage(){
        $departments = Department::orderBy('title')->get();
        return $departments;
    }

    public function storeData(StoreEmployee $request){
        $employee = new User();
        $employee->employee_id = $request->employee_id;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->gender = $request->gender;
        $employee->nrc_number = $request->nrc_number;
        $employee->address = $request->address;
        $employee->department_id = $request->department_id;
        $employee->date_of_join = $request->date_of_join;
        $employee->is_present = $request->is_present;
        $employee->password = $request->password;
        $employee->save();

        return $employee;
    }
}
