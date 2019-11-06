@extends('layouts.dev')

@section('title')
    Receiving
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
                        Receiving
                    </h3>
                </div>
            </div>

        @if(Auth::user()->hasRole('dev'))
            <!--begin::Form-->
            <form class="kt-form" method="POST" action="{{ url('verify-dev') }}" enctype="multipart/form-data"  role="search" autocomplete="off" id="receivingForm">
                    {{ csrf_field() }}

                    <form class="kt-form">
                        <div class="kt-portlet__body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <input type="password" id="codes" class="form-control-lg col-lg-12" name="codes" required autofocus style="height:150px; border: 1px solid #999;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <button type="submit" name="submit" class="btn btn-primary" id="submit_btn" hidden>Generate Itemcodes</button>
                                    <button type="reset" class="btn btn-secondary" hidden>Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!--end::Form-->
            </div>
        @elseif(Auth::user()->hasRole('admin'))
            <!--begin::Form-->
            <form class="kt-form" method="POST" action="{{ url('verify-admin') }}" enctype="multipart/form-data"  role="search" autocomplete="off" id="receivingForm">
                    {{ csrf_field() }}

                    <form class="kt-form">
                        <div class="kt-portlet__body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <input type="password" id="codes" class="form-control-lg col-lg-12" name="codes" required autofocus style="height:150px; border: 1px solid #999;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <button name="submit" type="submit" class="btn btn-primary" id="submit_btn" hidden>Generate Itemcodes</button>
                                    <button type="reset" class="btn btn-secondary" hidden>Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!--end::Form-->
            </div>
        @elseif(Auth::user()->hasRole('agent'))
            <!--begin::Form-->
            <form class="kt-form" method="POST" action="{{ url('verify-agent') }}" enctype="multipart/form-data"  role="search" autocomplete="off" id="receivingForm">
                    {{ csrf_field() }}

                    <form class="kt-form">
                        <div class="kt-portlet__body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <input type="password" id="codes" class="form-control-lg col-lg-12" name="codes" required autofocus style="height:150px; border: 1px solid #999;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <button name="submit" type="submit" class="btn btn-primary" id="submit_btn" hidden>Generate Itemcodes</button>
                                    <button type="reset" class="btn btn-secondary" hidden>Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!--end::Form-->
            </div>
        @elseif(Auth::user()->hasRole('cashier'))
            <!--begin::Form-->
            <form class="kt-form" method="POST" action="{{ url('checkout-cashier') }}" enctype="multipart/form-data"  role="search" autocomplete="off" id="receivingForm">
                    {{ csrf_field() }}

                    <form class="kt-form">
                        <div class="kt-portlet__body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <input type="password" id="codes" class="form-control-lg col-lg-12" name="codes" required autofocus style="height:150px; border: 1px solid #999;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <button name="submit" type="submit" class="btn btn-primary" id="submit_btn" hidden>Generate Itemcodes</button>
                                    <button type="reset" class="btn btn-secondary" hidden>Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!--end::Form-->
            </div>
        @else
        @endif

</div>
<!-- end:: Content -->

<script>

    var delay = (function(){
        var timer = 0;
        return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
        };
    })();

    $('#codes').on('paste', function() {
        delay(function(){
            if ($("#codes").val().length < 8) {
                $("#codes").val("");
            }
        }, 20 );
    });

</script>

<script>
$('#codes').on('paste', function() {
        setTimeout(function() {
            console.log(codes.value);
            $('#receivingForm').submit()
        });
    });
</script>

@endsection
