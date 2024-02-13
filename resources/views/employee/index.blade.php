@extends('layouts.app')
@section('title', 'Employees')
@section('content')
    <div>
        {{-- @can('create_employee') --}}
        <a href="{{ route('employee.create') }}" class="btn btn-theme btn-sm"><i class="fas fa-plus-circle"></i> Add
            Employee</a>
            {{-- @endcan --}}
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered Datatable" style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-center no-sort">Profile</th>
                        <th class="text-center">Employee ID</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center no-sort">Department</th>
                        <th class="text-center no-sort">Role</th>
                        <th class="text-center">Is Present?</th>
                        <th class="text-center no-sort">Action</th>
                        <th class="text-center">Updated At</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var dataTable = $('.Datatable').DataTable({
                
                ajax: "/employee/datatable/ssd",
                columns: [{
                        data: 'plus-icon',
                        name: 'plus-icon',
                        class: 'text-center'
                    },
                    {
                        data: 'profile_img',
                        name: 'profile_img',
                        class: 'text-center'
                    },
                    {
                        data: 'employee_id',
                        name: 'employee_id',
                        class: 'text-center'
                    },
                    {
                        data: 'email',
                        name: 'email',
                        class: 'text-center'
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                        class: 'text-center'
                    },
                    {
                        data: 'department_name',
                        name: 'department_name',
                        class: 'text-center'
                    },
                    {
                        data: 'role',
                        name: 'role',
                        class: 'text-center'
                    },
                    {
                        data: 'is_present',
                        name: 'is_present',
                        class: 'text-center'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        class: 'text-center'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        class: 'text-center'
                    },
                ],
                order: [
                    [9, 'desc']
                ],
                
            });

            $(document).on('click', '.delete-btn', function(e) {
                e.preventDefault();
                var id = $(this).data('id')
                Swal.fire({
                    text: "Are you sure you want to delete!",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: "DELETE",
                            url: `/employee/${id}`,
                        }).done(function(res) {
                            dataTable.ajax.reload();
                        });
                    }
                });

            })

        });
    </script>
@endsection
