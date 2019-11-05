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
                    <i class="flaticon-users"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Users
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        &nbsp;
                        <a href="{{ url('new-user-dev') }}" class="btn btn-brand btn-elevate btn-icon-sm">
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
                        @if(Auth::user()->hasRole('dev'))
							<tr>
								<th>
									UserID
								</th>
								<th>
									User Names
								</th>
								<th>
									Email
								</th>
								<th>
									Role
								</th>
								<th>
									Created By
								</th>
								<th>
									Updated By
								</th>
								<th>
									Created On
								</th>
								<th>
									Updated On
								</th>
								<th>
									Action
								</th>
							</tr>
						@elseif(Auth::user()->hasRole('admin'))
							<tr>
								<th>
									User ID
								</th>
								<th>
									User
								</th>
								<th>
									Email
								</th>
								<th>
									Role
								</th>
								<th>
									Created On
								</th>
								<th>
									Action
								</th>
							</tr>
						@else

						@endif
                    </thead>
                    <tbody>
                        @if(Auth::user()->hasRole('dev'))
                            @foreach($users->where("role", "!=", "dev") as $user)
                            <tr>
                                <td>{{ $user->id }}</td>

                                <td class="" tabindex="0">
                                    <div class="m-card-user m-card-user--sm">
                                        <div class="row">
                                            {{--  <div class="col-md-3">
                                                <div class="m-card-user__pic">
                                                <div class=""><img alt="" src="/images/avatar.png" width="40" height="40"><br>  </div>
                                        </div>
                                            </div>  --}}
                                            <div class="col-md-12">
                                                <div class="m-card-user__details">
                                            <span class="m-card-user__name">{{$user->name}}  {{$user->lastname}}</span>
                                        </div>
                                            </div>
                                        </div>


                                    </div>
                                </td>

                                <td>{{ $user->email }}</td>

                                <td>{{ $user->role }}</td>

                                <td>{{ $user->created_by }}</td>

                                <td>{{ $user->updated_by }}</td>

                                <td>{{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y - h:i:s') }}</td>

                                <td>{{ Carbon\Carbon::parse($user->updated_at)->format('d-m-Y - h:i:s') }}</td>

                                <td>

                                    {{-- <a href="{{ url('show-user-dev/'.$user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">
                                        <i class="fa fa-eye"></i>
                                    </a> --}}

                                    <a href="{{ url('edit-user-dev/'.$user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="{{ url('delete-user-dev/'.$user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                </button>
                                </td>
                            </tr>
                            @endforeach
                        @elseif(Auth::user()->hasRole('admin'))
                            @foreach($users->where("role", "!=", "dev") as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>

                                    <td class="" tabindex="0">
                                        <div class="m-card-user m-card-user--sm">
                                            <div class="row">
                                                {{--  <div class="col-md-3">
                                                    <div class="m-card-user__pic">
                                                    <div class=""><img alt="" src="/images/avatar.png" width="40" height="40"><br>  </div>
                                            </div>
                                                </div>  --}}
                                                <div class="col-md-12">
                                                    <div class="m-card-user__details">
                                                <span class="m-card-user__name">{{$user->name}}  {{$user->lastname}}</span>
                                            </div>
                                                </div>
                                            </div>


                                        </div>
                                    </td>

                                    <td>{{ $user->email }}</td>

                                    <td>{{ $user->role }}</td>

                                    <td>{{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y - h:i:s') }}</td>

                                    <td>

                                        {{-- <a href="{{ url('show-user-dev/'.$user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">
                                            <i class="fa fa-eye"></i>
                                        </a> --}}

                                        <a href="{{ url('edit-user-dev/'.$user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{ url('delete-user-dev/'.$user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
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
