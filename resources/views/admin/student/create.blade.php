@extends('layouts.admin')
@section('content')
    			<!-- start page content -->
			<div class="page-content-wrapper ">
					@if (\Session::has('error'))
					<div class="alert alert-danger  alert_box_message">
						<ul>
							@foreach ( \Session::get('error')  as $item)
							<li>{{ $item }}</li>

							@endforeach
						</ul>
					</div>
					@endif
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">أضافه مشترك</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="{{ route('home') }}">الرئيسيه</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="{{ route('student.index') }}">المشتركين</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">أضافه مشترك</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>معلومات أساسيه</header>
								</div>
								@if (!$systems->isEmpty() && !$gymnastics->isEmpty())
								<form class="card-body row" action="{{ route('student.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
									@csrf
									<input type="text" hidden readonly required
											name="uid" id="uid" id="uid">
									<div class="col-lg-6 p-t-20 ">
										<label for="system" class="form-label pull-right">نظام الاشتراك</label>
										<div class="input-group has-validation ">
											<select class="form-control @error('system_id') {{ 'is-invalid' }} @enderror" id="system"  name="system_id" required>
												@foreach ($systems as $system)
												<option value="{{ $system->type }}" >{{ $system->typeName }}</option>

												@endforeach
											</select>
											@error('system_id')
											<span class="invalid-feedback">{{ $message }}</span>
											@enderror
										
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<label for="gymnastic_id" class="form-label pull-right">نوع التمرين</label>
										<div class="input-group has-validation ">
											<select class="form-control @error('gymnastic_id') {{ 'is-invalid' }} @enderror" id="gymnastic_id"  name="gymnastic_id" required>
												@foreach ($gymnastics as $gymnastic)
												<option value="{{ $gymnastic->id }}" >{{ $gymnastic->name }}</option>

												@endforeach
											</select>
											@error('gymnastic_id')
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
											name="name" value="{{ old('name') }}">
											<label class="mdl-textfield__label">اسم المشترك</label>
											@error('name')
												<span class="mdl-textfield__error">{{ $message }}</span>
											@enderror

										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width @error('age')
											{{ 'is-invalid' }}
										@enderror">
											<input class="mdl-textfield__input" type="text" id="age"
											name="age" value="{{ old('age') }}" pattern="^[0-9]+$">
											<label class="mdl-textfield__label">السن</label>
											@error('age')
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
										<label for="gender" class="form-label">النوع</label>
										<div class="input-group has-validation ">
											<select class="form-control @error('gender') {{ 'is-invalid' }} @enderror" id="gender"  name="gender" required>
												<option value="1" >ذكر</option>
												<option value="2">أنثي</option>
											</select>
											@error('gender')
											<span class="invalid-feedback">{{ $message }}</span>
											@enderror
										
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width @error('mobile')
											{{ 'is-invalid' }}
										@enderror">
											<input class="mdl-textfield__input" type="text"
												pattern="-?[0-9]*(\.[0-9]+)?" id="mobile"
												name="mobile" value="{{ old('mobile') }}">
											<label class="mdl-textfield__label" for="mobile">رقم الموبايل</label>
											@error('mobile')
												<span class="mdl-textfield__error">{{ $message }}</span>
											@enderror										</div>
									</div>

						
									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield txt-full-width @error('adress')
										{{ 'is-invalid' }} @enderror">
											<textarea class="mdl-textfield__input" rows="1" id="adress"
											name="adress" >{{ old('adress') }}</textarea>
											<label class="mdl-textfield__label" for="adress">العنوان</label>
											@error('adress')
												<span class="mdl-textfield__error">{{ $message }}</span>
											@enderror
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width @error('parentNam')
											{{ 'is-invalid' }}
										@enderror">
											<input class="mdl-textfield__input" type="text" id="parentNam"
											name="parentNam" value="{{ old('parentNam') }}">
											<label class="mdl-textfield__label">أسم ولي الامر</label>
											@error('parentNam')
												<span class="mdl-textfield__error">{{ $message }}</span>
											@enderror
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width @error('parentNum')
											{{ 'is-invalid' }}
										@enderror">
											<input class="mdl-textfield__input" type="text"
												pattern="-?[0-9]*(\.[0-9]+)?" id="parentNum"  name="parentNum"
												value="{{ old('parentNum') }}">
											<label class="mdl-textfield__label" for="parentNum">رقم الموبايل لولي الامر
												</label>
												@error('parentNum')
												<span class="mdl-textfield__error">{{ $message }}</span>
											@enderror										</div>
									</div>
						
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">حفظ</button>
										<a href="{{ route('student.index') }}" type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">اغلاق</a>
									</div>
								</form>
								@else
								@if ($systems->isEmpty())
								<div class="col-lg-12 p-t-20">
									<div class="alert alert-warning text-center"> من فضلك فعل نظام الاشتراك اولا من <a href="{{ route('system.index') }}">هنا</a></div>
								</div>
								@endif
								@if ($gymnastics->isEmpty())
								<div class="col-lg-12 p-t-20">
									<div class="alert alert-warning text-center"> من فضلك اضف التمارين اولا من <a href="{{ route('gymnastic.index') }}">هنا</a></div>
								</div>
								@endif
							
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
