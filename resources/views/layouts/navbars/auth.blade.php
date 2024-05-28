<style>
    .nav li.active > a,
    .nav li.active > a i,
    .nav li.active > a p,
    .nav li.active > a .sidebar-mini-icon {
        color: #17a2b8 !important;
        font-weight:700;
    }
</style>
<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/d.png">
            </div>
        </a>
        <a href="#" class="simple-text logo-normal">
            {{ __('School Management') }}
        </a>
        
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            @if(auth()->guard('web')->check() && auth()->guard('web')->user()->role_id == 1)
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            
            <li class="{{ $elementActive == 'user' || $elementActive == 'student-info' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <i class="fa fa-users"></i>
                    <p>
                        {{ __('Students Info') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'student-list' ? 'active' : '' }}">
                            <a href="{{ route('students') }}">
                                <span class="sidebar-mini-icon">{{ __('S') }}</span>
                                <span class="sidebar-normal">{{ __(' Students') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'admit-student' ? 'active' : '' }}">
                            <a href="{{ route('admit-student')  }}">
                                <span class="sidebar-mini-icon">{{ __('AS') }}</span>
                                <span class="sidebar-normal">{{ __('Admit Students ') }}</span>
                            </a>
                        </li>
                        
                        <!-- <li class="{{ $elementActive == 'promote-student' ? 'active' : '' }}">
                            <a href="">
                                <span class="sidebar-mini-icon">{{ __('PS') }}</span>
                                <span class="sidebar-normal">{{ __(' Promote Student ') }}</span>
                            </a>
                        </li> -->

                        <li class="{{ $elementActive == 'parent' ? 'active' : '' }}">
                            <a href="{{ route('parents') }}">
                                <span class="sidebar-mini-icon">{{ __('P') }}</span>
                                <span class="sidebar-normal">{{ __(' Parents ') }}</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>

            <li class="{{ $elementActive == 'user' || $elementActive == 'manage-staff' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExampless">
                    <i class="fa fa-users"></i>
                    <p>
                            {{ __('Manage Staff') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExampless">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'teacher' ? 'active' : '' }}">
                            <a href="{{ route('teachers') }}">
                                <span class="sidebar-mini-icon">{{ __('T') }}</span>
                                <span class="sidebar-normal">{{ __('Teachers ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'accountant' ? 'active' : '' }}">
                            <a href="{{ route('accountant') }}">
                                <span class="sidebar-mini-icon">{{ __('AC') }}</span>
                                <span class="sidebar-normal">{{ __(' Accountant ') }}</span>
                            </a>
                            
                        </li>
                    </ul>
                </div>
            </li>
            @elseif(auth()->guard('webteachers')->check() && auth()->guard('webteachers')->user()->role_id == 2)
                <li class="{{ $elementActive == 'teacher-dashboard' ? 'active' : '' }}">
                    <a href="{{ route('teacher-dashboard') }}">
                        <i class="nc-icon nc-bank"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
            @elseif(auth()->guard('webparents')->check() && auth()->guard('webparents')->user()->role_id == 5)
            <li class="{{ $elementActive == 'parent-dashboard' ? 'active' : '' }}">
                <a href="{{ route('parent-dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'students_profile' ? 'active' : '' }}">
                <a href="{{ route('student-profile') }}">
                    <i class="fa fa-user"></i>
                    <p>{{ __('Student Profile') }}</p>
                </a>
            </li>
            
            <li class="{{ $elementActive == 'marksheet' ? 'active' : '' }}">
                <a href="{{ route('marksheet') }}">
                    <i class="fa fa-graduation-cap"></i>
                    <p>{{ __('Marksheet') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'fees' ? 'active' : '' }}">
                <a href="{{ route('student-fees') }}">
                    <i class="fa fa-rupee"></i>
                    <p>{{ __('Fees') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'events' ? 'active' : '' }}">
                <a href="{{ route('parent-dashboard') }}">
                    <i class="fas fa-calendar-alt"></i>
                    <p>{{ __('Events') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'exam' ? 'active' : '' }}">
                <a href="{{ route('exam-routine') }}">
                    <i class="fa fa-calendar-o"></i>
                    <p>{{ __('Exam Routine') }}</p>
                </a>
            </li>
           
            <li class="{{ $elementActive == 'attendance' ? 'active' : '' }}">
                <a href="{{ route('attendance') }}">
                    <i class="fa fa-clock-o"></i>
                    <p>{{ __('Attendance') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'gallary' ? 'active' : '' }}">
                <a href="{{ route('parent-dashboard') }}">
                    <i class="fa fa-camera"></i>
                    <p>{{ __('Gallary') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'messages' ? 'active' : '' }}">
                <a href="{{ route('parent-dashboard') }}">
                    <i class="fa fa-comment"></i>
                    <p>{{ __('Messages') }}</p>
                </a>
            </li>
            @elseif(auth()->guard('webstudents')->check() && auth()->guard('webstudents')->user()->role_id == 4)
            <li class="{{ $elementActive == 'student-dashboard' ? 'active' : '' }}">
                <a href="{{ route('student-dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            @endif
        </ul>
    </div>
</div>