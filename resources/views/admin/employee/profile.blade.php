@extends('layouts.admin')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">ملف الموظف</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{ route('home') }}">الرئيسيه</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{ route('employee.index') }}">الموظفين</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">ملف الموظف</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PROFILE SIDEBAR -->
                <div class="profile-sidebar">
                    <div class="card card-topline-aqua">
                        <div class="card-body no-padding height-9">
                            <div class="row">

                                <div class="profile-userpic">
                                    <form id="formDate" method="POST" enctype="multipart/form-data" action="{{ route('employee.uploadImg',$employee->id) }}"style="display: none;">
                                        @csrf
                                        @method('PUT')
                                        <input type="file" id="inputImg"  accept="image/*" name="img">
                                    </form>
                                    
                                    <div  class="img-responsive curser-pointer"  title="اضغط لتغيير الصوره" id="eleClicked">
                                        <?php  $employee->image? $img = $employee->image: $img = 'employees/defualt.jpg' ?>
                                        <img src="{{ asset('public/storage/'.$img.'')}}" class="profileImg">
                                    </div>

                            
                                </div>
                            </div>

                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name">{{ $employee->name }}</div>
                            </div>
                            

                            <ul class="list-group list-group-unbordered">

                                <li class="list-group-item">
                                    <b class="pull-right">رقم البطاقه</b> <a class="pull-left">{{ $employee->identification  }}</a>
                                </li>
                                {{-- <li class="list-group-item">
                                    <b class="pull-right">الباركود</b> <a class="pull-left" style="background-color: #b7b7b7b3;padding: 5px;">{{ $employee->uid  }}</a>
                                </li> --}}
                            </ul>
                            <!-- END SIDEBAR USER TITLE -->
                            <!-- SIDEBAR BUTTONS -->
                            <div class="profile-userbuttons">
                                {{-- <button type="button"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10  btn-primary btn-block">اطبع الكارنيه</button> --}}
                                <a href="{{ route('employee.edit',$employee->id) }}" style="text-transform: uppercase;font-size: 11px;font-weight: 600;"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10  btn-pink btn-block">تعديل الملف</a>
                                <a href="{{ route('employee.discount',$employee->id) }}" style="text-transform: uppercase;font-size: 11px;font-weight: 600;"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10  btn-warning btn-block"
                                    data-toggle="modal" data-target="#add_fee_modal"> اضافه خصم</a>
                                    <a href="{{ route('employee.discount',$employee->id) }}" id="show_fine" data-id="{{ $employee->id }}"
                                         data-toggle="modal" data-target="#show_fee_modal" 
                                        style="text-transform: uppercase;font-size: 11px;font-weight: 600;"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10  btn-info btn-block"> عرض اجمالى الخصومات</a>
                                <a href="{{ route('employee.discount',$employee->id) }}" style="text-transform: uppercase;font-size: 11px;font-weight: 600;"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10  btn-success btn-block"
                                    data-toggle="modal" data-target="#add_salary_modal" 
                                    > صرف الراتب الشهري </a>
                            </div>
                            <!-- END SIDEBAR BUTTONS -->
                        </div>
                    </div>
                    
                </div>
           
                <!-- END BEGIN PROFILE SIDEBAR -->
                <!-- BEGIN PROFILE CONTENT -->
                <div class="profile-content">
                    <div class="row">
                        <div class="card col-lg-12">
                            <div class="card-topline-aqua">
                                <header></header>
                            </div>
                            <div class="white-box">

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active fontawesome-demo">
                                        <div id="biography">
                                            <div class="row">
                                                <div class="col-md-3 col-6 b-r"> <strong>اسم الموظف</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $employee->name }}</p>
                                                </div>
                                                <div class="col-md-3 col-6 b-r"> <strong>رقم الموبايل</strong>
                                                    <br>
                                                    <p class="text-muted"><a href="tel:{{ $employee->mobile_1 }}">{{ $employee->mobile_1 }}</a></p>
                                                </div>
                                                <div class="col-md-3 col-6 b-r"> <strong>الراتب</strong>
                                                    <br>
                                                    <p class="text-muted">{{$employee->salary}}</p>
                                                </div>
                                                {{-- <div class="col-md-3 col-6"> <strong>الخصم</strong>
                                                    <br>
                                                    <p class="text-muted">{{$employee->salary}}</p>
                                                </div> --}}
                                            </div>
                                            <hr>
                                            <br>
                                            <h4 class="font-bold">معلومات اساسيه</h4>
                                            <hr>
                                            <ul>
                                                <li> تاريخ التعيين : {{ $employee->joinDate }}</li>
                                                <li> الراتب : {{ $employee->salary }}</li>
                                                <li>الوظيفه : {{ $employee->job->name }}</li>
                                            </ul>
                                            <br>
                                            <h4 class="font-bold">بيانات التواصل</h4>
                                            <hr>
                                            <ul>
                                                <li>الرقم الاول : {{ $employee->mobile_1 }}</li>
                                                <li>الرقم الثاني : {{ $employee->mobile_2 }}</li>
                                                <li>العنوان : {{ $employee->adress }}</li>
                                            </ul>
                                     
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>تقرير صرف راتب الموظف</header>
                                </div>
                                <div class="card-body " id="bar-parent">
                                    <table id="exportTable" class="display nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>المبلغ</th>
                                                <th>التاريخ</th>
                                                <th>الخصم</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>10000</td>
                                                <td>8-2021</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>9500</td>
                                                <td>7-2021</td>
                                                <td>500</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>المبلغ</th>
                                                <th>التاريخ</th>
                                                <th>الخصم</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>تقرير حضور الموظف</header>
                                </div>
                                <div class="card-body " id="bar-parent">
                                    <table id="exportTable1" class="display nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>التاريخ</th>
                                                <th>الحضور</th>
                                                <th>موعد الحضور</th>
                                                <th>موعد الانصراف</th>
                                                <th>الملاحظات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($attendances as $attendance)
                                                <tr>
                                                    <td>{{ $attendance->attendance_date }}</td>
                                                    <td>{{ $attendance->attendance == 'present' ? 'حاضر' : 'غائب'}}</td>
                                                    <td>{{ $attendance->attendance_time != '' ? $attendance->attendance_time : 'غير مسجل'}}</td>
                                                    <td>{{ $attendance->leave_time != '' ? $attendance->leave_time : 'غير مسجل'}}</td>
                                                    <td>{{ $attendance->note !='' ? $attendance->note :'غير مسجل'  }}</td>
                                                </tr>
                                            @endforeach
                                        
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>التاريخ</th>
                                                <th>الحضور</th>
                                                <th>موعد الحضور</th>
                                                <th>موعد الانصراف</th>
                                                <th>الملاحظات</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>تقرير صرف رواتب الموظف</header>
                                </div>
                                <div class="card-body " id="bar-parent">
                                    <table id="exportTable2" class="display nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>السنة</th>
                                                <th>الشهر</th>
                                                <th>المبلغ المصروف</th>
                                                <th>الملاحظات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($salaries as $salary)
                                                <tr>
                                                    <td>{{ $salary->year }}</td>
                                                    <td>{{ $salary->month }}</td>
                                                    <td>{{ $salary->salary}}</td>
                                                    <td>{{ $salary->note !='' ? $salary->note :'غير مسجل'  }}</td>
                                                </tr>
                                            @endforeach
                                        
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>السنة</th>
                                                <th>الشهر</th>
                                                <th>المبلغ المصروف</th>
                                                <th>الملاحظات</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
                <!-- END PROFILE CONTENT -->
                {{-- salary table --}}
                
            </div>
        </div>
    </div>
    <!-- end page content -->
    <!-- start chat sidebar -->

