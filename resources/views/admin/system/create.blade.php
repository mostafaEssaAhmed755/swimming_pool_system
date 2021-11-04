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
								<div class="page-title">Add System</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="{{ route('home') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">System</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add System</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Basic Information</header>
								</div>
									<form class="card-body row" action="{{ route('system.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
									@csrf
                                   
                                    <div class="col-lg-6 p-t-20">
                                        <label for="type" class="form-label">Type</label>
                                        <div class="input-group has-validation ">
                                            <select class="form-control @error('gender') {{ 'is-invalid' }} @enderror" id="type"  name="type" required>
                                                <option value="1">Monthly </option>
                                                <option value="2">Quarterly </option>
                                                <option value="3">midterm </option>
                                                <option value="4">annual</option>

                                            </select>
                                            @error('type')
											<span class="invalid-feedback">{{ $message }}</span>
											@enderror
                                        
                                        </div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width @error('quantity') {{ 'is-invalid' }} @enderror">
											<input class="mdl-textfield__input" type="text" id="quantity"
											 name="quantity" value="{{ old('quantity') }}" pattern="^[0-9]+$">
											<label class="mdl-textfield__label">Quantity</label>
											@error('quantity')
												<span class="mdl-textfield__error">{{ $message }}</span>
											@enderror
										</div>
									</div>
                                    <div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width @error('price')
											{{ 'is-invalid' }}
										@enderror">
											<input class="mdl-textfield__input" type="text" id="price" pattern="^[0-9]+$"
											 name="price" value="{{ old('price') }}">
											<label class="mdl-textfield__label">Price</label>
											@error('price')
												<span class="mdl-textfield__error">{{ $message }}</span>
											@enderror
										</div>
									</div>


									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
										<a href="{{ route('system.index') }}" type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</a>
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
