@extends('layouts.dev')

@section('title')
    ADMIN DASHBOARD
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
                    Itemcodes
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        &nbsp;
                        <a href="{{ url('new-itemcode-dev') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            New Itemcode
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
									Order ID
								</th>

								<th>
									Order Code
								</th>

								<th>
									Product
								</th>

								<th>
									No of Items
								</th>
								<th>
									Created
								</th>
								<th>
									Action
								</th>
							</tr>
						@elseif(Auth::user()->hasRole('admin'))
							<tr>
								<th>
									Order ID
								</th>

								<th>
									Order Code
								</th>

								<th>
									Product
								</th>


								<th>
									No of Items
								</th>

								<th>
									Created
								</th>

								<th>
									Action
								</th>
							</tr>

						@elseif(Auth::user()->hasRole('agent'))
							<tr>
								<th>
									Order ID
								</th>

								<th>
									Order Code
								</th>
								<th>
									Product
								</th>


								<th>
									No of Items
								</th>

								<th>
									Created
								</th>

								<th>
									Action
								</th>
							</tr>
						@endif
                    </thead>
                    <tbody>
                        @if(Auth::user()->hasRole('dev'))
							@foreach($coupons as $coupon)
								<tr>

									<td>{{ $coupon->id }}</td>

									<td>{{ $coupon->order_code }}</td>

									<td>{{ $coupon->item }}</td>

									<td>{{ $coupon->no_of_items }}</td>

									<td>{{ Carbon\Carbon::parse($coupon->created_at)->format('d-M-Y - h:i:s') }}</td>


									<td>

										<a href="{{ url('show-itemcode-dev/'.$coupon->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View Codes ">
											<i class="fa fa-eye"></i>
										</a>

										<a href="{{ url('make-qr-dev/'.$coupon->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Generate QR ">
											<i class="fa fa-qrcode fa-2x"></i>
										</a>

										<a href="{{ url('export-codes-dev/'.$coupon->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Export Codes ">
											<i class="fa fa-download"></i>
										</a>

										<a href="{{ url('delete-itemcode-dev/'.$coupon->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Delete ">
											<i class="fa fa-trash"></i>
										</a>

										<a href="{{ url('reset-itemcode-dev/'.$coupon->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Reset ">
											<i class="flaticon-refresh"></i>
										</a>

										</button>
									</td>
								</tr>
							@endforeach
						@elseif(Auth::user()->hasRole('admin'))
							@foreach($coupons as $coupon)
								<tr>
									<td>{{ $coupon->id }}</td>

									<td>{{ $coupon->order_code }}</td>

									<td>{{ $coupon->item }}</td>

									<td>{{ $coupon->no_of_items }}</td>

									<td>{{ Carbon\Carbon::parse($coupon->created_at)->format('d-M-Y - h:i:s') }}</td>

									<td>

										<a href="{{ url('show-itemcode/'.$coupon->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View Codes ">
											<i class="fa fa-eye"></i>
										</a>

										</button>
									</td>
								</tr>
							@endforeach

						@elseif(Auth::user()->hasRole('agent'))
							@foreach($coupons as $coupon)
								<tr>

									<td>{{ $coupon->id }}</td>

									<td>{{ $coupon->order_code }}</td>

									<td>{{ $coupon->item }}</td>

									<td>{{ $coupon->no_of_items }}</td>

									<td>{{ Carbon\Carbon::parse($coupon->created_at)->format('d-M-Y - h:i:s') }}</td>

									<td>

										<a href="{{ url('show-itemcode/'.$coupon->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View Codes ">
											<i class="fa fa-eye"></i>
										</a>

										</button>
									</td>
								</tr>
							@endforeach
						@else
				        @endif
                    </tbody>
                </table>

            <!--end: Datatable -->
        </div>
    </div>

</div>
<!-- end:: Content -->

@endsection
