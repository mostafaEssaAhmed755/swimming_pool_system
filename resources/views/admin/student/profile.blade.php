@extends('layouts.admin')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">ملف المشترك</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{ route('home') }}">الرئيسيه</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{ route('student.index') }}">المشتركين</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">ملف المشترك</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PROFILE SIDEBAR -->
                <div class="profile-sidebar" >
                    <div class="card card-topline-aqua">
                        <div class="card-body no-padding height-9">
                            <div class="row">
                                <div class="profile-userpic">
                                    <form id="formDate" method="POST" enctype="multipart/form-data" action="{{ route('student.uploadImg',$student->id) }}"style="display: none;">
                                        @csrf
                                        @method('PUT')
                                        <input type="file" id="inputImg"  accept="image/*" name="img">
                                    </form>
                                    
                                    <div  class="img-responsive curser-pointer"  title="اضغط لتغيير الصوره" id="eleClicked">
                                        <?php  $student->image? $img = $student->image: $img = 'students/defualt.jpg' ?>
                                        <img src="{{ asset('public/storage/'.$img.'')}}" class="profileImg">
                                    </div>
                                </div>
                            </div>
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name">{{ $student->name }} </div>
                            </div>
                            
                            <div class="work-monitor work-progress">
                                <div class="states" style="width: 100%">
                                    <div class="info">
                                        <div class="desc pull-right">الحصص المتبقيه</div>

                                        <div class="percent pull-left">{{ $curentPoint .' من '. $totalPoint }}</div>
                                    </div>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger  progress-bar-striped active"
                                            role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                            aria-valuemax="100" style="width: {{ $curentPoint/$totalPoint*100 }}%;">
                                            <span class="sr-only">{{ $curentPoint/$totalPoint*100 }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="states" style="width: 100%">
                                    <div class="info">
                                        <div class="desc pull-right">الايام  المتبقيه</div>

                                        <div class="percent pull-left">{{ $total->days .' من '. $curent->days }}</div>
                                    </div>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-success progress-bar-striped active"
                                            role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                            aria-valuemax="100" style="width: {{   $total->days? $curent->days/$total->days*100:0 }}%;">
                                            <span class="sr-only">{{  $total->days? $curent->days/$total->days*100:0 }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-unbordered p-0">
                                <li class="list-group-item">
                                    <b class="pull-right">نظام الاشتراك</b> <a class="pull-left">{{ getSystemName($student->system->type)  }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b class="pull-right">التدريب</b> <a class="pull-left">{{ $student->gymnastic->name  }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b class="pull-right">رقم البطاقه</b> <a class="pull-left">{{ $student->identification  }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b class="pull-right">الباركود</b> <a class="pull-left" style="background-color: #b7b7b7b3;padding: 5px;">{{ $student->uid  }}</a>
                                </li>
                            </ul>
                            <!-- END SIDEBAR USER TITLE -->
                            <!-- SIDEBAR BUTTONS -->
                            <div class="profile-userbuttons">
                                <button onclick="window.print()"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-primary">اطبع الكارنيه</button>
                                <a href="{{ route('student.edit',$student->id) }}" style="text-transform: uppercase;font-size: 11px;font-weight: 600;"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-pink">تعديل الملف</a>
                                <a href="{{ route('student.renewalCreate',$student->id) }}" style="text-transform: uppercase;font-size: 11px;font-weight: 600;"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-success">تجديد الاشتراك</a>
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
                                                <div class="col-md-3 col-6 b-r"> <strong>اسم المشترك</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $student->name }}</p>
                                                </div>
                                                <div class="col-md-3 col-6 b-r"> <strong>رقم الموبايل</strong>
                                                    <br>
                                                    <p class="text-muted"><a href="tel:{{ $student->mobile }}">{{ $student->mobile }}</a></p>
                                                </div>
                                                <div class="col-md-3 col-6 b-r"> <strong>تاريخ الانضمام</strong>
                                                    <br>
                                                    <p class="text-muted">{{date('d-m-Y', strtotime($student->created_at))}}</p>
                                                </div>
                                                <div class="col-md-3 col-6"> <strong>تاريخ انتهاء الاشتراك</strong>
                                                    <br>
                                                    <p class="text-muted">{{date('d-m-Y', strtotime($student->expire))}}</p>
                                                </div>
                                            </div>
                                            <hr>
                                            
                                            <br>
                                            <h4 class="font-bold">معلومات اساسيه</h4>
                                            <hr>
                                            <ul>
                                                <li>السن : {{ $student->age }}</li>
                                                <li>النوع : {{ $student->gender }}</li>
                                                <li>العنوان : {{ $student->adress }}</li>

                                            </ul>
                                            <br>
                                            <h4 class="font-bold">بيانات ولى الامر</h4>
                                            <hr>
                                            <ul>
                                                <li>اسم ولى الامر : {{ $student->parentNam }}</li>
                                                <li>رقم موبايل ولى الامر : <a href="tel:{{ $student->parentNum }}">{{ $student->parentNum }}</a></li>
                                            </ul>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- END PROFILE CONTENT -->

            </div>
            <input type="hidden" value="{{ $student->uid }}" id="barcodeInput">
            <div class="card col-md-8 print_card_member_ship">
                <div class="card-body no-padding height-9">
                    <div class="row">
                        <div class="col-lg-12 col-md-12"><p class="text-center" style="text-align: right">كارنيه عضويه بنادي <em> Egy Swim</em></p></div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-8 col-md-8">
                            <ul class="list-group list-group-unbordered p-0 ">
                                <li class="list-group-item">
                                    <b class="pull-right">اسم المشترك</b> <a class="pull-left">{{ $student->name  }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b class="pull-right">السن</b> <a class="pull-left" >{{ $student->age  }}</a>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <b class="pull-right">تاريخ الاشتراك : <span class="ml-2">{{ date('Y-m-d',strtotime($student->created_at))  }}</span></b>
                                        </div>
                                        <div class="col-md-6 ">
                                           <b class="pull-right"> تاريخ الانتهاء : <span class="ml-2">{{ date('Y-m-d',strtotime($student->expire))  }}</span></b> 
                                        </div>
                                    </div>
                                     
                                </li>
                                <li class="list-group-item">
                                    <b class="pull-right">رقم الهاتف</b> <a class="pull-left" >{{ $student->mobile  }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="profile-userpic col-lg-4 col-md-4 ">
                            <div  class="img-responsive pull-left" >
                                <?php  $student->image? $img = $student->image: $img = 'students/defualt.jpg' ?>
                                <img src="{{ asset('public/storage/'.$img.'')}}"  alt="" style="border-radius: unset;margin: unset;width:150px;height:150px">
                            </div>
                        
                            
                        </div>
                        <div class="col-lg-12 col-md-12 pt-3 text-center">
                            <svg class="barcode"
                                jsbarcode-format="EAN13"
                                jsbarcode-width="3"
                                jsbarcode-height="30"
                                jsbarcode-fontSize="15"
                                jsbarcode-value="123456789012"
                                jsbarcode-textmargin="0"
                                jsbarcode-fontoptions="bold">
                                </svg>
                        </div>
                    </div>
                    
                    
                    
                    
                    <!-- END SIDEBAR USER TITLE -->
                
                </div>
            </div>
            
        </div>
    </div>
    <!-- end page content -->
    <!-- start chat sidebar -->

</div>
@endsection
@push('styles')
    <link href="{{ asset('assets/css/mystyle.css')}}" rel="stylesheet" type="text/css" />

    <!-- icons -->
	<link href="{{ asset('assets/fonts/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/fonts/material-design-icons/material-icon.css')}}" rel="stylesheet" type="text/css" />


@endpush
@push('scripts')
<script src="{{ asset('assets/plugins/html2canvas/html2canvas.js') }}" charset="utf-8"></script>
<script src="{{ asset('assets/plugins/html2canvas/html2canvas.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('assets/plugins/JsBarcode/JsBarcode.all.min.js') }}" charset="utf-8"></script>

<script src="{{ asset('assets/js/myjs.js') }}" charset="utf-8"></script>

<script>
    
// 	html2canvas(document.querySelector('.print_card_member_ship')).then(canvas => {
// 	document.body.appendChild(canvas)
// });

</script>
@endpush