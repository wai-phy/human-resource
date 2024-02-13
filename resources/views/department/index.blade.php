@extends('layouts.app')
@section('title', 'Departments')
@section('content')
    <div>
        {{-- @can('create_department') --}}
        <a href="{{ route('department.create') }}" class="btn btn-theme btn-sm"><i class="fas fa-plus-circle"></i> Add
            Department</a>
        {{-- @endcan --}}
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered Datatable" style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-center no-sort">Department</th>
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
                
                ajax: "/department/datatable/ssd",
                columns: [{
                        data: 'plus-icon',
                        name: 'plus-icon',
                        class: 'text-center'
                    },
                    {
                        data: 'title',
                        name: 'title',
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
                    [3, 'desc']
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
                            url: `/department/${id}`,
                        }).done(function(res) {
                            dataTable.ajax.reload();
                        });
                    }
                });

            })

        });
    </script>
@endsection
