@extends('layouts.admin')
@section('content')
    			<!-- start page content -->
			<div class="page-content-wrapper ">
					@if (\Session::has('error'))
					<div class="alert alert-danger  alert_box_message">
						<ul>
							<li>{!! \Session::get('error') !!}</li>
						</ul>
					</div>
				@endif
				@if (Session::has('success'))
				<div class="alert alert-info alert_box_message">
					{{ Session::get('success') }}
				</div>
				@endif
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">أضافه موعد التمرين</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="{{ route('home') }}">الرئيسيه</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="{{ route('gymnastic.index') }}">التمارين</a>&nbsp;<i class="fa fa-angle-right"></i></li>
								<li><a class="parent-item" href="{{ route('gymnastic.show',$id) }}"> تمرينه رقم {{ $id }} </a>&nbsp;<i class="fa fa-angle-right"></i></li>
								<li class="active">أضافه موعد التمرين</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>معلومات أساسيه</header>
								</div>
									<form class="card-body row" action="{{ route('trainingdate.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
									@csrf
									<input type="hidden" name="gymnastic_id" value="{{ $id }}">
									<div class="col-lg-12 p-t-20">
										<label for="date" class="form-label pull-right">اليوم </label>
										<div class="input-group has-validation ">
											<select class="form-control @error('date') {{ 'is-invalid' }} @enderror"  name="date" required>
												<option value="1" >السبت</option>
												<option value="2" >الاحد</option>
												<option value="3" >الاثنين</option>
												<option value="4" >الثلاثاء</option>
												<option value="5" >الاربعاء</option>
												<option value="6" >الخميس</option>
												<option value="7" >الجمعه</option>

											</select>
											@error('date')
											<span class="invalid-feedback">{{ $message }}</span>
											@enderror
										
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div class="form-control-wrapper @error('from') {{ 'is-invalid' }} @enderror">
											<input type="text" id="time-start" class="floating-label mdl-textfield__input" placeholder="من الساعه" required 
											name="from">
										</div>
										@error('from')
											<span class="invalid-feedback">{{ $message }}</span>
										@enderror
									</div>
									<div class="col-lg-6 p-t-20">
										<div class="form-control-wrapper @error('to') {{ 'is-invalid' }} @enderror">
											<input type="text" id="time-end" class="floating-label mdl-textfield__input" placeholder="الي الساعه" required
											name="to">
										</div>
										@error('to')
											<span class="invalid-feedback">{{ $message }}</span>
											@enderror
									</div>
								
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">حفظ</button>
										<a href="{{ route('gymnastic.show',$id) }}" type="button"
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
	{{-- dateTime --}}
	<link rel="stylesheet" href="{{ asset('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css')}}" />

@endpush
@push('scripts')
	{{-- my js --}}
	<script src="{{ asset('assets/js/myjs.js') }}"></script>
	{{-- dateTime  --}}
	<script src="{{ asset('assets/plugins/material-datetimepicker/moment-with-locales.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js')}}"></script>
	<script src="{{ asset('assets/plugins/material-datetimepicker/datetimepicker.js')}}"></script>
@endpush
