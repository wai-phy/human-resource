@extends('layouts.app')
@section('title', 'Create Role')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('role.store') }}" method="post" enctype="multipart/form-data" id="create-form">
                @csrf
                <div class="md-form">
                    <label for="">Role Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mt-3 row">
                    <label class="" for="">Permission</label>
                    @foreach ($permissions as $permission)
                        <div class="col-md-3 col-6">
                            <div class="form-check">
                                <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->name}}" id="check_{{$permission->id}}">
                                <label class="form-check-label" for="check_{{$permission->id}}">
                                    {{$permission->name}}
                                </label>
                            </div>
                        </div>
                    @endforeach
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
    {!! JsValidator::formRequest('App\Http\Requests\StoreRole', '#create-form') !!}
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
