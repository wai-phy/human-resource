@extends('layouts.app')
@section('title', 'Detail Employee')
@section('content')
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <img class="profile_img" src="{{ $employee->profile_img_path() }}" alt="">
                        <div class="py-2 px-2">
                            <h4>{{ $employee->name }}</h4>
                            <p class="text-muted mb-1">{{ $employee->employee_id }}</p>
                            <p class="text-muted mb-1">{{ $employee->department ? $employee->department->title : '-' }}</p>
                        </div>
                    </div>
                </div>
                <div class="dash-border col-md-6">
                    <div class="px-3">
                        <p class="mb-1"><strong>Email : </strong> <span class="text-muted">{{ $employee->email }}</span>
                        </p>
                        <p class="mb-1"><strong>Phone : </strong> <span class="text-muted">{{ $employee->phone }}</span>
                        </p>
                        <p class="mb-1"><strong>Address : </strong> <span
                                class="text-muted">{{ $employee->address }}</span></p>
                        <p class="mb-1"><strong>NRC Number : </strong> <span
                                class="text-muted">{{ $employee->nrc_number }}</span></p>
                        <p class="mb-1"><strong>Gender : </strong> <span
                                class="text-muted">{{ ucfirst($employee->gender) }}</span></p>
                        <p class="mb-1"><strong>Birthday : </strong> <span
                                class="text-muted">{{ $employee->birthday }}</span></p>
                        <p class="mb-1"><strong>Date Of Join : </strong> <span
                                class="text-muted">{{ $employee->date_of_join }}</span></p>
                        <p class="mb-1"><strong>Is Present ? : </strong>
                            @if ($employee->is_present == 1)
                                <span class="badge badge-pill badge-success">Present</span>
                            @else
                                <span class="badge badge-pill badge-danger">Leave</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
@endsection
