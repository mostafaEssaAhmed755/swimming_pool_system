@extends('layouts.admin')
@section('content')
    			<!-- start page content -->
			<div class="page-content-wrapper ">
				<div class="page-content">
					@if (\Session::has('error'))
					<div class="alert alert-danger  alert_box_message_moreTime pull-right">
						{!! \Session::get('error') !!}
					</div>
					@endif
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">تحضير متدرب</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="{{ route('home') }}">الرئيسيه</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="{{ route('trainingsession.index') }}">الجلسات</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">تحضير متدرب</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>معلومات أساسيه</header>
								</div>
									<form class="card-body row" action="{{ route('preparingsession.storeStudent',$preparingsession->id) }}" method="POST" enctype="application/x-www-form-urlencoded">
									@csrf
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width @error('uid')
												{{ 'is-invalid' }}
											@enderror">
											<input class="mdl-textfield__input" type="text" 
											 name="uid" value="{{ old('uid') }}" id="barcodeInput">
											<label class="mdl-textfield__label">باركود المتدرب</label>
											@error('uid')
												<span class="mdl-textfield__error">{{ $message }}</span>
											@enderror

										</div>
									</div>
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">حفظ</button>
										<a href="{{ route('preparingsession.show',$preparingsession->id) }}" type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">اغلاق</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
@endsection
@push('styles')
    {{--my style  --}}
    <link rel="stylesheet" href="{{ asset('assets/css/mystyle.css') }}">
	<!-- icons -->
	<link href="{{ asset('assets/fonts/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/fonts/material-design-icons/material-icon.css')}}" rel="stylesheet" type="text/css" />

	
@endpush
@push('scripts')
	{{-- js barcode --}}
	<script src="{{ asset('assets/plugins/JsBarcode/onscan.min.js') }}"></script>
	{{-- my js --}}

	<script src="{{ asset('assets/js/myjs.js') }}"></script>
@endpush
