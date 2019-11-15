@extends('layouts.dev')

@section('title')
    Itemcodes
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


    @foreach ($coupons as $coupon)
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">

            <div class="kt-portlet__head-toolbar kt-portlet__head-lg">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__body-actions" style="margin-left:  200px;"">

                        <div class="row">
                            <div class="col-12">
                                <h5 class="">
                                    <strong> OrderCode : {{ $coupon->order_code }} </strong>
                                </h5>
                            </div>
                        </div>

                    </div>
                    &nbsp;&nbsp;
                    <div class="kt-portlet__body-actions" style="margin-left:  200px;">

                            <div class="row">
                                <div class="col-lg-12">
                                        <h5>
                                                Sold <span class="kt-badge kt-badge--success kt-badge--inline"> {{ $sold_items }} </span> &nbsp;&nbsp;&nbsp;
                                                In-Store <span class="kt-badge kt-badge--warning kt-badge--inline"> {{ $instore_items }} </span>
                                            </h5>
                                </div>
                            </div>

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
                                    ID
                                </th>

                                <th>
                                    Item
                                </th>

                                <th>
                                    Code
                                </th>
                                <th>
                                    Item Status
                                </th>

                                <th>
                                    Received by
                                </th>

                                <th>
                                    Received On
                                </th>

                                <th>
                                    Checkedout by
                                </th>

                                <th>
                                    Checkedout On
                                </th>

                                <th>
                                    Returned by
                                </th>

                                <th>
                                    Returned On
                                </th>
                            </tr>
                        @elseif(Auth::user()->hasRole('admin'))
                            <tr>
                                <th>
                                    ID
                                </th>

                                <th>
                                    Item
                                </th>
                                <th>
                                    Item Status
                                </th>

                                <th>
                                    Received by
                                </th>

                                <th>
                                    Received On
                                </th>

                                <th>
                                    Checkedout by
                                </th>

                                <th>
                                    Checkedout On
                                </th>

                                <th>
                                    Returned by
                                </th>

                                <th>
                                    Returned On
                                </th>
                            </tr>
                        @elseif(Auth::user()->hasRole('retex-admin'))
                            <tr>
                                <th>
                                    ID
                                </th>

                                <th>
                                    Item
                                </th>
                                <th>
                                    Item Status
                                </th>

                                <th>
                                    Received by
                                </th>

                                <th>
                                    Received On
                                </th>

                                <th>
                                    Checkedout by
                                </th>

                                <th>
                                    Checkedout On
                                </th>

                                <th>
                                    Returned by
                                </th>

                                <th>
                                    Returned On
                                </th>
                            </tr>
                        @elseif(Auth::user()->hasRole('agent'))
                            <tr>
                                <th>
                                    ID
                                </th>

                                <th>
                                    Item
                                </th>
                                <th>
                                    Item Status
                                </th>

                                <th>
                                    Received by
                                </th>

                                <th>
                                    Received On
                                </th>
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                        @if(Auth::user()->hasRole('dev'))
                            @foreach($coupon->items_code as $item => $value)
                                <tr>

                                    <td>{{ $value['id'] }}</td>

                                    <td>{{ $value['item'] }}</td>

                                    <td>{{ $value['crypt_text'] }}</td>

                                    @if($value['item_status'] == 'tagged')
                                        <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--unified-info kt-badge--lg kt-badge--inline"> {{ $value['item_status'] }} </span></span></td>
                                    @elseif($value['item_status'] == 'sold')
                                        <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--success kt-badge--lg kt-badge--inline"> {{ $value['item_status'] }} </span></span></td>
                                    @elseif($value['item_status'] == 'in store')
                                        <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--warning kt-badge--lg kt-badge--inline"> in store </span></span></td>
                                    @else
                                    @endif

                                    <td>{{ $value['received_by'] }}</td>

                                    <td>{{ $value['received_on'] }}</td>

                                    <td>{{ $value['checkedout_by'] }}</td>

                                    <td>{{ $value['checkedout_on'] }}</td>

                                    <td>{{ $value['returned_by'] }}</td>

                                    <td>{{ $value['returned_on'] }}</td>


                                </tr>
                            @endforeach
						@elseif(Auth::user()->hasRole('admin'))
                            @foreach($coupon->items_code as $item => $value)
                                <tr>

                                    <td>{{ $value['id'] }}</td>

                                    <td>{{ $value['item'] }}</td>

                                    @if($value['item_status'] == 'tagged')
                                        <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--unified-info kt-badge--lg kt-badge--inline"> {{ $value['item_status'] }} </span></span></td>
                                    @elseif($value['item_status'] == 'sold')
                                        <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--success kt-badge--lg kt-badge--inline"> {{ $value['item_status'] }} </span></span></td>
                                    @elseif($value['item_status'] == 'in store')
                                        <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--warning kt-badge--lg kt-badge--inline"> in store </span></span></td>
                                    @else
                                    @endif

                                    <td>{{ $value['received_by'] }}</td>

                                    <td>{{ $value['received_on'] }}</td>

                                    <td>{{ $value['checkedout_by'] }}</td>

                                    <td>{{ $value['checkedout_on'] }}</td>

                                    <td>{{ $value['returned_by'] }}</td>

                                    <td>{{ $value['returned_on'] }}</td>


                                </tr>
                            @endforeach
						@elseif(Auth::user()->hasRole('retex-admin'))
                            @foreach($coupon->items_code as $item => $value)
                                <tr>

                                    <td>{{ $value['id'] }}</td>

                                    <td>{{ $value['item'] }}</td>

                                    @if($value['item_status'] == 'tagged')
                                        <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--unified-info kt-badge--lg kt-badge--inline"> {{ $value['item_status'] }} </span></span></td>
                                    @elseif($value['item_status'] == 'sold')
                                        <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--success kt-badge--lg kt-badge--inline"> {{ $value['item_status'] }} </span></span></td>
                                    @elseif($value['item_status'] == 'in store')
                                        <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--warning kt-badge--lg kt-badge--inline"> in store </span></span></td>
                                    @else
                                    @endif

                                    <td>{{ $value['received_by'] }}</td>

                                    <td>{{ $value['received_on'] }}</td>

                                    <td>{{ $value['checkedout_by'] }}</td>

                                    <td>{{ $value['checkedout_on'] }}</td>

                                    <td>{{ $value['returned_by'] }}</td>

                                    <td>{{ $value['returned_on'] }}</td>


                                </tr>
                            @endforeach
						@elseif(Auth::user()->hasRole('agent'))
                            @foreach($coupon->items_code as $item => $value)
                                @if($value['received_by'] == Auth::user()->name . " " .Auth::user()->lastname)
                                    <tr>

                                        <td>{{ $value['id'] }}</td>

                                        <td>{{ $value['item'] }}</td>

                                        @if($value['item_status'] == 'tagged')
                                            <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--unified-info kt-badge--lg kt-badge--inline"> {{ $value['item_status'] }} </span></span></td>
                                        @elseif($value['item_status'] == 'sold')
                                            <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--success kt-badge--lg kt-badge--inline"> {{ $value['item_status'] }} </span></span></td>
                                        @elseif($value['item_status'] == 'in store')
                                            <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--warning kt-badge--lg kt-badge--inline"> in store </span></span></td>
                                        @else
                                        @endif

                                        <td>{{ $value['received_by'] }}</td>

                                        <td>{{ $value['received_on'] }}</td>

                                    </tr>
                                @endif
                            @endforeach
						@else
				        @endif
                    </tbody>
                </table>

            <!--end: Datatable -->
            @endforeach
        </div>
    </div>

</div>
<!-- end:: Content -->

@endsection
