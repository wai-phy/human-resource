<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Datatable  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.material.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Date Range Picker --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    {{-- Sweet Alert  --}}
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">

    {{-- select 2  --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



</head>

<body>
    <div class="page-wrapper chiller-theme toggled">

        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">Ninja HR</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded"
                            src="{{auth()->user()->profile_img_path()}}"
                            alt="">
                    </div>
                    <div class="user-info">
                        <span class="user-name">{{auth()->user()->name}}
                        </span>
                        <span class="user-role">{{auth()->user()->department ? auth()->user()->department->title : 'No Department'}}</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>Menu</span>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-home"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('employee.index') }}">
                                <i class="fas fa-users"></i><span>Employees</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('department.index') }}">
                                <i class="fa-solid fa-people-group"></i><span>Departments</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('role.index') }}">
                                <i class="fa-solid fa-shield-halved"></i><span>Roles</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('permission.index') }}">
                                <i class="fa-solid fa-shield-halved"></i><span>Permissions</span>
                            </a>
                        </li>
                        {{-- <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                                <span class="badge badge-pill badge-warning">New</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Dashboard 1
                                            <span class="badge badge-pill badge-success">Pro</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Dashboard 2</a>
                                    </li>
                                    <li>
                                        <a href="#">Dashboard 3</a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->

        </nav>
        <!-- sidebar-wrapper  -->
        <div class="header-bar">
            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="d-flex justify-content-between">
                        @if (request()->is('/'))
                            <a href="#" id="show-sidebar"><i class="fas fa-bars"></i></a>
                        @else
                            <a href="#" id="back-btn"><i class="fa-solid fa-chevron-left"></i></a>
                        @endif
                        <h5>@yield('title')</h5>
                        <a href=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content py-4">
            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
        </div>
        <div class="bottom-bar">
            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="d-flex justify-content-between">
                        <a href="{{route('home')}}">
                            <i class="fa-solid fa-house"></i>
                            <p class="mb-0">Home</p>
                        </a>
                        <a href="">
                            <i class="fa-solid fa-house"></i>
                            <p class="mb-0">Home</p>
                        </a>
                        <a href="">
                            <i class="fa-solid fa-house"></i>
                            <p class="mb-0">Home</p>
                        </a>
                        <a href="{{route('profile')}}">
                            <i class="fa-solid fa-user"></i>
                            <p class="mb-0">Profile</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>

    <!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    {{-- datatable  --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.13/features/mark.js/datatables.mark.js"></script>
    <script src="https://cdn.jsdelivr.net/g/mark.js(jquery.mark.min.js)"></script>

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    {{-- Date Range Picker --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    {{-- Sweet Alert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- Sweet Alert  --}}
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>

    {{-- select 2 js  --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(function($) {

            let token = document.head.querySelector('meta[name="csrf-token"]');
            if (token) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token.content
                    }
                });
            } else {
                console.error('CSRF Token not found');
            }

            $(".sidebar-dropdown > a").click(function() {
                $(".sidebar-submenu").slideUp(200);
                if (
                    $(this)
                    .parent()
                    .hasClass("active")
                ) {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this)
                        .parent()
                        .removeClass("active");
                } else {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this)
                        .next(".sidebar-submenu")
                        .slideDown(200);
                    $(this)
                        .parent()
                        .addClass("active");
                }
            });

            $("#close-sidebar").click(function(e) {
                e.preventDefault();
                $(".page-wrapper").removeClass("toggled");
            });
            $("#show-sidebar").click(function(e) {
                e.preventDefault();
                $(".page-wrapper").addClass("toggled");
            });

            @if (request()->is('/'))
                document.addEventListener('click', function(event) {
                    if (document.getElementById('show-sidebar').contains(event.target)) {
                        $(".page-wrapper").addClass("toggled");
                    } else if (!document.getElementById('sidebar').contains(event.target)) {
                        $(".page-wrapper").removeClass("toggled");
                    }
                })
            @endif

            @if (session('create'))
                {
                    Swal.fire({
                        title: "create",
                        text: "{{ session('create') }}",
                        icon: "success"
                    });
                }
            @endif

            $.extend(true, $.fn.dataTable.defaults, {
                responsive: true,
                processing: true,
                serverSide: true,
                mark: true,
                columnDefs: [
                    {
                        target: [0],
                        "class": "control"
                    },
                    {
                        "targets": "no-sort",
                        "sortable": false
                    },
                ],
                "language": {
                    "paginate": {
                        "previous": "<i class='fa-regular fa-circle-left'></i>",
                        "next": "<i class='fa-regular fa-circle-right'></i>",
                    }
                }
            });
            $('#back-btn').on("click",function(e){
                e.preventDefault();
                window.history.go(-1);
            });

            $('.select-hr').select2();


        });
    </script>
    @yield('scripts')
</body>

</html>
