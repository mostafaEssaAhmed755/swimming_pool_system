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
								<div class="page-title">تحضير جلسه</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="{{ route('home') }}">الرئيسيه</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="{{ route('trainingsession.index') }}">الجلسات</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">تحضير جلسه</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>معلومات أساسيه</header>
								</div>
								@if (!$coachs->isEmpty() && !$gymnastics->isEmpty())
								<form class="card-body row" action="{{ route('preparingsession.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
									@csrf

									<div class="col-lg-4 p-t-20">
										<label for="coach" class="form-label pull-right">المدرب</label>
										<div class="input-group has-validation ">
											<select class="form-control @error('coach_id') {{ 'is-invalid' }} @enderror" id="coach"  name="coach_id" required>
												@foreach ($coachs as $coach)
												<option value="{{ $coach->id }}" >{{ $coach->name }}</option>

												@endforeach
											</select>
											@error('coach_id')
											<span class="invalid-feedback">{{ $message }}</span>
											@enderror
										
										</div>
									</div>
                                    <div class="col-lg-4 p-t-20">
										<label for="gymnastic" class="form-label pull-right">التمرينه</label>
										<div class="input-group has-validation ">
											<select class="form-control @error('gymnastic_id') {{ 'is-invalid' }} @enderror" id="gymnastic"  name="gymnastic_id" required>
												@foreach ($gymnastics as $gymnastic)
												<option value="" selected disabled hidden>اختر موعد</option>
                                                <option value="{{ $gymnastic->gymnastic_id }}" >{{ $gymnastic->gymnastic_name }}</option>

												@endforeach
											</select>
                                         
											@error('gymnastic_id')
											<span class="invalid-feedback">{{ $message }}</span>
											@enderror
										
										</div>
									</div>
									<div class="col-lg-4 p-t-20">
										<label for="trainingdate_id" class="form-label pull-right">موعد التمرينه</label>
										<div class="input-group has-validation ">
											<select class="form-control @error('trainingdate_id') {{ 'is-invalid' }} @enderror" id="trainingdate_id"  name="trainingdate_id" required>
											</select>
											@error('trainingdate_id')
											<span class="invalid-feedback">{{ $message }}</span>
											@enderror
										</div>
									</div>
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">حفظ</button>
										<a href="{{ route('trainingsession.index') }}" type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">اغلاق</a>
									</div>
								</form>
								@else
								@if ($coachs->isEmpty())
									<div class="col-lg-12 p-t-20">
										<div class="alert alert-warning text-center"> من فضلك ادخل المدربين اولا من <a href="{{ route('coach.create') }}">هنا</a></div>
									</div>
								@endif
								@if ($gymnastics->isEmpty())
									<div class="col-lg-12 p-t-20">
										<div class="alert alert-warning text-center"> من فضلك ادخل موعد تمرين لهذا اليوم اولا من <a href="{{ route('gymnastic.index') }}">هنا</a></div>
									</div>
								@endif
								@endif									
							</div>
						</div>
					</div>
				</div>
			</div>
    

  
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
