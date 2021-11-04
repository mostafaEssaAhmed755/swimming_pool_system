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
				
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">تجديد الاشتراك</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="{{ route('home') }}">الرئيسيه</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">المشتركين</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">تجديد الاشتراك</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>معلومات اساسيه</header>
								</div>
									<form class="card-body row" action="{{ route('student.renewalStore',$student->id) }}" method="POST" enctype="application/x-www-form-urlencoded">
									@csrf
                                    @method('PUT')

									<div class="col-lg-6 p-t-20">
										<label for="system" class="form-label pull-right">نظام الاشتراك</label>
										<div class="input-group has-validation ">
											<select class="form-control @error('system_id') {{ 'is-invalid' }} @enderror" id="system"  name="system_id" required>
												@foreach ($systems as $system)
												<option value="{{ $system->type }}" >{{ getSystemName($system->type) }}</option>

												@endforeach
											</select>
											@error('system_id')
											<span class="invalid-feedback">{{ $message }}</span>
											@enderror
										
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<label for="gymnastic_id" class="form-label pull-right"> التمرينه</label>
										<div class="input-group has-validation ">
											<select class="form-control @error('gymnastic_id') {{ 'is-invalid' }} @enderror" id="system"  name="gymnastic_id" required>
												@foreach ($gymnastics as $gymnastic)
												<option value="{{ $gymnastic->id }}" >{{ $gymnastic->name }}</option>

												@endforeach
											</select>
											@error('gymnastic_id')
											<span class="invalid-feedback">{{ $message }}</span>
											@enderror
										
										</div>
									</div>
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">حفظ</button>
										<a href="{{ route('student.show',$student->id) }}" type="button"
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
	<!-- dropzone -->
	<link href="{{asset('assets/plugins/dropzone/dropzone.css')}}" rel="stylesheet" media="screen">
	<!-- Date Time item CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css')}}" />
	
@endpush
@push('scripts')
	{{-- my js --}}
	<script src="{{ asset('assets/js/myjs.js') }}"></script>
	<!-- Material -->
	<script src="{{ asset('assets/js/pages/material-select/getmdl-select.js')}}"></script>
	<script src="{{ asset('assets/plugins/material-datetimepicker/moment-with-locales.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js')}}"></script>
	<script src="{{ asset('assets/plugins/material-datetimepicker/datetimepicker.js')}}"></script>
    <!-- dropzone -->
	<script src="{{ asset('assets/plugins/dropzone/dropzone.js')}}"></script>
	<script src="{{ asset('assets/plugins/dropzone/dropzone-call.js')}}"></script>
@endpush
