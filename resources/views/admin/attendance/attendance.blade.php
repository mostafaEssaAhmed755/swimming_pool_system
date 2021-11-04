@extends('layouts.admin')
@section('content')
    <!-- start page content -->
    <div class="page-content-wrapper">
      
        <div class="page-content">
            @if (Session::has('success'))
            <div class="alert alert-info alert_box_message">
                {{ Session::get('success') }}
            </div>
            @endif
            @if (\Session::has('error'))
            <div class="alert alert-danger  alert_box_message">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
            @endif
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">كل الموظفين</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                href="{{ route('home') }}">الرئيسيه</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li  class="active">الموظفين</li>
                 
                    </ol>
                </div>
            </div>
            @include('admin.attendance.components.include.index')
        </div>
    </div>
    <!-- end page content -->
</div>
@endsection
@push('styles')
    {{--my style  --}}
    <link rel="stylesheet" href="{{ asset('assets/css/mystyle.css') }}">
    <!-- icons -->
	<link href="{{ asset('assets/fonts/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/fonts/material-design-icons/material-icon.css')}}" rel="stylesheet" type="text/css" />
    <!-- data tables -->
	<link href="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/plugins/time/jquery.timepicker.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/plugins/toastr/toastr.css')}}" rel="stylesheet" type="text/css" />
    @include('admin.attendance.components.extends.style')
@endpush
@push('scripts')
	{{-- my js --}}
	<script src="{{ asset('assets/js/myjs.js') }}"></script>
    <!-- data tables -->
	<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/datapicker/datepicker.js')}}"></script>
	<script src="{{ asset('assets/plugins/datapicker/datepicker.ar-AE.js')}}"></script>
	<script src="{{ asset('assets/plugins/time/jquery.timepicker.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/toastr/toastr.min.js')}}"></script>
	<script src="{{ asset('assets/js/pages/table/table_data.js')}}"></script>

    @include('admin.attendance.components.extends.script')

@endpush