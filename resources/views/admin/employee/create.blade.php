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
								<div class="page-title">أضافه موظف</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="{{ route('home') }}">الرئيسيه</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="{{ route('employee.index') }}">الموظفين</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">أضافه موظف</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>معلومات أساسيه</header>
								</div>
								@if (!$jobs->isEmpty())
								<form class="card-body row" action="{{ route('employee.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
									@csrf
									<input type="text" hidden readonly required
											name="uid"  id="uid">
									<div class="col-lg-12 p-t-20">
										<label for="system" class="form-label">الوظيفه</label>
										<div class="input-group has-validation ">
											<select class="form-control @error('job_id') {{ 'is-invalid' }} @enderror" id="job"  name="job_id" required>
												@foreach ($jobs as $job)
												<option value="{{ $job->id }}" >{{ $job->name }}</option>

												@endforeach
											</select>
											@error('job_id')
											<span class="invalid-feedback">{{ $message }}</span>
											@enderror
										
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width @error('name')
												{{ 'is-invalid' }}
											@enderror">
											<input class="mdl-textfield__input" type="text" 
											name="name" value="{{ old('name') }}" >
											<label class="mdl-textfield__label">اسم الموظف</label>
											@error('name')
												<span class="mdl-textfield__error">{{ $message }}</span>
											@enderror

										</div>
									</div>

									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width @error('identification')
											{{ 'is-invalid' }}
										@enderror">
											<input class="mdl-textfield__input" type="text"
											name="identification" value="{{ old('identification') }}" pattern="^[0-9]+$">
											<label class="mdl-textfield__label">رقم البطاقه</label>
											@error('identification')
												<span class="mdl-textfield__error">{{ $message }}</span>
											@enderror
										</div>
									</div>
								
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width @error('mobile_1')
											{{ 'is-invalid' }}
										@enderror">
											<input class="mdl-textfield__input" type="text"
												pattern="-?[0-9]*(\.[0-9]+)?" id="mobile_1"
												name="mobile_1" value="{{ old('mobile_1') }}">
											<label class="mdl-textfield__label" for="mobile_1">رقم الموبايل الاول</label>
											@error('mobile_1')
												<span class="mdl-textfield__error">{{ $message }}</span>
											@enderror										</div>
									</div>

									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width @error('mobile_2')
											{{ 'is-invalid' }}
										@enderror">
											<input class="mdl-textfield__input" type="text"
												pattern="-?[0-9]*(\.[0-9]+)?" id="mobile_2"
												name="mobile_2" value="{{ old('mobile_2') }}">
											<label class="mdl-textfield__label" for="mobile_2">رقم الموبايل الثاني</label>
											@error('mobile_2')
												<span class="mdl-textfield__error">{{ $message }}</span>
											@enderror										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width @error('joinDate') {{ 'is-invalid' }} @enderror">
											<input class="mdl-textfield__input" type="text" id="dateOfBirth"
											name="joinDate" value="{{ old('joinDate') }}">
											<label class="mdl-textfield__label">تاريخ التعيين</label>
											@error('joinDate')
												<span class="mdl-textfield__error">{{ $message }}</span>
											@enderror
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width @error('salary') {{ 'is-invalid' }} @enderror">
											<input class="mdl-textfield__input" type="text" id="salary"
											name="salary" value="{{ old('salary') }}" pattern="^[0-9]+$">
											<label class="mdl-textfield__label">الراتب</label>
											@error('salary')
												<span class="mdl-textfield__error">{{ $message }}</span>
											@enderror
										</div>
									</div>
									<div class="col-lg-12 p-t-20">
										<div class="mdl-textfield mdl-js-textfield txt-full-width @error('adress') {{ 'is-invalid' }} @enderror">
											<textarea class="mdl-textfield__input" rows="1" id="adress"
											name="adress" >{{ old('adress') }}</textarea>
											<label class="mdl-textfield__label" for="adress">العنوان</label>
											@error('adress')
												<span class="mdl-textfield__error">{{ $message }}</span>
											@enderror
										</div>
									</div>
							
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">حفظ</button>
										<a href="{{ route('employee.index') }}" type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">اغلاق</a>
									</div>
								</form>
								@else
								<div class="col-lg-12 p-t-20">
									<div class="alert alert-warning text-center"> من فضلك ادخل الوظائف اولا من <a href="{{ route('job.create') }}">هنا</a></div>
								</div>
								@endif									
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
