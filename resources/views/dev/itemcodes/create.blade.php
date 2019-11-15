@extends('layouts.dev')

@section('title')
    New Itemcode
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
                        Add Itemcode
                    </h3>
                </div>
            </div>

            <!--begin::Form-->
            @if(Auth::user()->hasRole('dev'))
                <form class="kt-form" method="POST" action="{{ url('new-itemcode-dev') }}" enctype="multipart/form-data"  role="form" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="kt-portlet__body">
                            <div id="kt_repeater_1">
                                    <div class="form-group form-group-last row" id="kt_repeater_1">
                                        <div data-repeater-list="arrayName" class="col-lg-12">
                                            <div data-repeater-item class="form-group row align-items-center">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-4">
                                                    <div class="kt-form__group--inline">
                                                        <div class="kt-form__label">
                                                            <label>Product Name:</label>
                                                        </div>
                                                        <div class="kt-form__control">
                                                            <input type="text" name="item" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="kt-form__group--inline">
                                                        <div class="kt-form__label">
                                                            <label class="kt-label m-label--single">Qty:</label>
                                                        </div>
                                                        <div class="kt-form__control">
                                                            <input type="text" name="no_of_items" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold mt-4">
                                                        <i class="la la-trash-o"></i>
                                                        Delete
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-last row">
                                        <label class="col-lg-1 col-form-label"></label>
                                        <div class="col-lg-4">
                                            <a href="javascript:;" data-repeater-create="" class="btn btn-bold btn-sm btn-label-brand">
                                                <i class="la la-plus"></i> Add
                                            </a>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <button type="submit" class="btn btn-primary" id="submit_btn">Generate Itemcodes</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @elseif(Auth::user()->hasRole('retex-admin'))
                <form class="kt-form" method="POST" action="{{ url('new-itemcode') }}" enctype="multipart/form-data"  role="form" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="kt-portlet__body">
                            <div id="kt_repeater_1">
                                    <div class="form-group form-group-last row" id="kt_repeater_1">
                                        <div data-repeater-list="arrayName" class="col-lg-12">
                                            <div data-repeater-item class="form-group row align-items-center">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-4">
                                                    <div class="kt-form__group--inline">
                                                        <div class="kt-form__label">
                                                            <label>Product Name:</label>
                                                        </div>
                                                        <div class="kt-form__control">
                                                            <input type="text" name="item" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="kt-form__group--inline">
                                                        <div class="kt-form__label">
                                                            <label class="kt-label m-label--single">Qty:</label>
                                                        </div>
                                                        <div class="kt-form__control">
                                                            <input type="text" name="no_of_items" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold mt-4">
                                                        <i class="la la-trash-o"></i>
                                                        Delete
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-last row">
                                        <label class="col-lg-1 col-form-label"></label>
                                        <div class="col-lg-4">
                                            <a href="javascript:;" data-repeater-create="" class="btn btn-bold btn-sm btn-label-brand">
                                                <i class="la la-plus"></i> Add
                                            </a>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <button type="submit" class="btn btn-primary" id="submit_btn">Generate Itemcodes</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
            <!--end::Form-->
        </div>

</div>
<!-- end:: Content -->

@endsection
