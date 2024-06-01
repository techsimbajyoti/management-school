@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'student-list'
])
@section('content')
<div class="content">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if (session('password_status'))
        <div class="alert alert-success" role="alert">
            {{ session('password_status') }}
        </div>
    @endif
    
    <div class="row">
        <div class="col-md-12">
            <div class="col-12">
            
                <form action="" method="" id="">
                    @csrf
                    <div class="card ot-card mb-24 position-relative z_1 ">
                        <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                            <h3 class="mb-0 title">Filtering</h3>
                            <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                            <div class="single_large_selectBox">
                                <select id="getSections" class="class nice-select niceSelect bordered_style wide " name="class" required>
                                <option value>Select class</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                </select>
                            </div>
                                <div class="single_large_selectBox">
                                    <select class="class nice-select niceSelect bordered_style wide sections" name="section" required>
                                        <option value>Select section</option>
                                    </select>
                                </div>
                                
                                <div class="form-group single_large_selectBox">
                                    <button class="btn btn-lg ot-btn-primary equal-dimensions search-student" type="submit">
                                        <i class="fa fa-search"></i> Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                   

                                  
                <div class="table-content table-basic mt-20 student-list" style="display:none;">
                    <div class="card ot-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0 title">Student list</h4><a href="{{ route('admit-student') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-plus"></i> Add</a>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered role-table">
                                    <thead class="thead">
                                        <tr>
                                        <th class="serial">SR No.</th>
                                        <th class="purchase">Admission NO</th>
                                        <th class="purchase">Roll NO</th>
                                        <th class="purchase">Student name</th>
                                        <th class="purchase">Class (Section)	</th>
                                        <th class="purchase">Parent name</th>
                                        <th class="action">Date Of Birth</th>
                                        <th class="action">Gender</th>
                                        <th class="action">Contact</th>
                                        <th class="action">Status</th>
                                        <th class="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr id="row_7">
                                            <td class="serial">1</td>
                                            <td>20231114</td>
                                            <td></td>
                                            
                                            <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px"><a href="{{ route('view-student')}}">John</a></td>
                                            <td>Two (A)</td>
                                            <td>Parent5</td>
                                            <td>12 Apr 2021</td>
                                            <td>Male</td>
                                            <td>658932654</td>


                                            <td><span class="badge-basic-success-text">Active</span></td>
                                            <td class="action">
                                                <div class="dropdown dropdown-action">
                                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                            <a href="{{ route('view-student') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                            <a href="{{ route('edit-student') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                            <a href="{{ route('delete-student') }}" class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr id="row_7">
                                            <td class="serial">2</td>
                                            <td>2023111</td>
                                            <td></td>
                                           
                                            <td> <img src="{{asset('paper/img/dummy-image.png')}}" height="40px" width="40px"><a href="{{ route('view-student')}}">William</a></td>
                                            <td>Two (A)</td>
                                            <td>Parent8</td>
                                            <td>10 Jan 2024</td>
                                            <td>Male</td>
                                            <td>0147852111</td>


                                            <td><span class="badge-basic-success-text">Active</span></td>
                                            <td class="action">
                                                <div class="dropdown dropdown-action">
                                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                            <a href="{{ route('view-student') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                            <a href="{{ route('edit-student') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                            <a href="{{ route('delete-student') }}" class="dropdown-item"><i class="fa fa-trash" onclick="return confirm('Are you sure you want to delete?')"></i>  {{ __('Delete') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection 
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.student-list').hide();

            var sections = {
                1: ["A", "B", "C"],
                2: ["D", "E"],
                3: ["F", "G", "H", "I"]
            };

            $('#getSections').change(function() {
                var classId = $(this).val();
                var $sectionsDropdown = $('.sections');
                $sectionsDropdown.empty();
                $sectionsDropdown.append('<option value="">Select section</option>');

                if (sections[classId]) {
                    sections[classId].forEach(function(section) {
                        $sectionsDropdown.append('<option value="' + section + '">' + section + '</option>');
                    });
                }
            });

            $('form').submit(function(event) {
                event.preventDefault(); // Prevent form from submitting normally
                $('.student-list').show(); // Show the student list
            });
        });
    </script>
@endpush






                               
                               