@extends('layouts.admin')


@section('content')

 <!-- start page content -->
 <div class="page-content-wrapper">
      
    <div class="page-content">
        <div class="card">
            <div class="card-header" style="padding: 22px 30px 0 0 !important;text-align:right">
                <h4 class="card-title">تسجيل الصلاحيات</h4>
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
                            <div class="pull-left">
                                <h2>الصلاحيات</h2>
                            </div>
                            <br>
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('roles.create') }}">اضافة صلاحية جديدة</a>
                            </div>
                        </div>
                    </div>
                    
                    
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
    
                    <table class="table table-bordered" style="text-align: center">
                      <tr>
                         <th>الرقم</th>
                         <th>الاسم</th>
                         <th width="280px">الاعدادت</th>
                      </tr>
                        @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">عرض</a>
                               
                                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">تعديل</a>

                                    <a class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$key}}" >حذف</a>
                                    <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">حذف صلاحية</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    حذف هذه الصلاحية ؟
                                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}  
                                                {!! Form::close() !!}                                              
                                            
                                            </div>
                                            </div>
                                            </div>
                                        </div> 
                               
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    
                    
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
	
	<script src="../assets/plugins/datatables/export/dataTables.buttons.min.js"></script>
	<script src="../assets/plugins/datatables/export/buttons.flash.min.js"></script>
	<script src="../assets/plugins/datatables/export/jszip.min.js"></script>
	<script src="../assets/plugins/datatables/export/pdfmake.min.js"></script>
	<script src="../assets/plugins/datatables/export/vfs_fonts.js"></script>
	<script src="../assets/plugins/datatables/export/buttons.html5.min.js"></script>
	<script src="../assets/plugins/datatables/export/buttons.print.min.js"></script>
	<script src="../assets/js/pages/table/table_data.js"></script>
    <script>
        $('#exportTable1').DataTable();
    </script>
@endpush