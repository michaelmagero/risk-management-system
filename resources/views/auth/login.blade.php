@extends('layouts.app')

@section('title')
    DASHBOARD | LOGIN
@endsection

@section('content')

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
        <script src="../js/sweetalert2.all.js"></script>

        <!-- Include this after the sweet alert js file -->
        @if (Session::has('sweet_alert.alert'))
            <script>
                swal({!! Session::get('sweet_alert.alert') !!});
            </script>
        @endif


        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background: #fff !important;">
                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                    <div class="kt-login__container">
                        <div class="kt-login__logo">
                            <a href="#">
                                <img src="../images/retex1.jpeg" width="150" height="150">
                            </a>
                        </div>
                        <div class="kt-login__signin">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Sign In To Admin</h3>

                            </div>
                        <form class="kt-form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field()  }}
                                <div class="input-group">
                                    <input class=" form-control-lg col-lg-12 inputs" type="text" placeholder="Email" name="email" autocomplete="off">
                                </div>
                                <div class="input-group">
                                    <input class=" form-control-lg col-lg-12 inputs" type="password" placeholder="Password" name="password">
                                </div>
                                <div class="kt-login__actions">
                                    <button type="submit" id="kt_login_signin_submit" class="btn btn-primary kt-login__btn-primary">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Page -->

@endsection
