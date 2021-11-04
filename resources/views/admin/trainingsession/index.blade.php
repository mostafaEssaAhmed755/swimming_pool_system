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
                        <div class="page-title">كل الجلسات</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                href="{{ route('home') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">الجلسات</li>
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
                                                <header>تحضيرات جلسات اليوم</header>

                                            </div>
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-6">
                                                        <div class="btn-group pull-right">
                                                            <a href="{{ route('preparingsession.create') }}" id="addRow"
                                                                class="btn btn-info">
                                                                تحضير  جلسه  <i class="fa fa-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                             
                                                </div>
                                                <div class="table-scrollable">
                                                    <table
                                                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                                        id="Preparingsession">
                                                        <thead>
                                                          
                                                            <tr>
                                                                <th> اسم التمرين </th>
                                                                <th> اسم المدرب </th>
                                                                <th> موعد التمرين خلال هذا اليوم</th>
                                                                <th>عدد المتدربين الحاضرين</th>
                                                                <th> اجراءات </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($preparingsessions as $preparingsession)
                                                             <tr class="odd gradeX" onclick="window.location.href = '{{ route('preparingsession.show',$preparingsession->id) }}'"> 
                                                                <td>{{ $preparingsession->gymnastic->name }}</td>
                                                                <td class="left">{{ $preparingsession->coach->name }}</td>
                                                                <td class="left">{{ 'من ' .date('h:i a' , strtotime($preparingsession->trainingdate->from)) . ' الى ' . date('h:i a' , strtotime($preparingsession->trainingdate->to))}}</td>
                                                                <td class="left">{{ count($preparingsession->students) }}</td>
                                                                <td>
                                                                      <!--
                                                                        <a href="#"
                                                                        class="btn btn-success btn-xs">
                                                                        اضافه متدرب
                                                                    </a> -->
                                                                    <a href="{{ route('preparingsession.edit',$preparingsession->id) }}"
                                                                        class="btn btn-primary btn-xs">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>
                                                                    <form action="{{ route('preparingsession.destroy', $preparingsession->id) }}" method="post" style="display: inline-block">
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        <button type="submit" class="btn btn-danger btn-xs" onClick="return confirm('هل انت متأكد من حذف تحضير الجلسه ؟')">
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
                                    <div class="col-md-12">
                                        <div class="card card-box">
                                            <div class="card-head">
                                                <header>كل الجلسات</header>

                                            </div>
                                            <div class="card-body ">
                                                <div class="row">
                                             
                                             
                                                </div>
                                                <div class="table-scrollable">
                                                    <table
                                                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                                        id="Trainingsession">
                                                        <thead>
                                                          
                                                            <tr>
                                                                <th> اسم التمرين </th>
                                                                <th> اسم المدرب </th>
                                                                <th> موعد التمرين </th>
                                                                <th>عدد المتدربين</th>
                                                                <th>الحاله</th>
                                                                <th> اجراءات </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($trainingsessions as $trainingsession)
                                                            <tr class="odd gradeX" onclick="window.location.href = '{{ route('trainingsession.show',$trainingsession->id) }}'">
                                                                <td>{{ $trainingsession->gymnastic->name }}</td>
                                                                <td class="left">{{ $trainingsession->coach->name }}</td>
                                                                <td class="left">{{ ' من ' . date("g:i a", strtotime($trainingsession->trainingdate->from)) . ' الي ' . date("g:i a", strtotime($trainingsession->trainingdate->to)) }}</td>
                                                                <td class="left">{{$trainingsession->students->count() }}</td>
                                                                <td class="left">
                                                                    @if ($trainingsession->status == 1)
                                                                    <span class="label label-sm label-success"> مفتوحه الان </span>

                                                                    @elseif(!$trainingsession->status)
                                                                    <span class="label label-sm label-warning "> مغلقه الان </span>

                                                                    @elseif($trainingsession->status == 3)
                                                                    <span class="label label-sm label-danger "> منتهيه </span>

                                                                    @endif
                                                                </td>
                                                                
                                                                <td>
                                                                    {{-- <a href="{{ route('trainingsession.edit',$trainingsession->id) }}"
                                                                        class="btn btn-primary btn-xs">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a> --}}
                                                                    <form action="{{ route('trainingsession.destroy', $trainingsession->id) }}" method="post" style="display: inline-block">
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        <button type="submit" class="btn btn-danger btn-xs" onClick="return confirm('هل انت متأكد من حذف اعداد الجلسه ؟')">
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