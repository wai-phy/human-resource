@extends('layouts.app')
@section('title', 'Company Setting')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <p class="mb-1">Company Name</p>
                    <p class="text-muted mb-1">{{$setting->company_name}}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <p class="mb-1">Company Email</p>
                    <p class="text-muted mb-1">{{$setting->company_email}}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <p class="mb-1">Company Phone</p>
                    <p class="text-muted mb-1">{{$setting->company_phone}}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <p class="mb-1">Company Address</p>
                    <p class="text-muted mb-1">{{$setting->company_address}}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <p class="mb-1">Office Start Time</p>
                    <p class="text-muted mb-1">{{$setting->office_start_time}}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <p class="mb-1">Office End Time</p>
                    <p class="text-muted mb-1">{{$setting->office_end_time}}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <p class="mb-1">Break Start Time</p>
                    <p class="text-muted mb-1">{{$setting->break_start_time}}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <p class="mb-1">Break End Time</p>
                    <p class="text-muted mb-1">{{$setting->break_end_time}}</p>
                </div>
                <div class="col-12 text-center">
                    <a href="{{route('company-setting.edit',1)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit Company Setting</a>
                </div>
            </div>
        </div>
    </div>
@endsection
