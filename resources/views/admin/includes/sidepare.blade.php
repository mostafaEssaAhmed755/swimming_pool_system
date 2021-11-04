<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll" class="left-sidemenu">
            <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
                data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="sidebar-user-panel">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ asset('assets/img/dp.jpg')}}" class="img-circle user-img-circle"
                                alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p> {{ Auth::user()->name }} </p>
                            <a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline">
                                    Online</span></a>
                        </div>
                    </div>
                </li>
                <li class="nav-item @if (Route::is('home')) active @endif">
                    <a href="{{ route('home') }}" class="nav-link nav-toggle">
                        <i class="material-icons">dashboard</i>
                        <span class="title">لوحه التحكم</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item @if (Route::is('system.*')) active @endif">
                    <a href="{{ route('system.index') }}" class="nav-link nav-toggle">
                        <i class="material-icons">business</i>
                        <span class="title">أنظمه الاشتراك</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item @if (Route::is('trainingsession.*')) active @endif">
                    <a href="#" class="nav-link nav-toggle"><i class="material-icons">dvr</i>
                        <span class="title">الجلسات</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item @if (Route::is('trainingsession.index'))
                        active
                    @endif">
                            <a href="{{ route('trainingsession.index') }}" class="nav-link"> <span class="title">كل الجلسات</span>
                            </a>
                        </li>
                        <li class="nav-item @if (Route::is('preparingsession.create'))
                        active
                    @endif">
                            <a href="{{ route('preparingsession.create') }}" class="nav-link "> <span class="title">تحضير جلسه </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (Route::is('student.*')) active @endif">
                    <a href="#" class="nav-link nav-toggle"><i class="material-icons">group</i>
                        <span class="title">المشتركين</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item @if (Route::is('student.index'))
                        active
                    @endif">
                            <a href="{{ route('student.index') }}" class="nav-link"> <span class="title">كل المشتركين</span>
                            </a>
                        </li>
                        <li class="nav-item @if (Route::is('student.create'))
                        active
                    @endif">
                            <a href="{{ route('student.create') }}" class="nav-link "> <span class="title">أضافه مشترك</span>
                            </a>
                        </li>
                    </ul>
                </li>
                 <li class="nav-item @if (Route::is('job.*')) active @endif">
                    <a href="#" class="nav-link nav-toggle"><i class="material-icons">work</i>
                        <span class="title">الوظائف</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item @if (Route::is('job.index'))
                        active
                    @endif">
                            <a href="{{ route('job.index') }}" class="nav-link"> <span class="title">كل الوظائف</span>
                            </a>
                        </li>
                        <li class="nav-item @if (Route::is('job.create'))
                        active
                    @endif">
                            <a href="{{ route('job.create') }}" class="nav-link "> <span class="title">أضافه وظيفه</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (Route::is('employee.*')) active @endif">
                    <a href="#" class="nav-link nav-toggle"><i class="material-icons">face</i>
                        <span class="title">ألموظفين</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item @if (Route::is('employee.index'))
                        active
                    @endif">
                            <a href="{{ route('employee.index') }}" class="nav-link"> <span class="title">كل الموظفين</span>
                            </a>
                        </li>
                        <li class="nav-item @if (Route::is('employee.create'))
                        active
                    @endif">
                            <a href="{{ route('employee.create') }}" class="nav-link "> <span class="title">أضافه موظف</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (Route::is('gymnastic.*')) active @endif">
                    <a href="#" class="nav-link nav-toggle"><i class="material-icons">fitness_center</i>
                        <span class="title">التمارين</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item @if (Route::is('gymnastic.index'))
                        active
                    @endif">
                            <a href="{{ route('gymnastic.index') }}" class="nav-link"> <span class="title">كل التمارين</span>
                            </a>
                        </li>
                        <li class="nav-item @if (Route::is('gymnastic.create'))
                        active
                    @endif">
                            <a href="{{ route('gymnastic.create') }}" class="nav-link "> <span class="title">أضافه تمرين</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (Route::is('coach.*')) active @endif">
                    <a href="#" class="nav-link nav-toggle"><i class="material-icons">person</i>
                        <span class="title">المدربين</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item @if (Route::is('coach.index'))
                        active
                    @endif">
                            <a href="{{ route('coach.index') }}" class="nav-link"> <span class="title">كل المدربين</span>
                            </a>
                        </li>
                        <li class="nav-item @if (Route::is('coach.create'))
                        active
                    @endif">
                            <a href="{{ route('coach.create') }}" class="nav-link "> <span class="title">أضافه مدرب</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @if (Route::is('attendance.*')) active @endif">
                    <a href="#" class="nav-link nav-toggle"><i class="material-icons">person</i>
                        <span class="title">الحضور والانصراف</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item @if (Route::is('attendance'))
                        active
                    @endif">
                            <a href="{{ route('attendance.index') }}" class="nav-link"> <span class="title">تسجيل الحضور</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item @if (Route::is('roles.*') || Route::is('users.*') ) active @endif">
                    <a href="#" class="nav-link nav-toggle"><i class="material-icons">person</i>
                        <span class="title">المستخدمين</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link"> <span class="title">المستخدمين</span>
                            </a>
                            <a href="{{ route('roles.index') }}" class="nav-link"> <span class="title">الصلاحيات</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
