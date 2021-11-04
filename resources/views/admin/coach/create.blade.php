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
								<div class="page-title">أضافه مدرب</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="{{ route('home') }}">الرئيسيه</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="{{ route("coach.index") }}">المدربين</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">أضافه مدرب</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>معلومات أساسيه</header>
								</div>
								<form class="card-body row" action="{{ route('coach.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
									@csrf
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width @error('name')
												{{ 'is-invalid' }}
											@enderror">
											<input class="mdl-textfield__input" type="text" 
											name="name" value="{{ old('name') }}" >
											<label class="mdl-textfield__label">اسم المدرب</label>
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
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width @error('mobile') {{ 'is-invalid' }} @enderror">
											<input class="mdl-textfield__input" type="text"
												pattern="-?[0-9]*(\.[0-9]+)?" id="mobile"
												name="mobile" value="{{ old('mobile') }}">
											<label class="mdl-textfield__label" for="mobile_1">رقم الموبايل </label>
											@error('mobile')
												<span class="mdl-textfield__error">{{ $message }}</span>
											@enderror										
										</div>
									</div>

									<div class="col-lg-6 p-t-20">
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
										<a href="{{ route('coach.index') }}" type="button"
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
	{{-- my js --}}
	<script src="{{ asset('assets/js/myjs.js') }}"></script>


@endpush
