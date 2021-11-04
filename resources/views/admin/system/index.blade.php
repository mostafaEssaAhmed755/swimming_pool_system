@extends('layouts.admin')
@section('content')
    <!-- start page content -->
    <div class="page-content-wrapper">
            @if (Session::has('success'))
            <div class="alert alert-info alert_box_message ">{{ Session::get('success') }}</div>
            @endif
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">كل انظمه الاشتراك</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                href="{{ route('home') }}">الرئيسيه</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">أنظمه الاشتراك</i>
                        </li>
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
                                                <header>قائمه أنظمه الاشتراك</header>
                                            </div>
                                            <div class="card-body ">
                                                {{-- <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-6">
                                                        <div class="btn-group">
                                                            <a href="{{ route('system.create') }}" id="addRow"
                                                                class="btn btn-info">
                                                                Add New <i class="fa fa-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                             
                                                </div> --}}
                                                <div class="table-scrollable">
                                                    <table
                                                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                                        id="example4">
                                                        <thead>
                                                          
                                                            <tr>
                                                                <th> نوع النظام </th>
                                                                <th> عدد الحصص </th>
                                                                <th> سعر الاشتراك </th>
                                                                <th> حاله النظام </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($systems as $system)
                                                            <tr class="odd gradeX" >
                                                                <td class="left">{{ $system->type }}</td>
                                                                <td>{{ $system->quantity }}</td>
                                                                <td class="left">{{ $system->price	 }}</td>
                                                                <td>
                                                                    <a href="{{ route('system.edit',$system->id) }}"
                                                                        class="btn btn-primary btn-xs">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>
                                                                    {{-- <form action="{{ route('system.destroy', $system->id) }}" method="post" style="display: inline-block">
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        <button type="submit" class="btn btn-danger btn-xs">
                                                                            <i class="fa fa-trash-o "></i>
                                                                        </button>
                                                                        </form> --}}
                                                                        <form  action="{{ route('system.active',$system->id) }}" method="POST" enctype="application/x-www-form-urlencoded" style="display: inline-block">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            @if ($system->active)
                                                                            <button type="submit" class="btn btn-warning btn-xs">ايقاف</button>
                                                                            @else
                                                                            <button type="submit" class="btn btn-success btn-xs">تشغيل</button>
                                                                            @endif
                                                                            
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