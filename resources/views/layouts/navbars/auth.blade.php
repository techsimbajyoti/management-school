<style>
.nav-item.active > .nav-link,
.nav-item.active > .nav-link i,
.nav-item.active > .nav-link p {
    color: #17a2b8 !important;
}
.nav-item .nav > .nav-item.active > a,
.nav-item .nav > .nav-item.active > a span {
    color: #17a2b8 !important;
}

.logo-image-small img {
    max-width: 100px; /* Adjust size as needed */
    height: auto;
}


</style>
<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="d-flex flex-column align-items-center justify-content-center text-center logo">
        <a href="#" class="logo-image-small">
            <img src="{{ asset('paper') }}/img/d.png" class="img-fluid" alt="Logo">
        </a>
        <a href="#" class="mt-4 text-uppercase" style="font-weight: 700">
            {{ __('School Management') }}
        </a>
    </div>    
    <div class="sidebar-wrapper">
        <ul class="nav">
            @if(auth()->guard('web')->check() && auth()->guard('web')->user()->role_id == 1)
            
            <li class="{{ in_array($elementActive, ['applicant-tracking','applicant', 'meeting-status', 'schedule-meeting', 'applicant-list']) ? 'active' : '' }}">
                <a aria-expanded="{{ in_array($elementActive, ['applicant-tracking','applicant', 'meeting-status', 'schedule-meeting', 'applicant-list']) ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="true" href="#aravelExamples">
                    <i class="fa fa-user-circle"></i>
                    <p>
                        {{ __('Applicant') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['applicant-tracking','applicant', 'meeting-status', 'schedule-meeting', 'applicant-list']) ? 'show' : '' }}" id="aravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'applicant' ? 'active' : '' }}">
                            <a href="{{ route('applicant') }}">
                                <span class="sidebar-mini-icon">{{ __('S') }}</span>
                                <span class="sidebar-normal">{{ __(' Statistics ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'applicant-list' ? 'active' : '' }}">
                            <a href="{{ route('applicant-list') }}">
                                <span class="sidebar-mini-icon">{{ __('AL') }}</span>
                                <span class="sidebar-normal">{{ __(' Applicant List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'schedule-meeting' ? 'active' : '' }}">
                            <a href="{{ route('schedule-meeting') }}">
                                <span class="sidebar-mini-icon">{{ __('SM') }}</span>
                                <span class="sidebar-normal">{{ __(' Schedule Meeting ') }}</span>
                            </a>
                        </li>
                        
                        <li class="{{ $elementActive == 'meeting-status' ? 'active' : '' }}">
                            <a href="{{ route('meeting-status') }}">
                                <span class="sidebar-mini-icon">{{ __('ML') }}</span>
                                <span class="sidebar-normal">{{ __(' Meeting List ') }}</span>
                            </a>
                        </li>

                        <li class="{{ $elementActive == 'applicant-tracking' ? 'active' : '' }}">
                            <a href="{{ route('meeting-tracking') }}">
                                <span class="sidebar-mini-icon">{{ __('AT') }}</span>
                                <span class="sidebar-normal">{{ __(' Applicant Tracking ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            
            <li class="{{ in_array($elementActive, ['user', 'manage-student', 'student-list', 'admit-student', 'promote-student', 'disabled-student', 'parent']) ? 'active' : '' }}">
                <a aria-expanded="{{ in_array($elementActive, ['user', 'manage-student', 'student-list', 'admit-student', 'promote-student', 'disabled-student', 'parent']) ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <i class="fa fa-users"></i>
                    <p>
                        {{ __('Students') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['user', 'manage-student', 'student-list', 'admit-student', 'promote-student', 'disabled-student', 'parent']) ? 'show' : '' }}" id="laravelExamples">
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
                        
                        <li class="{{ $elementActive == 'promote-student' ? 'active' : '' }}">
                            <a href="{{ route('promote-students') }}">
                                <span class="sidebar-mini-icon">{{ __('PS') }}</span>
                                <span class="sidebar-normal">{{ __(' Promote Students ') }}</span>
                            </a>
                        </li>

                        {{-- <li class="{{ $elementActive == 'disabled-student' ? 'active' : '' }}">
                            <a href="{{ route('disabled-students') }}">
                                <span class="sidebar-mini-icon">{{ __('IS') }}</span>
                                <span class="sidebar-normal">{{ __(' Inactive Students ') }}</span>
                            </a>
                        </li> --}}


                        <li class="{{ $elementActive == 'parent' ? 'active' : '' }}">
                            <a href="{{ route('parents') }}">
                                <span class="sidebar-mini-icon">{{ __('P') }}</span>
                                <span class="sidebar-normal">{{ __(' Parents ') }}</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="{{ in_array($elementActive, ['user', 'manage-staff', 'teacher', 'accountant', 'department', 'designation','admit-teachers']) ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['user', 'manage-staff', 'teacher', 'accountant', 'department', 'designation', 'admit-teachers']) ? 'true' : 'false' }}" href="#laravelExampless">
                    <i class='fas fa-chalkboard-teacher'></i>
                    <p>
                        {{ __('Staff') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['user', 'manage-staff','teacher', 'accountant', 'department', 'designation','admit-teachers']) ? 'show' : '' }}" id="laravelExampless">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'teacher' ? 'active' : '' }}">
                            <a href="{{ route('teachers') }}">
                                <span class="sidebar-mini-icon">{{ __('S') }}</span>
                                <span class="sidebar-normal">{{ __('Staff ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'admit-teachers' ? 'active' : '' }}">
                            <a href="{{route('admit-teachers')}}">
                                <span class="sidebar-mini-icon">{{ __('AS') }}</span>
                                <span class="sidebar-normal">{{ __(' Add Staff ') }}</span>
                            </a>
                        </li>
                        {{-- <li class="{{ $elementActive == '' ? 'active' : '' }}">
                            <a href="">
                                <span class="sidebar-mini-icon">{{ __('SL') }}</span>
                                <span class="sidebar-normal">{{ __('Staff List ') }}</span>
                            </a>
                        </li> --}}
                        <li class="{{ $elementActive == 'department' ? 'active' : '' }}">
                            <a href="{{ route('department') }}">
                                <span class="sidebar-mini-icon">{{ __('D') }}</span>
                                <span class="sidebar-normal">{{ __(' Department ') }}</span>
                            </a>
                        </li>
                        {{-- <li class="{{ $elementActive == 'designation' ? 'active' : '' }}">
                            <a href="{{ route('designation') }}">
                                <span class="sidebar-mini-icon">{{ __('D') }}</span>
                                <span class="sidebar-normal">{{ __(' Designation ') }}</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </li>
            
            <li class="{{ in_array($elementActive, ['lecture-plan','user', 'manage-academic', 'class', 'section', 'admin-subject', 'assign-subject','shift','class-setup']) ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['lecture-plan','user', 'manage-academic', 'class', 'section', 'subject', 'assign-subject','shift','class-setup']) ? 'true' : 'false' }}" href="#laravelExamplesss">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <p>
                        {{ __('Academic') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['lecture-plan','user', 'manage-academic', 'class', 'section', 'admin-subject', 'assign-subject','shift','class-setup']) ? 'show' : '' }}" id="laravelExamplesss">
                    <ul class="nav">

                        <li class="{{ $elementActive == 'shift' ? 'active' : '' }}">
                            <a href="{{ route('shift') }}">
                                <span class="sidebar-mini-icon">{{ __('S') }}</span>
                                <span class="sidebar-normal">{{ __(' Shift ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'class' ? 'active' : '' }}">
                            <a href="{{ route('class') }}">
                                <span class="sidebar-mini-icon">{{ __('C') }}</span>
                                <span class="sidebar-normal">{{ __(' Class ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'section' ? 'active' : '' }}">
                            <a href="{{ route('section') }}">
                                <span class="sidebar-mini-icon">{{ __('S') }}</span>
                                <span class="sidebar-normal">{{ __(' Section ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'class-setup' ? 'active' : '' }}">
                            <a href="{{ route('class-setup') }}">
                                <span class="sidebar-mini-icon">{{ __('CS') }}</span>
                                <span class="sidebar-normal">{{ __(' Class Setup ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'admin-subject' ? 'active' : '' }}">
                            <a href="{{ route('admin-subject') }}">
                                <span class="sidebar-mini-icon">{{ __('S') }}</span>
                                <span class="sidebar-normal">{{ __(' Subject ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'assign-subject' ? 'active' : '' }}">
                            <a href="{{ route('assign-subject') }}">
                                <span class="sidebar-mini-icon">{{ __('AS') }}</span>
                                <span class="sidebar-normal">{{ __(' Assign Subject ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'lecture-plan' ? 'active' : '' }}">
                            <a href="{{ route('lecture-plan') }}">
                                <span class="sidebar-mini-icon">{{ __('LP') }}</span>
                                <span class="sidebar-normal">{{ __(' Lecture Plan ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="{{ in_array($elementActive, ['manage-attendance','attendance','admin-attendance-report']) ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['manage-attendance','attendance','admin-attendance-report']) ? 'true' : 'false' }}" href="#laravelExamplessss">
                    <i class="fas fa-calendar-check"></i>
                    <p>
                        {{ __('Attendance') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['manage-attendance','attendance','admin-attendance-report']) ? 'show' : '' }}" id="laravelExamplessss">
                    <ul class="nav">
                        {{-- <li class="{{ $elementActive == 'attendance' ? 'active' : '' }}">
                            <a href="{{ route('admin-attendance') }}">
                                <span class="sidebar-mini-icon">{{ __('A') }}</span>
                                <span class="sidebar-normal">{{ __(' Attendance ') }}</span>
                            </a>
                        </li> --}}

                        <li class="{{ $elementActive == 'admin-attendance-report' ? 'active' : '' }}">
                            <a href="{{ route('admin-attendance-report') }}">
                                <span class="sidebar-mini-icon">{{ __('AR') }}</span>
                                <span class="sidebar-normal">{{ __(' Attendance Report ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="{{ in_array($elementActive, ['video','gallery','gallery-category','image']) ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['video','gallery','gallery-category','image']) ? 'true' : 'false' }}" href="#laravelExampl">
                    <i class="fas fa-images"></i>
                    <p>
                        {{ __('Gallery') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['video','gallery','gallery-category','image']) ? 'show' : '' }}" id="laravelExampl">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'gallery-category' ? 'active' : '' }}">
                            <a href="{{ route('gallery-category') }}">
                                <span class="sidebar-mini-icon">{{ __('GC') }}</span>
                                <span class="sidebar-normal">{{ __(' Gallery Category ') }}</span>
                            </a>
                        </li>

                        <li class="{{ $elementActive == 'image' ? 'active' : '' }}">
                            <a href="{{ route('image') }}">
                                <span class="sidebar-mini-icon">{{ __('IV') }}</span>
                                <span class="sidebar-normal">{{ __(' Image ') }}</span>
                            </a>
                        </li>

                        <li class="{{ $elementActive == 'video' ? 'active' : '' }}">
                            <a href="{{ route('video') }}">
                                <span class="sidebar-mini-icon">{{ __('V') }}</span>
                                <span class="sidebar-normal">{{ __(' Video ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="{{ in_array($elementActive, ['admin-event','school-calender','add-event','calender']) ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['admin-event','school-calender','add-event','calender']) ? 'true' : 'false' }}" href="#laravelExam">
                    <i class="fas fa-calendar-alt"></i>
                    <p>
                        {{ __('Event') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['admin-event','school-calender','add-event','calender']) ? 'show' : '' }}" id="laravelExam">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'admin-event' ? 'active' : '' }}">
                            <a href="{{ route('admin-event') }}">
                                <span class="sidebar-mini-icon">{{ __('E') }}</span>
                                <span class="sidebar-normal">{{ __(' Event ') }}</span>
                            </a>
                        </li>

                        <li class="{{ $elementActive == 'add-event' ? 'active' : '' }}">
                            <a href="{{ route('add-event') }}">
                                <span class="sidebar-mini-icon">{{ __('AE') }}</span>
                                <span class="sidebar-normal">{{ __(' Add Event ') }}</span>
                            </a>
                        </li>

                        <li class="{{ $elementActive == 'calender' ? 'active' : '' }}">
                            <a href="{{ route('calender') }}">
                                <span class="sidebar-mini-icon">{{ __('EC') }}</span>
                                <span class="sidebar-normal">{{ __(' Event Calender ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="{{ in_array($elementActive, ['examination-settings','examination','examination-type','marks-grade','exam-assign','mark-register']) ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['examination-settings','examination','examination-type','marks-grade','exam-assign','mark-register']) ? 'true' : 'false' }}" href="#laravelExamp">
                    <i class="fas fa-clipboard-list"></i>
                    <p>
                        {{ __('Examination') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['examination-settings','examination','examination-type','marks-grade','exam-assign','mark-register']) ? 'show' : '' }}" id="laravelExamp">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'examination-type' ? 'active' : '' }}">
                            <a href="{{ route('examination-type') }}">
                                <span class="sidebar-mini-icon">{{ __('T') }}</span>
                                <span class="sidebar-normal">{{ __(' Type ') }}</span>
                            </a>
                        </li>

                        <li class="{{ $elementActive == 'marks-grade' ? 'active' : '' }}">
                            <a href="{{ route('marks-grade') }}">
                                <span class="sidebar-mini-icon">{{ __('MG') }}</span>
                                <span class="sidebar-normal">{{ __(' Marks Grade ') }}</span>
                            </a>
                        </li>

                        <li class="{{ $elementActive == 'exam-assign' ? 'active' : '' }}">
                            <a href="{{ route('exam-assign') }}">
                                <span class="sidebar-mini-icon">{{ __('EA') }}</span>
                                <span class="sidebar-normal">{{ __(' Exam Assign ') }}</span>
                            </a>
                        </li>

                        <li class="{{ $elementActive == 'mark-register' ? 'active' : '' }}">
                            <a href="{{ route('mark-register') }}">
                                <span class="sidebar-mini-icon">{{ __('MR') }}</span>
                                <span class="sidebar-normal">{{ __(' Mark Register ') }}</span>
                            </a>
                        </li>

                        <li class="{{ $elementActive == 'examination-settings' ? 'active' : '' }}">
                            <a href="{{ route('settings') }}">
                                <span class="sidebar-mini-icon">{{ __('S') }}</span>
                                <span class="sidebar-normal">{{ __(' Settings ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="{{ in_array($elementActive, ['student-fees-payment','fees','fees-group','fees-type','fees-master','fees-assign','fees-collect']) ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['student-fees-payment','fees','fees-group','fees-type','fees-master','fees-assign','fees-collect']) ? 'true' : 'false' }}" href="#laravelEx">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <p>
                        {{ __('Fees & Payment') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['student-fees-payment','fees','fees-group','fees-type','fees-master','fees-assign','fees-collect']) ? 'show' : '' }}" id="laravelEx">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'fees-group' ? 'active' : '' }}">
                            <a href="{{ route('group') }}">
                                <span class="sidebar-mini-icon">{{ __('G') }}</span>
                                <span class="sidebar-normal">{{ __(' Group ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'fees-type' ? 'active' : '' }}">
                            <a href="{{ route('type') }}">
                                <span class="sidebar-mini-icon">{{ __('T') }}</span>
                                <span class="sidebar-normal">{{ __(' Type ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'fees-master' ? 'active' : '' }}">
                            <a href="{{ route('master') }}">
                                <span class="sidebar-mini-icon">{{ __('M') }}</span>
                                <span class="sidebar-normal">{{ __(' Master ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'fees-assign' ? 'active' : '' }}">
                            <a href="{{ route('assign') }}">
                                <span class="sidebar-mini-icon">{{ __('A') }}</span>
                                <span class="sidebar-normal">{{ __(' Assign ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'fees-collect' ? 'active' : '' }}">
                            <a href="{{ route('collect') }}">
                                <span class="sidebar-mini-icon">{{ __('C') }}</span>
                                <span class="sidebar-normal">{{ __(' Collect ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'student-fees-payment' ? 'active' : '' }}">
                            <a href="{{ route('student-fees-payment') }}">
                                <span class="sidebar-mini-icon">{{ __('SP') }}</span>
                                <span class="sidebar-normal">{{ __(' Student Payment ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="{{ in_array($elementActive, ['reports','report-marksheet','report-merit-list','report-progress-card','report-due-fees','report-fees-collection','report-accounts','report-class-routine','report-exam-routine','report-attendance']) ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['reports','report-marksheet','report-merit-list','report-progress-card','report-due-fees','report-fees-collection','report-accounts','report-class-routine','report-exam-routine','report-attendance']) ? 'true' : 'false' }}" href="#laravelE">
                    <i class="fas fa-chart-bar"></i>
                    <p>
                        {{ __('Reports') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['reports','report-marksheet','report-merit-list','report-progress-card','report-due-fees','report-fees-collection','report-accounts','report-class-routine','report-exam-routine','report-attendance']) ? 'show' : '' }}" id="laravelE">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'report-marksheet' ? 'active' : '' }}">
                            <a href="{{ route('report-marksheet') }}">
                                <span class="sidebar-mini-icon">{{ __('M') }}</span>
                                <span class="sidebar-normal">{{ __(' Marksheet ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'report-merit-list' ? 'active' : '' }}">
                            <a href="{{ route('report-merit-list') }}">
                                <span class="sidebar-mini-icon">{{ __('ML') }}</span>
                                <span class="sidebar-normal">{{ __(' Merit List ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'report-progress-card' ? 'active' : '' }}">
                            <a href="{{ route('report-progress-card') }}">
                                <span class="sidebar-mini-icon">{{ __('PC') }}</span>
                                <span class="sidebar-normal">{{ __(' Progress Card ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'report-due-fees' ? 'active' : '' }}">
                            <a href="{{ route('report-due-fees') }}">
                                <span class="sidebar-mini-icon">{{ __('DF') }}</span>
                                <span class="sidebar-normal">{{ __(' Due Fees ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'report-fees-collection' ? 'active' : '' }}">
                            <a href="{{ route('report-fees-collection') }}">
                                <span class="sidebar-mini-icon">{{ __('FC') }}</span>
                                <span class="sidebar-normal">{{ __(' Fees Collection ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'report-account' ? 'active' : '' }}">
                            <a href="{{ route('report-account') }}">
                                <span class="sidebar-mini-icon">{{ __('RA') }}</span>
                                <span class="sidebar-normal">{{ __(' Report Account ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'report-class-routine' ? 'active' : '' }}">
                            <a href="{{ route('report-class-routine') }}">
                                <span class="sidebar-mini-icon">{{ __('CR') }}</span>
                                <span class="sidebar-normal">{{ __(' Class Routine ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'report-exam-routine' ? 'active' : '' }}">
                            <a href="{{ route('report-exam-routine') }}">
                                <span class="sidebar-mini-icon">{{ __('ER') }}</span>
                                <span class="sidebar-normal">{{ __(' Exam Routine ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'report-attendance' ? 'active' : '' }}">
                            <a href="{{ route('report-attendance') }}">
                                <span class="sidebar-mini-icon">{{ __('A') }}</span>
                                <span class="sidebar-normal">{{ __(' Attendance ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="{{ in_array($elementActive, ['settings','general-setting']) ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['settings','general-setting']) ? 'true' : 'false' }}" href="#laravelExa">
                    <i class="fas fa-cog"></i>
                    <p>
                        {{ __('Settings') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['settings','general-setting']) ? 'show' : '' }}" id="laravelExa">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'general-setting' ? 'active' : '' }}">
                            <a href="{{ route('general-setting') }}">
                                <span class="sidebar-mini-icon">{{ __('GS') }}</span>
                                <span class="sidebar-normal">{{ __(' General Settings ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="{{ $elementActive == 'notification' ? 'active' : '' }}">
                <a href="{{ route('add-notification') }}">
                    <i class="fa fa-bell"></i>
                    <p>{{ __('Notification') }}</p>
                </a>
            </li>
            
            @elseif(auth()->guard('webteachers')->check() && auth()->guard('webteachers')->user()->role_id == 2)
                
                <li class="{{ $elementActive == 'teacher-dashboard' ? 'active' : '' }}">
                    <a href="{{ route('teacher-dashboard') }}">
                        <i class="nc-icon nc-bank"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>

                <li class="{{ in_array($elementActive, ['teacher-routine','teacher-class-routine','teacher-exam-routine']) ? 'active' : '' }}">
                    <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['teacher-routine','teacher-class-routine','teacher-exam-routine']) ? 'true' : 'false' }}" href="#laravelExa-teacher">
                        <i class="fas fa-calendar-alt"></i>
                        <p>
                            {{ __('Routine') }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse {{ in_array($elementActive, ['teacher-routine','teacher-class-routine','teacher-exam-routine']) ? 'show' : '' }}" id="laravelExa-teacher">
                        <ul class="nav">
                            <li class="{{ $elementActive == 'teacher-class-routine' ? 'active' : '' }}">
                                <a href="{{ route('teacher-class-routine') }}">
                                    <span class="sidebar-mini-icon">{{ __('CR') }}</span>
                                    <span class="sidebar-normal">{{ __(' Class Routine ') }}</span>
                                </a>
                            </li>

                            <li class="{{ $elementActive == 'teacher-exam-routine' ? 'active' : '' }}">
                                <a href="{{ route('teacher-exam-routine') }}">
                                    <span class="sidebar-mini-icon">{{ __('ER') }}</span>
                                    <span class="sidebar-normal">{{ __(' Exam Routine ') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
               
                <li class="{{ in_array($elementActive, ['teacher-attendance','teacher-attendance-list','teacher-attendance-report']) ? 'active' : '' }}">
                    <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['teacher-attendance','teacher-attendance-list','teacher-attendance-report']) ? 'true' : 'false' }}" href="#laravelEx-teacher">
                        <i class="fas fa-user-check"></i> 
                        <p>
                            {{ __('Attendance') }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse {{ in_array($elementActive, ['teacher-attendance','teacher-attendance-list','teacher-attendance-report']) ? 'show' : '' }}" id="laravelEx-teacher">
                        <ul class="nav">
                            <li class="{{ $elementActive == 'teacher-attendance-list' ? 'active' : '' }}">
                                <a href="{{ route('teacher-attendance-list') }}">
                                    <span class="sidebar-mini-icon">{{ __('A') }}</span>
                                    <span class="sidebar-normal">{{ __(' Attendance ') }}</span>
                                </a>
                            </li>

                            <li class="{{ $elementActive == 'teacher-attendance-report' ? 'active' : '' }}">
                                <a href="{{ route('teacher-attendance-report') }}">
                                    <span class="sidebar-mini-icon">{{ __('AR') }}</span>
                                    <span class="sidebar-normal">{{ __(' Attendance Report ') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="{{ in_array($elementActive, ['teacher-examination','teacher-mark-sheet']) ? 'active' : '' }}">
                    <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['teacher-examination','teacher-mark-sheet']) ? 'true' : 'false' }}" href="#laravelE-teacher">
                        <i class="fas fa-pencil-alt"></i>
                        <p>
                            {{ __('Examination') }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse {{ in_array($elementActive, ['teacher-examination','teacher-mark-sheet']) ? 'show' : '' }}" id="laravelE-teacher">
                        <ul class="nav">
                            <li class="{{ $elementActive == 'teacher-mark-sheet' ? 'active' : '' }}">
                                <a href="{{ route('teacher-mark-sheet') }}">
                                    <span class="sidebar-mini-icon">{{ __('MS') }}</span>
                                    <span class="sidebar-normal">{{ __(' Mark Sheet ') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="{{ $elementActive == '' ? 'active' : '' }}">
                    <a href="{{ route('teacher-dashboard') }}">
                        <i class="fas fa-chart-bar"></i>
                        <p>{{ __('Report') }}</p>
                    </a>
                </li>
                
                <li class="{{ in_array($elementActive, ['video','teacher-gallery','gallery-category','image']) ? 'active' : '' }}">
                    <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['teacher-video','teacher-gallery','teacher-gallery-category','teacher-image']) ? 'true' : 'false' }}" href="#laravel-teacher">
                        <i class="fas fa-images"></i>
                        <p>
                            {{ __('Gallery') }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse {{ in_array($elementActive, ['video','teacher-gallery','gallery-category','image']) ? 'show' : '' }}" id="laravel-teacher">
                        <ul class="nav">
                            <li class="{{ $elementActive == 'gallery-category' ? 'active' : '' }}">
                                <a href="{{ route('teacher-gallery-category') }}">
                                    <span class="sidebar-mini-icon">{{ __('GC') }}</span>
                                    <span class="sidebar-normal">{{ __(' Gallery Category ') }}</span>
                                </a>
                            </li>
    
                            <li class="{{ $elementActive == 'image' ? 'active' : '' }}">
                                <a href="{{ route('teacher-image') }}">
                                    <span class="sidebar-mini-icon">{{ __('I') }}</span>
                                    <span class="sidebar-normal">{{ __(' Image ') }}</span>
                                </a>
                            </li>
    
                            <li class="{{ $elementActive == 'video' ? 'active' : '' }}">
                                <a href="{{ route('teacher-video') }}">
                                    <span class="sidebar-mini-icon">{{ __('V') }}</span>
                                    <span class="sidebar-normal">{{ __(' Video ') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="{{ in_array($elementActive, ['admin-event','school-calender','add-event','calender']) ? 'active' : '' }}">
                    <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['admin-event','school-calender','add-event','calender']) ? 'true' : 'false' }}" href="#larave-teacher">
                        <i class="fas fa-calendar"></i>
                        <p>
                            {{ __('Event') }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse {{ in_array($elementActive, ['admin-event','school-calender','add-event','calender']) ? 'show' : '' }}" id="larave-teacher">
                        <ul class="nav">
                            <li class="{{ $elementActive == 'admin-event' ? 'active' : '' }}">
                                <a href="{{ route('teacher-event') }}">
                                    <span class="sidebar-mini-icon">{{ __('E') }}</span>
                                    <span class="sidebar-normal">{{ __(' Event ') }}</span>
                                </a>
                            </li>
    
                            <li class="{{ $elementActive == 'add-event' ? 'active' : '' }}">
                                @if(auth()->guard('web')->check() && auth()->guard('web')->user()->role_id == 1)
                                <a href="{{route('add-event')}}">
                                    <span class="sidebar-mini-icon">{{ __('AE') }}</span>
                                    <span class="sidebar-normal">{{ __(' Add Event ') }}</span>
                                </a>
                                @elseif(auth()->guard('webteachers')->check() && auth()->guard('webteachers')->user()->role_id == 2)
                                <a href="{{route('teacher-add-event')}}">
                                    <span class="sidebar-mini-icon">{{ __('AE') }}</span>
                                    <span class="sidebar-normal">{{ __(' Add Event ') }}</span>
                                </a>
                                @endif
                            </li>
    
                            <li class="{{ $elementActive == 'calender' ? 'active' : '' }}">
                                <a href="{{ route('teacher-calender') }}">
                                    <span class="sidebar-mini-icon">{{ __('EC') }}</span>
                                    <span class="sidebar-normal">{{ __(' Event Calender ') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="{{ in_array($elementActive, ['teacher-parent','parent-detail']) ? 'active' : '' }}">
                    <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['teacher-parent','parent-detail']) ? 'true' : 'false' }}" href="#larav-teacher">
                        <i class="fa fa-user-friends"></i>

                        <p>
                            {{ __('Parent') }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse {{ in_array($elementActive, ['teacher-parent','parent-detail']) ? 'show' : '' }}" id="larav-teacher">
                        <ul class="nav">
                            <li class="{{ $elementActive == 'parent-detail' ? 'active' : '' }}">
                                <a href="{{ route('parent-detail') }}">
                                    <span class="sidebar-mini-icon">{{ __('P') }}</span>
                                    <span class="sidebar-normal">{{ __(' Parent ') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="{{ in_array($elementActive, ['teacher-student','student-detail']) ? 'active' : '' }}">
                    <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['teacher-student','student-detail']) ? 'true' : 'false' }}" href="#lara-teacher">
                        <i class="fa fa-user-graduate"></i>
                        <p>
                            {{ __('Student') }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse {{ in_array($elementActive, ['teacher-student','student-detail']) ? 'show' : '' }}" id="lara-teacher">
                        <ul class="nav">
                            <li class="{{ $elementActive == 'student-detail' ? 'active' : '' }}">
                                <a href="{{ route('student-detail') }}">
                                    <span class="sidebar-mini-icon">{{ __('S') }}</span>
                                    <span class="sidebar-normal">{{ __(' Student ') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            @elseif(auth()->guard('webparents')->check() && auth()->guard('webparents')->user()->role_id == 5)
            
            @if(auth()->guard('webparents')->user()->applicant_id == 'applicant')

            <li class="{{ $elementActive == 'parent-dashboard' ? 'active' : '' }}">
                <a href="{{ route('parent-dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            <li class="{{ $elementActive == 'applicant-profile' ? 'active' : '' }}">
                <a href="{{ route('applicant-profile') }}">
                    <i class="fas fa-user-tie"></i> 
                    <p>{{ __('Profile') }}</p>
                </a>
            </li>

            <li class="{{ $elementActive == 'add-applicant' ? 'active' : '' }}">
                <a href="{{ route('add-applicant') }}">
                    <i class="fa fa-user-plus"></i> 
                    <p>{{ __('Add Applicant') }}</p>
                </a>
            </li>

            <li class="{{ $elementActive == 'applicant-parent-list' ? 'active' : '' }}">
                <a href="{{ route('applicant-parent-list') }}">
                    <i class="fas fa-list"></i> 
                    <p>{{ __('Applicant List') }}</p>
                </a>
            </li>

            <li class="{{ $elementActive == 'parent-meeting-status' ? 'active' : '' }}">
                <a href="{{ route('parent-meeting-status') }}">
                    <i class="fas fa-handshake"></i> 
                    <p>{{ __('Meeting Status') }}</p>
                </a>
            </li>

            <li class="{{ $elementActive == 'parent-meeting-track' ? 'active' : '' }}">
                <a href="{{ route('parent-meeting-track') }}">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>{{ __('Track Meeting') }}</p>
                </a>
            </li>

            @else
            <li class="{{ $elementActive == 'parent-dashboard' ? 'active' : '' }}">
                <a href="{{ route('parent-dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'student-profile' ? 'active' : '' }}">
                <a href="{{ route('student-profile') }}">
                    <i class="fa fa-user"></i>
                    <p>{{ __('Student Profile') }}</p>
                </a>
            </li>
            <li class="{{ in_array($elementActive, ['student-subject','student-class-routine']) ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['student-subject','subject-class-routine']) ? 'true' : 'false' }}" href="#laravelExa">
                    <i class="fas fa-cog"></i>
                    <p>
                        {{ __('Academics') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['student-subject','student-class-routine']) ? 'show' : '' }}" id="laravelExa">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'student-subject' ? 'active' : '' }}">
                            <a href="{{ route('student-subject') }}">
                                <span class="sidebar-mini-icon">{{ __('S') }}</span>
                                <span class="sidebar-normal">{{ __(' Subject ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'student-class-routine' ? 'active' : '' }}">
                            <a href="{{ route('student-class-routine') }}">
                                <span class="sidebar-mini-icon">{{ __('CS') }}</span>
                                <span class="sidebar-normal">{{ __(' Class Routine ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
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
            <li class="{{ $elementActive == 'calender' ? 'active' : '' }}">
                <a href="{{ route('parent-event') }}">
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
            <li class="{{ $elementActive == 'gallery-category' ? 'active' : '' }}">
                <a href="{{ route('parent-gallary') }}">
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

            @endif
            
            @elseif(auth()->guard('webstudents')->check() && auth()->guard('webstudents')->user()->role_id == 4)
            <li class="{{ $elementActive == 'student-dashboard' ? 'active' : '' }}">
                <a href="{{ route('student-dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'parent-profile' ? 'active' : '' }}">
                <a href="{{ route('parent-profile') }}">
                    <i class="fa-solid fa-user"></i>
                    <p>{{ __('Parent Profile') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'student-marksheet' ? 'active' : '' }}">
                <a href="{{ route('student-marksheet') }}">
                    <i class="fa fa-graduation-cap"></i>
                    <p>{{ __('Marksheet') }}</p>
                </a>
            </li>
            <li class="{{ in_array($elementActive, ['subject','class-routine']) ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['subject','class-routine']) ? 'true' : 'false' }}" href="#laravelExa">
                    <i class="fas fa-cog"></i>
                    <p>
                        {{ __('Academics') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['subject','class-routine']) ? 'show' : '' }}" id="laravelExa">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'subject' ? 'active' : '' }}">
                            <a href="{{ route('subject') }}">
                                <span class="sidebar-mini-icon">{{ __('S') }}</span>
                                <span class="sidebar-normal">{{ __(' Subject ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'class-routine' ? 'active' : '' }}">
                            <a href="{{ route('class-routine') }}">
                                <span class="sidebar-mini-icon">{{ __('CS') }}</span>
                                <span class="sidebar-normal">{{ __(' Class Routine ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'calender' ? 'active' : '' }}">
                <a href="{{ route('student-event') }}">
                    <i class="fas fa-calendar-alt"></i>
                    <p>{{ __('Events') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'exam' ? 'active' : '' }}">
                <a href="{{ route('student-exam') }}">
                    <i class="fa fa-calendar-o"></i>
                    <p>{{ __('Exam') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'attendance' ? 'active' : '' }}">
                <a href="{{ route('student-attendance') }}">
                    <i class="fa fa-clock-o"></i>
                    <p>{{ __('Attendance') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'gallery-category' ? 'active' : '' }}">
                <a href="{{ route('student-gallary') }}">
                    <i class="fa fa-camera"></i>
                    <p>{{ __('Gallary') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'chat' ? 'active' : '' }}">
                <a href="{{ route('student-dashboard') }}">
                    <i class="fa fa-comment"></i>
                    <p>{{ __('Chat') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'notification' ? 'active' : '' }}">
                <a href="{{ route('student-dashboard') }}">
                    <i class="fa-solid fa-bell"></i>
                    <p>{{ __('Notification') }}</p>
                </a>
            </li>


                @elseif(auth()->guard('webaccountants')->check() && auth()->guard('webaccountants')->user()->role_id == 3)
                    <li class="{{ $elementActive == 'accountant-dashboard' ? 'active' : '' }}">
                        <a href="{{ route('accountant-dashboard') }}">
                            <i class="nc-icon nc-bank"></i>
                            <p>{{ __('Dashboard') }}</p>
                        </a>
                    </li>
                    <li class="{{ in_array($elementActive, ['manage-payment', 'student-payment']) ? 'active' : '' }}">
                        <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['manage-payment', 'student-payment']) ? 'true' : 'false' }}" href="#laravelExamplesss">
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                            <p>{{ __('Fees') }}</p>
                        </a>
                    
                    <div class="collapse {{ in_array($elementActive, ['manage-payment', 'student-payment']) ? 'show' : '' }}" id="laravelExamplesss">
                        <ul class="nav">
                            {{-- <li class="{{ $elementActive == 'add-fees' ? 'active' : '' }}">
                                <a href="{{ route('add-fees') }}">
                                    <span class="sidebar-mini-icon">{{ __(' AF') }}</span>
                                    <span class="sidebar-normal">{{ __(' Add Fees') }}</span>
                                </a>
                            </li> --}}
                            <li class="{{ $elementActive == 'manage-payment' ? 'active' : '' }}">
                                <a href="{{ route('manage-payment') }}">
                                    <span class="sidebar-mini-icon">{{ __('MP ') }}</span>
                                    <span class="sidebar-normal">{{ __('Manage Payment') }}</span>
                                </a>
                            </li>
                            <li class="{{ $elementActive == 'student-payment' ? 'active' : '' }}">
                                <a href="{{ route('accountant-dashboard') }}">
                                    <span class="sidebar-mini-icon">{{ __('PR ') }}</span>
                                    <span class="sidebar-normal">{{ __('Payment and Receipt') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                    {{-- <li class="{{ $elementActive == 'accountant-fees-challans' ? 'active' : '' }}">
                        <a href="{{ route('accountant-fees-challans') }}">
                            <i class="fa-solid fa-receipt"></i>
                            <p>{{ __('Fees Challans') }}</p>
                        </a>
                    </li> --}}
                    <li class="{{ $elementActive == 'gallery-category' ? 'active' : '' }}">
                        <a href="{{ route('accountant-gallery') }}">
                            <i class="fa fa-camera"></i>
                            <p>{{ __('Gallery') }}</p>
                        </a>
                    </li>
                    <li class="{{ $elementActive == 'calender' ? 'active' : '' }}">
                        <a href="{{ route('accountant-event') }}">
                            <i class="fa fa-calendar-alt"></i>
                            <p>{{ __('Event') }}</p>
                        </a>
                    </li>
                    <li class="{{ $elementActive == 'accountant-student' ? 'active' : '' }}">
                        <a href="{{ route('accountant-student') }}">
                            <i class="fa fa-user"></i>
                            <p>{{ __('Student') }}</p>
                        </a>
                    </li>
                    <li class="{{ $elementActive == 'accountant-teacher' ? 'active' : '' }}">
                        <a href="{{ route('accountant-teacher') }}">
                            <i class="fa fa-chalkboard-teacher"></i>
                            <p>{{ __('Staff') }}</p>
                        </a>
                    </li>
                    <li class="{{ $elementActive == 'accountant-report' ? 'active' : '' }}">
                        <a href="{{ route('accountant-report') }}">
                            <i class="fa-solid fa-file-invoice"></i>
                            <p>{{ __('Reports') }}</p>

                <li class="{{ $elementActive == 'accountant-fees-challans' ? 'active' : '' }}">
                    <a href="{{ route('accountant-fees-challans') }}">
                        <i class="fa-solid fa-receipt"></i>
                        <p>{{ __('Fees Challans') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'accountant-report' ? 'active' : '' }}">
                    <a href="{{ route('accountant-report') }}">
                        <i class="fa-solid fa-file-invoice"></i>
                        <p>{{ __('Reports') }}</p>
                    </a>
                </li>

                @elseif(auth()->guard('webadmissions')->check() && auth()->guard('webadmissions')->user()->role_id == 6)
                    <li class="{{ $elementActive == 'admission-dashboard' ? 'active' : '' }}">
                        <a href="{{ route('admission-dashboard') }}">
                            <i class="nc-icon nc-bank"></i>
                            <p>{{ __('Dashboard') }}</p>

                        </a>
                    </li>
                @endif

        </ul>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
    $('.nav-link').on('click', function () {
        var $el = $(this);
        var $parent = $el.closest('.nav-item');

        $('.nav-item').not($parent).removeClass('active');
        $parent.toggleClass('active');
    });
});
</script>
@endpush