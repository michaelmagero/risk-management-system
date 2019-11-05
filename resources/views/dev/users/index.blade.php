@extends('layouts.dev')

@section('title')
    Users
@endsection

@section('content')

<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <script src="../js/sweetalert2.all.js"></script>

    <!-- Include this after the sweet alert js file -->
    @if (Session::has('sweet_alert.alert'))
        <script>
            swal({!! Session::get('sweet_alert.alert') !!});
        </script>
    @endif



    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    @yield('title')
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        &nbsp;
                        <a href="{{ url('users/create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            New User
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Registered</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(Auth::user()->hasRole('dev'))
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>

                                    <td>{{ $user->name }}</td>

                                    <td>{{ $user->lastname }}</td>

                                    <td>{{ $user->email }}</td>

                                    <td>{{ $user->role }}</td>

                                    <td>{{ $user->created_at }}</td>

                                    <td>

                                        <a href="{{ url('edit-user-dev/'.$user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{ url('users/{user}') }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                    </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

            <!--end: Datatable -->
        </div>
    </div>

</div>
<!-- end:: Content -->

@endsection
