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
                        {{ __('Manage Students') }}
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

                        <li class="{{ $elementActive == 'disabled-student' ? 'active' : '' }}">
                            <a href="{{ route('disabled-students') }}">
                                <span class="sidebar-mini-icon">{{ __('DS') }}</span>
                                <span class="sidebar-normal">{{ __(' Disabled Students ') }}</span>
                            </a>
                        </li>

                        <li class="{{ $elementActive == 'parent' ? 'active' : '' }}">
                            <a href="{{ route('parents') }}">
                                <span class="sidebar-mini-icon">{{ __('P') }}</span>
                                <span class="sidebar-normal">{{ __(' Parents ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="{{ in_array($elementActive, ['user', 'manage-staff', 'teacher', 'accountant', 'department', 'designation']) ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['user', 'manage-staff', 'teacher', 'accountant', 'department', 'designation']) ? 'true' : 'false' }}" href="#laravelExampless">
                    <i class='fas fa-chalkboard-teacher'></i>
                    <p>
                        {{ __('Manage Staff') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['user', 'manage-staff', 'teacher', 'accountant', 'department', 'designation']) ? 'show' : '' }}" id="laravelExampless">
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
                        <li class="{{ $elementActive == 'department' ? 'active' : '' }}">
                            <a href="{{ route('department') }}">
                                <span class="sidebar-mini-icon">{{ __('D') }}</span>
                                <span class="sidebar-normal">{{ __(' Department ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'designation' ? 'active' : '' }}">
                            <a href="{{ route('designation') }}">
                                <span class="sidebar-mini-icon">{{ __('D') }}</span>
                                <span class="sidebar-normal">{{ __(' Designation ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class="{{ in_array($elementActive, ['user', 'manage-academic', 'class', 'section', 'subject', 'assign-subject']) ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ in_array($elementActive, ['user', 'manage-academic', 'class', 'section', 'subject', 'assign-subject']) ? 'true' : 'false' }}" href="#laravelExamplesss">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <p>
                        {{ __('Manage Academic') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array($elementActive, ['user', 'manage-academic', 'class', 'section', 'subject', 'assign-subject']) ? 'show' : '' }}" id="laravelExamplesss">
                    <ul class="nav">
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