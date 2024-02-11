@extends('layouts.app')
@section('title', 'Edit Permission')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permission.update', $permission->id) }}" method="post" enctype="multipart/form-data"
                id="update-form">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="md-form">
                        <label for="">Role Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $permission->name }}">
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
    {!! JsValidator::formRequest('App\Http\Requests\UpdatePermission', '#update-form') !!}
    <script>
        $(document).ready(function() {
            
        });
    </script>
@endsection
