@extends('layouts.app')
@section('title', 'Profile')
@section('content')
    <div class="card mb-3">
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="text-center">
                        <img class="profile_img" src="{{ $employee->profile_img_path() }}" alt="">
                        <div class="py-2 px-2">
                            <h4>{{ $employee->name }}</h4>
                            <p class="text-muted mb-2">{{ $employee->employee_id }}</p>
                            <p class="text-muted mb-2"><span
                                    class="badge badge-pill badge-dark">{{ $employee->department ? $employee->department->title : '-' }}</span>
                            </p>
                            <p class="text-muted mb-2">
                                @foreach ($employee->roles as $role)
                                    <span class="badge badge-pill badge-primary">{{ $role->name }}</span>
                                @endforeach
                            </p>
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
    <div class="card mb-3">
        <div class="card-body">
            <h5>Biometric Authentication</h5>
            <form id="biometric-register-form">
                <button type="submit" class="btn biometric-register-btn" value="Register authenticator">
                    <i class="fa-solid fa-fingerprint"></i>
                    <i class="fa-solid fa-plus-circle"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <button type="submit" class="btn logout-btn btn-danger block form-control">Logout</button>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            const register = event => {
                event.preventDefault()

                new WebAuthn({
                    registerOptions: 'webauthn/register/options',
                    register: 'webauthn/register',
                }).register()
                    .then(function(response){

                    })
                    .catch(function(response){
                        console.log(response);
                    })
            }

            document.getElementById('biometric-register-form').addEventListener('submit', register);


            $('.logout-btn').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    text: "Are you sure you want to delete!",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: '/logout',
                        }).done(function(res) {
                            window.location.reload();
                        })
                    }
                });
            })

        })
    </script>
@endsection
