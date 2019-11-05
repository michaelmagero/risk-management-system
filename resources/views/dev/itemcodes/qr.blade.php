@extends('layouts.dev')

@section('title')
    Return Items
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
                        Return Items
                    </h3>
                </div>
            </div>

        @if(Auth::user()->hasRole('dev'))
            <!--begin::Form-->
            <form class="kt-form" method="POST" action="{{ url('return-dev') }}" enctype="multipart/form-data"  role="search" autocomplete="off">
                    {{ csrf_field() }}
                        <div class="kt-portlet__body">
                            <div class="row">
                                    @foreach($coupons as $coupon)
                                        @foreach ($coupon->items_code as $item => $value)

                                                <div class="col-md-3 text-center" style="border:1px solid grey;">
                                                    <div>

                                                        <strong>{{ $value['id'] }}</strong>

                                                        <img src="data:image/jpeg;base64, {!! base64_encode(QrCode::format('png')
                                                        ->size(150)->errorCorrection('H')
                                                        ->generate($value['crypt_text'])) !!} ">

                                                        <strong>{{ $value['item'] }}</strong>

                                                    </div>
                                            </div><br>
                                        @endforeach
                                    @endforeach
                                </div>
                        </div>
                <!--end::Form-->
            </div>
        </form>
        @elseif(Auth::user()->hasRole('admin'))
            <!--begin::Form-->
            <form class="kt-form" method="POST" action="{{ url('return-dev') }}" enctype="multipart/form-data"  role="search" autocomplete="off">
                {{ csrf_field() }}
                    <div class="kt-portlet__body">
                        <div class="row">
                                @foreach($coupons as $coupon)
                                    @foreach ($coupon->items_code as $item => $value)

                                            <div class="col-md-3 text-center" style="border:1px solid grey;">
                                                <div>

                                                    <strong>{{ $value['id'] }}</strong>

                                                    <img src="data:image/jpeg;base64, {!! base64_encode(QrCode::format('png')
                                                    ->size(150)->errorCorrection('H')
                                                    ->generate($value['crypt_text'])) !!} ">

                                                    <strong>{{ $value['item'] }}</strong>

                                                </div>
                                        </div><br>
                                    @endforeach
                                @endforeach
                            </div>
                    </div>
            <!--end::Form-->
        </div>
    </form>
        @else
        @endif

</div>
<!-- end:: Content -->

@endsection
