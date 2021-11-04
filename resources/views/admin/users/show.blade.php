@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper"> 
    <div class="page-content">
        <div class="card"  style="direction: rtl;text-align: right;">
            <div class="card-header" style="padding: 22px 30px 0 0 !important;text-align:right">
                <h4 class="card-title">عرض المستخدم</h4>
                <a class="heading-elements-toggle">
                    <i class="bx bx-dots-vertical font-medium-3"></i>
                </a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            <a data-action="collapse">
                                <i class="bx bx-chevron-down"></i>
                            </a>
                        </li>
                        <li>
                            <a data-action="expand">
                                <i class="bx bx-fullscreen"></i>
                            </a>
                        </li>
                        <li>
                            <a data-action="reload">
                                <i class="bx bx-revision"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <h2>عرض المستخدم</h2>
        </div>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> عودة</a>
        </div>
    </div>
</div>


<div class="row" style="text-align: right">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>الاسم :</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>الايميل:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>الصلاحيات:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
                    
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
    <!-- data tables -->
    <link href="../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />
    <link href="../assets/plugins/datatables/export/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/plugins/time/jquery.timepicker.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/plugins/toastr/toastr.css')}}" rel="stylesheet" type="text/css" />
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
    <!-- Data Table -->
@endpush