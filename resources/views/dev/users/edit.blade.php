@extends('layouts.dev')

@section('title')
    Edit User
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



    <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Edit User
                    </h3>
                </div>
            </div>

            <!--begin::Form-->
        @if(Auth::user()->hasRole('dev'))
            @foreach ($users as $user)
                <form class="kt-form kt-form--label-right" method="POST" action="/update-user-dev/{{ $user->id }}" role="form" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Firstname:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" >
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>Lastname:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                                        <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="">Email:</label>
                                    <input type="email" class="form-control" value="{{ $user->email }}" name="email">
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }} ">
                                <div class="col-lg-4">
                                    <label class="">Password:</label>
                                    <div class="kt-input-icon kt-input-icon--right">
                                        <input type="password" class="form-control" name="password" value="{{ $user->password }}">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label class="">Confirm Password:</label>
                                        <div class="kt-input-icon kt-input-icon--right">
                                            <input type="password" class="form-control" name="password_confirmation" value="{{ $user->password }}">

                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                <div class="col-lg-4">
                                    <label class="">Role:</label>
                                    <div class="kt-input-icon kt-input-icon--right">
                                        <select class="form-control" name="role">
                                                <option value='{{ $user->role }}' selected="selected">
                                                        {{ $user->role }}
                                                    </option>
                                            <option value="" class="hidden">Select role</option>
                                            <option value="admin">Admin</option>
                                            <option value="agent">Agent</option>
                                            <option value="cashier">Cashier</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-8">
                                        <button type="submit" class="btn btn-primary" id="submit_btn">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

            @endforeach
        @elseif(Auth::user()->hasRole('admin'))
            @foreach ($users as $user)
                <form class="kt-form kt-form--label-right" method="POST" action="/update-user/{{ $user->id }}" role="form" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Firstname:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}"  required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>Lastname:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                                        <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="">Email:</label>
                                    <input type="email" class="form-control" value="{{ $user->email }}" name="email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label class="">Password:</label>
                                    <div class="kt-input-icon kt-input-icon--right">
                                        <input type="password" class="form-control" name="password" value="{{ $user->password }}">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label class="">Confirm Password:</label>
                                        <div class="kt-input-icon kt-input-icon--right">
                                            <input type="password" class="form-control" name="password_confirmation" value="{{ $user->password }}">

                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                <div class="col-lg-4">
                                    <label class="">Role:</label>
                                    <div class="kt-input-icon kt-input-icon--right">
                                        <select class="form-control" name="role" required>
                                                <option value='{{ $user->role }}' selected="selected">
                                                        {{ $user->role }}
                                                    </option>
                                            <option value="" class="hidden">Select role</option>
                                            <option value="admin">Admin</option>
                                            <option value="agent">Agent</option>
                                            <option value="cashier">Cashier</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-8">
                                        <button type="submit" class="btn btn-primary" id="submit_btn">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

            @endforeach
            <!--end::Form-->
        @else
        @endif
        </div>

</div>
<!-- end:: Content -->

@endsection
