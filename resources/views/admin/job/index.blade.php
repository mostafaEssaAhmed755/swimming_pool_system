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
            <div class="alert alert-danger  alert_box_message pull-right">
                {!! \Session::get('error') !!}
            </div>
            @endif
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">كل الوظائف</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                href="{{ route('home') }}">الرئيسيه</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li  class="active">الوظائف</i>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable-line">
                        <div class="tab-content">
                            <div class="tab-pane active fontawesome-demo" id="tab1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-box">
                                            <div class="card-head">
                                                <header>كل الوظائف</header>

                                            </div>
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-6">
                                                        <div class="btn-group pull-right">
                                                            <a href="{{ route('job.create') }}" id="addRow"
                                                                class="btn btn-info">
                                                                أضافه وظيفه <i class="fa fa-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                             
                                                </div>
                                                <div class="table-scrollable">
                                                    <table
                                                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                                        id="example4">
                                                        <thead>
                                                          
                                                            <tr>
                                                                <th> الاسم </th>
                                                                <th> عدد الموظفين</th>
                                                                <th> تمت الاضافة بواسطة</th>
                                                                <th> اجراءات </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                    
                                                            @foreach ($jobs as $job)
                                                            <tr class="odd gradeX">
                                                        
                                                                <td>{{ $job->name }}</td>
                                                                <td class="left">{{ $job->employees()->count() }}</td>
                                                                @php
                                                                    $username = App\User::find($job->user_id);
                                                                    if($username)
                                                                   {
                                                                     $username = $username->name != '' ?  $username->name : '' ;
                                                                   } 
                                                                @endphp
                                                             <td class="left">{{ $username }}</td>

                                                             
                                                                <td>
                                                                    <a href="{{ route('job.edit',$job->id) }}"
                                                                        class="btn btn-primary btn-xs">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>
                                                                    <form action="{{ route('job.destroy', $job->id) }}" method="post" style="display: inline-block">
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        <button type="submit" class="btn btn-danger btn-xs" onClick="return confirm('هل انت متأكد من حذف هذه الوظيفه؟')">
                                                                            <i class="fa fa-trash-o "></i>
                                                                        </button>
                                                                        </form>
                                                                
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                       
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
	<link href="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
    type="text/css" />

@endpush
@push('scripts')
	{{-- my js --}}
	<script src="{{ asset('assets/js/myjs.js') }}"></script>
    <!-- data tables -->
	<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{ asset('assets/js/pages/table/table_data.js')}}"></script>

@endpush