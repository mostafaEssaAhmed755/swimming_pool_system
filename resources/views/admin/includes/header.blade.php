<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <!-- logo start -->
        <div class="page-logo" style="padding-left:30px">
            <a href="{{ route('home') }}">
                <span class="logo-default">{{ config('app.name', 'EGY.swim') }}</span>
            </a>
            <span class="logo-icon material-icons fa-rotate-45">pool</span>
                
                
        </div>
        <!-- logo end -->
        <ul class="nav navbar-nav navbar-right in">
            <li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
        </ul>
        <!-- start mobile menu -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
            data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- end mobile menu -->
        <!-- start header menu -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                        data-close-others="true">
                        <img alt="" class="img-circle " src="{{ asset('assets/img/dp.jpg')}}" />
                        <span class="username username-hide-on-mobile"> {{ Auth::user()->name }} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="icon-logout"></i> تسجيل خروج </a>    
                             </a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                 @csrf
                             </form>
                        </li>
                    </ul>
                </li>
           
                <li><a href="javascript:;" class="fullscreen-btn"><i class="fa fa-arrows-alt"></i></a></li>
            </ul>
        </div>
    </div>
</div>
