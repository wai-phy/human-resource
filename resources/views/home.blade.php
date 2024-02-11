@extends('layouts.app')
@section('title', 'Ninja HR')
@section('content')
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <img class="profile_img" src="{{ $employee->profile_img_path() }}" alt="">
                        <div class="py-2 px-2">
                            <h4>{{ $employee->name }}</h4>
                            <p class="text-muted mb-2">{{ $employee->employee_id }}</p>
                            <p class="text-muted mb-2"><span class="badge badge-pill badge-dark">{{ $employee->department ? $employee->department->title : '-' }}</span></p>
                        </div>
                    </div>
                </div>

            </div>
           
        </div>
    </div>
@endsection
