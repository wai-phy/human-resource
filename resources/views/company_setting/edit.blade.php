@extends('layouts.app')
@section('title', 'Edit Company Setting')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('company-setting.update', $setting->id) }}" method="post" enctype="multipart/form-data"
                id="update-form">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form">
                            <label for="">Company Name</label>
                            <input type="text" name="company_name" class="form-control" value="{{ $setting->company_name }}">
                        </div>
                        <div class="md-form">
                            <label for="">Company Email</label>
                            <input type="email" name="company_email" class="form-control" value="{{ $setting->company_email }}">
                        </div>
                        <div class="md-form">
                            <label for="">Company Phone</label>
                            <input type="number" name="company_phone" class="form-control" value="{{ $setting->company_phone }}">
                        </div>
                        <div class="md-form">
                            <label for="">Company Address</label>
                            <textarea name="company_address" class="form-control">{{ $setting->company_address }}</textarea>
                        </div>
                        <div class="md-form">
                            <label for="">Office Start Time</label>
                            <input type="text" name="office_start_time" class="form-control" value="{{ $setting->office_start_time }}">
                        </div>
                        <div class="md-form">
                            <label for="">Office End Time</label>
                            <input type="text" name="office_end_time" class="form-control" value="{{ $setting->office_end_time }}">
                        </div>
                        <div class="md-form">
                            <label for="">Break Start Time</label>
                            <input type="text" name="break_start_time" class="form-control" value="{{ $setting->break_start_time }}">
                        </div>
                        <div class="md-form">
                            <label for="">Break End Time</label>
                            <input type="text" name="break_end_time" class="form-control" value="{{ $setting->break_end_time }}">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-5 mb-3">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-theme btn-sm btn-block">Confirm</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateEmployee', '#update-form') !!}
    <script>
        $(document).ready(function() {
            $('.birthday').daterangepicker({
                "showDropdowns": true,
                "singleDatePicker": true,
                "autoApply": true,
                "maxDate": moment(),
                "locale": {
                    "format": "YYYY-MM-DD",
                }
            });

            $('.date_of_join').daterangepicker({
                "showDropdowns": true,
                "singleDatePicker": true,
                "autoApply": true,
                "locale": {
                    "format": "YYYY-MM-DD",
                }
            });

            $('#profile_img').on('change', function() {
                var file_length = document.getElementById('profile_img').files.length;
                $('.profile_img').html('');
                for (i = 0; i < file_length; i++) {
                    $('.profile_img').append(`<img src="${URL.createObjectURL(event.target.files[i])}"/>`)
                }
            });
        });
    </script>
@endsection
