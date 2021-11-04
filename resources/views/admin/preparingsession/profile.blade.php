@extends('layouts.admin')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        @if (Session::has('success'))
        <div class="alert alert-info alert_box_message pull-right">
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
                    <div class="page-title">ملف المشترك</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{ route('home') }}">الرئيسيه</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{ route('trainingsession.index') }}">الجلسات</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">المتدربين الحاضرين</li>
                </ol>
            </div>
        </div>
        <div class="profile-content">
            <div class="row">
                <div class="card col-lg-12">
                    <div class="card-topline-aqua">
                        <header></header>
                        <div class="white-box">
    
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active fontawesome-demo">
                                    <div id="biography">
                                        <div class="row">

                                            <div class="col-md-3 col-6 b-r"> <strong>اسم التمرين</strong>
                                                <br>
                                                <p class="text-muted">{{ $preparingsession->gymnastic->name }}</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r"> <strong>اسم المدرب</strong>
                                                <br>
                                                <p class="text-muted">{{  $preparingsession->coach->name }}</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r"> <strong>موعد التمرين خلال هذا اليوم</strong>
                                                <br>
                                                <p class="text-muted">{{'من ' .date('h:i a' , strtotime($preparingsession->trainingdate->from)) . ' الى ' . date('h:i a' , strtotime($preparingsession->trainingdate->to))}}</p>
                                            </div>
                                            <div class="col-md-3 col-6"> <strong>عدد المتدربين الحاضرين</strong>
                                                <br>
                                                <p class="text-muted">{{ count($preparingsession->students) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane active fontawesome-demo" id="tab1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-box">
                                                    <div class="card-body ">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-6 col-6">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text pull-right btn-success" >فحص باركود المتدرب</span>
                                                                      </div>
                                                                      <input type="hidden" id="preparingsessionID" value="{{ $preparingsession->id }}">                                                                  
                                                                </div>
                                                            </div>
                                                     
                                                        </div>
                                                        <div class="table-scrollable">
                                                            <table
                                                                class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                                                id="Preparingsession">
                                                                <thead>
                                                                  
                                                                    <tr>
                                                                        <th> اسم المتدرب </th>
                                                                        <th>  رقم الباركود </th>
                                                                        <th> اجراءات </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($preparingsession->students as $student)
                                                                     <tr class="odd gradeX" onclick="window.location.href = '{{ route('student.show',$student->id) }}'"> 
                                                                        <td>{{ $student->name }}</td>
                                                                        <td class="left">{{ $student->uid }}</td>
                                                                        <td>
                                                                            <form action="{{ route('preparingsession.destroyStudent',$preparingsession->id) }}" method="post" style="display: inline-block">
                                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                <input type="hidden" name="_method" value="DELETE">
                                                                                <input type="hidden" name="student_id" value="{{$student->id}}">

                                                                                <button type="submit" class="btn btn-danger btn-xs" onClick="return confirm('هل انت متأكد من ازاله المتدرب من  الجلسه ؟')">
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
        </div>
      
    </div>
</div>
    <!-- end page content -->
    <!-- start chat sidebar -->

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
    <script src="{{ asset('assets/plugins/html2canvas/html2canvas.js') }}" charset="utf-8"></script>
    <script src="{{ asset('assets/plugins/html2canvas/html2canvas.min.js') }}" charset="utf-8"></script>
    <!-- data tables -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/js/pages/table/table_data.js')}}"></script>
    {{-- my js --}}
    <script src="{{ asset('assets/js/myjs.js') }}"></script>
    <script>
        
    // 	html2canvas(document.querySelector('.print_card_member_ship')).then(canvas => {
    // 	document.body.appendChild(canvas)
    // });

    </script>
@endpush