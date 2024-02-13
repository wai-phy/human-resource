@extends('layouts.app')
@section('title', 'Permissions')
@section('content')
    <div>
        {{-- @can('create_permission') --}}
            <a href="{{ route('permission.create') }}" class="btn btn-theme btn-sm"><i class="fas fa-plus-circle"></i> Add
                Permission</a>
        {{-- @endcan --}}
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered Datatable" style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-center no-sort">Name</th>
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

                ajax: "/permission/datatable/ssd",
                columns: [{
                        data: 'plus-icon',
                        name: 'plus-icon',
                        class: 'text-center'
                    },
                    {
                        data: 'name',
                        name: 'name',
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
                            url: `/permission/${id}`,
                        }).done(function(res) {
                            dataTable.ajax.reload();
                        });
                    }
                });

            })

        });
    </script>
@endsection