</div>
@include('admin.employee.modals.add_fine')
@include('admin.employee.modals.show_fine')
@include('admin.employee.modals.salary')
@endsection
@push('styles')
<link href="{{ asset('assets/css/mystyle.css')}}" rel="stylesheet" type="text/css" />

    <!-- icons -->
	<link href="{{ asset('assets/fonts/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/fonts/material-design-icons/material-icon.css')}}" rel="stylesheet" type="text/css" />
	<!-- Data Tables -->
	<link href="../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet"
		type="text/css" />
	<link href="../assets/plugins/datatables/export/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/toastr/toastr.css')}}" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
<script src="{{ asset('assets/plugins/html2canvas/html2canvas.js') }}" charset="utf-8"></script>
<script src="{{ asset('assets/plugins/html2canvas/html2canvas.min.js') }}" charset="utf-8"></script>

	<!-- Data Table -->
	<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
	<script src="../assets/plugins/datatables/export/dataTables.buttons.min.js"></script>
	<script src="../assets/plugins/datatables/export/buttons.flash.min.js"></script>
	<script src="../assets/plugins/datatables/export/jszip.min.js"></script>
	<script src="../assets/plugins/datatables/export/pdfmake.min.js"></script>
	<script src="../assets/plugins/datatables/export/vfs_fonts.js"></script>
	<script src="../assets/plugins/datatables/export/buttons.html5.min.js"></script>
	<script src="../assets/plugins/datatables/export/buttons.print.min.js"></script>
	<script src="../assets/js/pages/table/table_data.js"></script>
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js')}}"></script>
    @include('admin.employee.script.add_fine')
    @include('admin.employee.script.show_fine')
    @include('admin.employee.script.salary')
<script>

$('#exportTable1').DataTable();
$('#exportTable2').DataTable();
</script>
<script src="{{ asset('assets/js/myjs.js') }}"></script>

@endpush