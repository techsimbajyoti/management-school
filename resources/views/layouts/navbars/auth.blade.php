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
            
            <li class="{{ in_array($elementActive, ['lecture-plan','user', 'manage-academic', 'class', 'section', 'subject', 'assign-subject','shift','class-setup']) ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['lecture-plan','user', 'manage-academic', 'class', 'section', 'subject', 'assign-subject','shift','class-setup']) ? 'true' : 'false' }}" href="#laravelExamplesss">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <p>
                        {{ __('Academic') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['lecture-plan','user', 'manage-academic', 'class', 'section', 'subject', 'assign-subject','shift','class-setup']) ? 'show' : '' }}" id="laravelExamplesss">
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
                        <li class="{{ $elementActive == 'subject' ? 'active' : '' }}">
                            <a href="{{ route('subject') }}">
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
                        <li class="{{ $elementActive == 'attendance' ? 'active' : '' }}">
                            <a href="{{ route('admin-attendance') }}">
                                <span class="sidebar-mini-icon">{{ __('A') }}</span>
                                <span class="sidebar-normal">{{ __(' Attendance ') }}</span>
                            </a>
                        </li>

                        <li class="{{ $elementActive == 'admin-attendance-report' ? 'active' : '' }}">
                            <a href="{{ route('admin-attendance-report') }}">
                                <span class="sidebar-mini-icon">{{ __('AR') }}</span>
                                <span class="sidebar-normal">{{ __(' Attendance Report ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="{{ in_array($elementActive, ['gallery','gallery-category','image']) ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['gallery','gallery-category','image']) ? 'true' : 'false' }}" href="#laravelExampl">
                    <i class="fas fa-images"></i>
                    <p>
                        {{ __('Gallery') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['gallery','gallery-category','image']) ? 'show' : '' }}" id="laravelExampl">
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
                                <span class="sidebar-normal">{{ __(' Image & Video ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="{{ in_array($elementActive, ['school-calender','add-event','calender']) ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['school-calender','add-event','calender']) ? 'true' : 'false' }}" href="#laravelExam">
                    <i class="fas fa-calendar-alt"></i>
                    <p>
                        {{ __('Event') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['school-calender','add-event','calender']) ? 'show' : '' }}" id="laravelExam">
                    <ul class="nav">
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

            <li class="{{ in_array($elementActive, ['examination','type','marks-grade','exam-assign','mark-register']) ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['examination','type','marks-grade','exam-assign','mark-register']) ? 'true' : 'false' }}" href="#laravelExamp">
                    <i class="fas fa-clipboard-list"></i>
                    <p>
                        {{ __('Examination') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['examination','type','marks-grade','exam-assign','mark-register']) ? 'show' : '' }}" id="laravelExamp">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'type' ? 'active' : '' }}">
                            <a href="{{ route('type') }}">
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

                        <li class="{{ $elementActive == 'settings' ? 'active' : '' }}">
                            <a href="{{ route('settings') }}">
                                <span class="sidebar-mini-icon">{{ __('S') }}</span>
                                <span class="sidebar-normal">{{ __(' Settings ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="{{ in_array($elementActive, ['fees','fees-manage']) ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['fees','fees-manage']) ? 'true' : 'false' }}" href="#laravelEx">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <p>
                        {{ __('Fees') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['fees','fees-manage']) ? 'show' : '' }}" id="laravelEx">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'fees-manage' ? 'active' : '' }}">
                            <a href="{{ route('general-setting') }}">
                                <span class="sidebar-mini-icon">{{ __('F') }}</span>
                                <span class="sidebar-normal">{{ __(' Fees ') }}</span>
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
                <a href="{{ route('gallary') }}">
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
            <li class="{{ $elementActive == 'events' ? 'active' : '' }}">
                <a href="{{ route('student-dashboard') }}">
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
            <li class="{{ $elementActive == 'gallary' ? 'active' : '' }}">
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
                    <li class="{{ in_array($elementActive, ['add-fees', 'manage-payment', 'student-payment']) ? 'active' : '' }}">
                        <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['add-fees', 'manage-payment', 'student-payment']) ? 'true' : 'false' }}" href="#laravelExamplesss">
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                            <p>{{ __('Manage Fees Payment') }}</p>
                        </a>
                    </li>
                    <div class="collapse {{ in_array($elementActive, ['add-fees', 'manage-payment', 'student-payment']) ? 'show' : '' }}" id="laravelExamplesss">
                        <ul class="nav">
                            <li class="{{ $elementActive == 'add-fees' ? 'active' : '' }}">
                                <a href="{{ route('add-fees') }}">
                                    <span class="sidebar-mini-icon">{{ __(' AF') }}</span>
                                    <span class="sidebar-normal">{{ __(' Add Fees') }}</span>
                                </a>
                            </li>
                            <li class="{{ $elementActive == 'manage-payment' ? 'active' : '' }}">
                                <a href="{{ route('accountant-dashboard') }}">
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