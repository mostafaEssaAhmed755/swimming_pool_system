@extends("layouts.admin")
@section("content")
<div class="page-content-wrapper">
    @if (\Session::has('error'))
    <div class="alert alert-danger  alert_box_message">
        <ul>
            <li>{!! \Session::get('error') !!}</li>
        </ul>
    </div>
    @endif
    @if (Session::has('success'))
    <div class="alert alert-info alert_box_message">
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">لوحه التحكم</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li class="active"><i class="fa fa-home"></i>الرئيسيه</li>
                </ol>
            </div>
        </div>
        <!-- start widget -->
        <div class="state-overview">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-green">
                        <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">اجمالي المشتركين</span>
                            <span class="info-box-number">{{ $students->count() }}</span>
                            <div class="progress">
                                <div class="progress-bar" style="width:90%"></div>
                            </div>
                        
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-yellow">
                        <span class="info-box-icon push-bottom"><i class="material-icons">fitness_center</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">اجمالى التمارين</span>
                            <span class="info-box-number">{{ $gymnastics->count() }}</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 40%"></div>
                            </div>
                     
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-blue">
                        <span class="info-box-icon push-bottom"><i class="material-icons">person</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">اجمالى المدربين</span>
                            <span class="info-box-number">{{ $coachs->count() }}</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 85%"></div>
                            </div>
             
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-pink">
                        <span class="info-box-icon push-bottom"><i
                                class="material-icons">confirmation_number</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">اجمالى الزوار خلال اليوم </span>
                            <span class="info-box-number">{{ $tickets }}</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 40%"></div>
                            </div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- end widget -->
        <div class="row">
            <div class="col-md-4">
                <div class="card card-box">
                    <div class="card-head card-topline-aqua" >
                        <header> التذاكر<span class="label label-rouded label-menu label-warning">{{$tickets}}</span></header>
                        <div class="tools">
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body row text-center">
                        @csrf
                        <div class="col-md-12 ">
                            <div  id="ticket">
                                <table style="text-align: right;">
                                    <tr>
                                        <th> رقم التذكره : </th>
                                        <td>{{ $tickets  + 1 }}</td>
                                    </tr>
                                    <tr>
                                        <th> تاريخ الاستخدام : </th>
                                        <td>{{ date('Y-m-d') }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><svg id="barcodeOutput"></svg></td>
                                    </tr>
                                </table>
                            </div>
                            <button id="printButton"  class="btn btn-primary  btn-lg m-b-10">قطع تذكره جديده</button>
                            <hr class="Or">
                        </div> 
                        <div class="col-lg-12 ">
                        <form action="{{ route('ticket.checkifExists') }}" method="POST" enctype="application/x-www-form-urlencoded">
                            @csrf
                            <div
                                class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width @error('uid')
                                    {{ 'is-invalid' }}
                                @enderror">
                                <input class="mdl-textfield__input" type="text" 
                                name="uid" value="" id="barcodeInput">
                                <label class="mdl-textfield__label">رقم الباركود</label>
                                @error('uid')
                                    <span class="mdl-textfield__error">{{ $message }}</span>
                                @enderror

                            </div>
                            <button type="submit"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink ">تسجيل دخول متدرب</button>
                        </form>
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

@endpush
@push('scripts')
<!-- bootstrap -->
<script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.js')}}"></script>
<script src="{{ asset('assets/js/pages/sparkline/sparkline-data.js')}}"></script>
{{-- jsbarcode --}}
<script src="{{ asset('assets/plugins/JsBarcode/JsBarcode.all.min.js')}}"></script>
<script src="{{ asset('assets/plugins/JsBarcode/onscan.min.js') }}"></script>

{{-- my js --}}
<script src="{{ asset('assets/js/myjs.js') }}"></script>

<script>
    

</script>
@endpush
