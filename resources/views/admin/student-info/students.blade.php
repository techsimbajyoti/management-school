@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'students'
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
                <form action="" method="" id="marksheed">
                    @csrf
                    <div class="card ot-card mb-24 position-relative z_1">
                    <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                    <h3 class="mb-0 title">Filtering</h3>
                    <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                    <div class="single_large_selectBox">
                    <input class="form-control ot-input" name="select_class" list="datalistOptions" id="exampleDataList" placeholder="Enter Class" value>
                    </div>
                    <div class="single_large_selectBox">
                        <input class="form-control ot-input" name="select_section" list="datalistOptions" id="exampleDataList" placeholder="Enter Section" value>
                    </div>
                    <div class="single_large_selectBox">
                    <input class="form-control ot-input" name="keyword" list="datalistOptions" id="exampleDataList" placeholder="Enter keyword" value>
                    </div>
                    <button class="btn btn-md ot-btn-info" type="submit">
                    Search
                    </button>
                    </div>
                    </div>
                    </div>
                </form>
                <div class="table-content table-basic mt-20">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0 title">Student list</h4><a href="{{ route('admit-student') }}" class="btn btn-lg ot-btn-primary"><span class="">Add</span></a>
                        </div>
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
                                        <th class="purchase">Guardian name</th>
                                        <th class="action">Gender</th>
                                        <th class="action">Mobile number</th>
                                        <th class="action">Status</th>
                                        <th class="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr id="row_7">
                                            <td class="serial">1</td>
                                            <td>20231114</td>
                                            <td></td>
                                            
                                            <td>John</td>
                                            <td>Two (A)</td>
                                            <td>Guardian5</td>
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
                                            
                                            <td>William</td>
                                            <td>Two (A)</td>
                                            <td>Guardian8</td>
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
                                        <tr id="row_7">
                                            <td class="serial">3</td>
                                            <td>2023112</td>
                                            <td></td>
                                            
                                            <td>Sam</td>
                                            <td>One (A)</td>
                                            <td>Guardian1</td>
                                            <td>09 Jan 2024</td>
                                            <td>Male</td>
                                            <td>147852112</td>


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
                                        <tr id="row_7">
                                            <td class="serial">4</td>
                                            <td>2023113</td>
                                            <td></td>
                                            
                                            <td>Jack</td>
                                            <td>Two (A)</td>
                                            <td>Guardian4</td>
                                            <td>08 Jan 2024</td>
                                            <td>Male</td>
                                            <td>0147852113</td>


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
                                        <tr id="row_7">
                                            <td class="serial">5</td>
                                            <td>20231115</td>
                                            <td></td>
                                            
                                            <td>Sophia</td>
                                            <td>Two (A)</td>
                                            <td>Guardian5</td>
                                            <td>07 Jan 2024</td>
                                            <td>Female</td>
                                            <td>0147852114</td>


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
    {{-- <div class="row">
       
        <div class="col-md-12">
            
            
            <div class="card">
                <div class="card-header">
                           
                     <h5 class="title">{{ __('Filtering') }}</h5>
                    <div class="row">
                                     
                      <div class= "col-md-3"> 
                        <select id="getSections" class="class nice-select niceSelect bordered_style wide " name="class">
                            <option value>Select class</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                      </div>
                      <div class="col-md-3"> 
                        <div class="single_large_selectBox">
                            <select class="sections section nice-select niceSelect bordered_style wide " name="section">
                                <option value>Select section</option>
                            </select>
                        </div>
                      </div>  
                        <div class = "col-md-3"> 
                            <div class="single_large_selectBox">
                                <input class="form-control ot-input" name="keyword" list="datalistOptions" id="exampleDataList" placeholder="Enter keyword" value>
                            </div>
                        </div>
                        <div class = "col-md-3"> 
                            <button class="btn btn-primary" type="submit">
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
             
        
        <form class="col-md-12" action="" method="POST">
                @csrf
                            
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Student List') }}</h5>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary">{{ __('+Add') }}</button>
                        </div>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered role-table">
                                <thead class="thead">
                                    <tr>
                                    <th class="serial">SR No.</th>
                                    <th class="purchase">Admission NO</th>
                                    <th class="purchase">Roll NO</th>
                                    <th class="purchase">Student name</th>
                                    <th class="purchase">Class (Section)</th>
                                    <th class="purchase">Guardian name</th>
                                    <th class="purchase">Date of birth</th>
                                    <th class="purchase">Gender</th>
                                    <th class="purchase">Mobile number</th>
                                    <th class="purchase">Status</th>
                                    <th class="action">Action</th>
                                    </tr>
                                </thead>
                        <tbody class="tbody">
                            <tr id="row_14">
                                <td class="serial">1</td>
                                <td class="serial">20231114</td>
                                <td class="serial"></td>
                                <td>John</td>
                                <td>Two (A)</td>
                                <td>Guardian5</td>
                                <td>12 Apr 2021</td>
                                <td>Male</td>
                                <td>01478521114</td>
                                <td>
                                <span class="badge-basic-success-text">Active</span>
                                </td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-student')}}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                <a href="{{ route('edit-student')}}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                <a href="{{ route('delete-student')}}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                                <tr id="row_1">
                                <td class="serial">2</td>
                                <td class="serial">2023111</td>
                                <td class="serial"></td>
                                <td>William </td>
                                <td>Two (A)</td>
                                <td>Guardian8</td>
                                <td>10 Jan 2024</td>
                                <td>Male</td>
                                <td>0147852111</td>
                                <td>
                                <span class="badge-basic-success-text">Active</span>
                                </td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-student')}}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                <a href="{{ route('edit-student')}}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                <a href="{{ route('delete-student')}}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                                <tr id="row_2">
                                <td class="serial">3</td>
                                <td class="serial">2023112</td>
                                <td class="serial"></td>
                                <td>Richard</td>
                                <td>Two (A)</td>
                                <td>Guardian1</td>
                                <td>09 Jan 2024</td>
                                <td>Male</td>
                                <td>0147852112</td>
                                <td>
                                <span class="badge-basic-success-text">Active</span>
                                </td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-student')}}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                <a href="{{ route('edit-student')}}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                <a href="{{ route('delete-student')}}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="row_3">
                                <td class="serial">4</td>
                                <td class="serial">2023113</td>
                                <td class="serial"></td>
                                <td>Smith</td>
                                <td>Two (A)</td>
                                <td>Guardian4</td>
                                <td>08 Jan 2024</td>
                                <td>Female</td>
                                <td>0147852113</td>
                                <td>
                                <span class="badge-basic-success-text">Active</span>
                                </td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-student')}}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                <a href="{{ route('edit-student')}}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                <a href="{{ route('delete-student')}}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                                <tr id="row_4">
                                <td class="serial">5</td>
                                <td class="serial">2023114</td>
                                <td class="serial"></td>
                                <td>Max</td>
                                <td>Two (A)</td>
                                <td>Guardian5</td>
                                <td>07 Jan 2024</td>
                                <td>Female</td>
                                <td>0147852114</td>
                                <td>
                                <span class="badge-basic-success-text">Active</span>
                                </td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-student')}}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                <a href="{{ route('edit-student')}}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                <a href="{{ route('delete-student')}}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="row_5">
                                <td class="serial">6</td>
                                <td class="serial">2023115</td>
                                <td class="serial"></td>
                                <td>Sam </td>
                                <td>Two (A)</td>
                                <td>Guardian8</td>
                                <td>06 Jan 2024</td>
                                <td>Female</td>
                                <td>0147852115</td>
                                <td>
                                <span class="badge-basic-success-text">Active</span>
                                </td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-student')}}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                <a href="{{ route('edit-student')}}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                <a href="{{ route('delete-student')}}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="row_6">
                                <td class="serial">7</td>
                                <td class="serial">2023116</td>
                                <td class="serial"></td>
                                <td>Dereck</td>
                                <td>Two (A)</td>
                                <td>Guardian6</td>
                                <td>05 Jan 2024</td>
                                <td>Female</td>
                                <td>0147852116</td>
                                <td>
                                <span class="badge-basic-success-text">Active</span>
                                </td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-student')}}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                <a href="{{ route('edit-student')}}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                <a href="{{ route('delete-student')}}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="row_7">
                                <td class="serial">8</td>
                                <td class="serial">2023117</td>
                                <td class="serial"></td>
                                <td>Thomas</td>
                                <td>Two (A)</td>
                                <td>Guardian10</td>
                                <td>04 Jan 2024</td>
                                <td>Female</td>
                                <td>0147852117</td>
                                <td>
                                <span class="badge-basic-success-text">Active</span>
                                </td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-student')}}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                <a href="{{ route('edit-student')}}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                <a href="{{ route('delete-student')}}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                            <tr id="row_9">
                                <td class="serial">9</td>
                                <td class="serial">2023119</td>
                                <td class="serial"></td>
                                <td>Tim</td>
                                <td>Two (A)</td>
                                <td>Guardian6</td>
                                <td>02 Jan 2024</td>
                                <td>Male</td>
                                <td>0147852119</td>
                                 <td>
                                <span class="badge-basic-success-text">Active</span>
                                </td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-student')}}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                <a href="{{ route('edit-student')}}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                <a href="{{ route('delete-student')}}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
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
        </form>
        </div>
    </div> --}}











{{-- <div class="table-content table-basic mt-20">
<div class="card">
<div class="card-header d-flex justify-content-between align-items-center">
<h4 class="mb-0">Student list</h4>
<a href="https://school.onesttech.com/student/create" class="btn btn-lg ot-btn-primary">
<span><i class="fa-solid fa-plus"></i> </span>
<span class>Add</span>
</a>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered role-table">
<thead class="thead">
<tr>
<th class="serial">SR No.</th>
<th class="purchase">Admission NO</th>
<th class="purchase">Roll NO</th>
<th class="purchase">Student name</th>
<th class="purchase">Class (Section)</th>
<th class="purchase">Guardian name</th>
<th class="purchase">Date of birth</th>
<th class="purchase">Gender</th>
<th class="purchase">Mobile number</th>
<th class="purchase">Status</th>
<th class="action">Action</th>
</tr>
</thead>
<tbody class="tbody">
<tr id="row_14">
<td class="serial">1</td>
<td class="serial">20231114</td>
<td class="serial"></td>
<td>
<div class>
<a href="https://school.onesttech.com/student/show/14">
<div class="user-card">
<div class="user-avatar">
<img src="https://school.onesttech.com/backend/uploads/default-images/40X40.webp" alt>
</div>
<div class="user-info">
Student 1114
</div>
</div>
</a>
</div>
</td>
<td>Two (A)</td>
<td>Guardian5</td>
<td>12 Apr 2021</td>
<td>Male</td>
<td>01478521114</td>
<td>
<span class="badge-basic-success-text">Active</span>
</td>
<td class="action">
<div class="dropdown dropdown-action">
<button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fa-solid fa-ellipsis"></i>
</button>
<ul class="dropdown-menu dropdown-menu-end ">
<li>
<a class="dropdown-item" href="https://school.onesttech.com/student/edit/98"><span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
Edit</a>
</li>
<li>
<a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('student/delete', 98)">
<span class="icon mr-8"><i class="fa-solid fa-trash-can"></i></span>
<span>Delete</span>
</a>
</li>
</ul>
</div>
</td>
</tr>
<tr id="row_1">
<td class="serial">2</td>
<td class="serial">2023111</td>
<td class="serial"></td>
<td>
<div class>
<a href="https://school.onesttech.com/student/show/1">
<div class="user-card">
<div class="user-avatar">
<img src="https://school.onesttech.com/backend/uploads/default-images/40X40.webp" alt>
</div>
<div class="user-info">
Student 111
</div>
</div>
</a>
</div>
</td>
<td>Two (A)</td>
<td>Guardian8</td>
<td>10 Jan 2024</td>
<td>Male</td>
<td>0147852111</td>
<td>
<span class="badge-basic-success-text">Active</span>
</td>
<td class="action">
<div class="dropdown dropdown-action">
<button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fa-solid fa-ellipsis"></i>
</button>
<ul class="dropdown-menu dropdown-menu-end ">
<li>
<a class="dropdown-item" href="https://school.onesttech.com/student/edit/85"><span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
Edit</a>
</li>
<li>
<a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('student/delete', 85)">
<span class="icon mr-8"><i class="fa-solid fa-trash-can"></i></span>
<span>Delete</span>
</a>
</li>
</ul>
</div>
</td>
</tr>
<tr id="row_2">
<td class="serial">3</td>
<td class="serial">2023112</td>
<td class="serial"></td>
<td>
<div class>
<a href="https://school.onesttech.com/student/show/2">
<div class="user-card">
<div class="user-avatar">
<img src="https://school.onesttech.com/backend/uploads/default-images/40X40.webp" alt>
</div>
<div class="user-info">
Student 112
</div>
</div>
</a>
</div>
</td>
<td>Two (A)</td>
<td>Guardian1</td>
<td>09 Jan 2024</td>
<td>Male</td>
<td>0147852112</td>
<td>
<span class="badge-basic-success-text">Active</span>
</td>
<td class="action">
<div class="dropdown dropdown-action">
<button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fa-solid fa-ellipsis"></i>
</button>
<ul class="dropdown-menu dropdown-menu-end ">
<li>
<a class="dropdown-item" href="https://school.onesttech.com/student/edit/86"><span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
Edit</a>
</li>
<li>
<a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('student/delete', 86)">
<span class="icon mr-8"><i class="fa-solid fa-trash-can"></i></span>
<span>Delete</span>
</a>
</li>
</ul>
</div>
</td>
</tr>
<tr id="row_3">
<td class="serial">4</td>
<td class="serial">2023113</td>
<td class="serial"></td>
<td>
<div class>
<a href="https://school.onesttech.com/student/show/3">
<div class="user-card">
<div class="user-avatar">
<img src="https://school.onesttech.com/backend/uploads/default-images/40X40.webp" alt>
</div>
<div class="user-info">
Student 113
</div>
</div>
</a>
</div>
</td>
<td>Two (A)</td>
<td>Guardian4</td>
<td>08 Jan 2024</td>
<td>Female</td>
<td>0147852113</td>
<td>
<span class="badge-basic-success-text">Active</span>
</td>
<td class="action">
<div class="dropdown dropdown-action">
<button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fa-solid fa-ellipsis"></i>
</button>
<ul class="dropdown-menu dropdown-menu-end ">
<li>
<a class="dropdown-item" href="https://school.onesttech.com/student/edit/87"><span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
Edit</a>
</li>
<li>
<a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('student/delete', 87)">
<span class="icon mr-8"><i class="fa-solid fa-trash-can"></i></span>
<span>Delete</span>
</a>
</li>
</ul>
</div>
</td>
</tr>
<tr id="row_4">
<td class="serial">5</td>
<td class="serial">2023114</td>
<td class="serial"></td>
<td>
<div class>
<a href="https://school.onesttech.com/student/show/4">
<div class="user-card">
<div class="user-avatar">
<img src="https://school.onesttech.com/backend/uploads/default-images/40X40.webp" alt>
</div>
<div class="user-info">
Student 114
</div>
</div>
</a>
</div>
</td>
<td>Two (A)</td>
<td>Guardian5</td>
<td>07 Jan 2024</td>
<td>Female</td>
<td>0147852114</td>
<td>
<span class="badge-basic-success-text">Active</span>
</td>
<td class="action">
<div class="dropdown dropdown-action">
<button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fa-solid fa-ellipsis"></i>
</button>
<ul class="dropdown-menu dropdown-menu-end ">
<li>
<a class="dropdown-item" href="https://school.onesttech.com/student/edit/88"><span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
Edit</a>
</li>
<li>
<a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('student/delete', 88)">
<span class="icon mr-8"><i class="fa-solid fa-trash-can"></i></span>
<span>Delete</span>
</a>
</li>
</ul>
</div>
</td>
</tr>
<tr id="row_5">
<td class="serial">6</td>
<td class="serial">2023115</td>
<td class="serial"></td>
<td>
<div class>
<a href="https://school.onesttech.com/student/show/5">
<div class="user-card">
<div class="user-avatar">
<img src="https://school.onesttech.com/backend/uploads/default-images/40X40.webp" alt>
</div>
<div class="user-info">
Student 115
</div>
</div>
</a>
</div>
</td>
<td>Two (A)</td>
<td>Guardian8</td>
<td>06 Jan 2024</td>
<td>Female</td>
<td>0147852115</td>
<td>
<span class="badge-basic-success-text">Active</span>
</td>
<td class="action">
<div class="dropdown dropdown-action">
<button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fa-solid fa-ellipsis"></i>
</button>
<ul class="dropdown-menu dropdown-menu-end ">
<li>
<a class="dropdown-item" href="https://school.onesttech.com/student/edit/89"><span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
Edit</a>
</li>
<li>
<a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('student/delete', 89)">
<span class="icon mr-8"><i class="fa-solid fa-trash-can"></i></span>
<span>Delete</span>
</a>
</li>
</ul>
</div>
</td>
</tr>
<tr id="row_6">
<td class="serial">7</td>
<td class="serial">2023116</td>
<td class="serial"></td>
<td>
<div class>
<a href="https://school.onesttech.com/student/show/6">
<div class="user-card">
<div class="user-avatar">
<img src="https://school.onesttech.com/backend/uploads/default-images/40X40.webp" alt>
</div>
<div class="user-info">
Student 116
</div>
</div>
</a>
</div>
</td>
<td>Two (A)</td>
<td>Guardian6</td>
<td>05 Jan 2024</td>
<td>Female</td>
<td>0147852116</td>
<td>
<span class="badge-basic-success-text">Active</span>
</td>
<td class="action">
<div class="dropdown dropdown-action">
<button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fa-solid fa-ellipsis"></i>
</button>
<ul class="dropdown-menu dropdown-menu-end ">
<li>
<a class="dropdown-item" href="https://school.onesttech.com/student/edit/90"><span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
Edit</a>
</li>
<li>
<a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('student/delete', 90)">
<span class="icon mr-8"><i class="fa-solid fa-trash-can"></i></span>
<span>Delete</span>
</a>
</li>
</ul>
</div>
</td>
</tr>
<tr id="row_7">
<td class="serial">8</td>
<td class="serial">2023117</td>
<td class="serial"></td>
<td>
<div class>
<a href="https://school.onesttech.com/student/show/7">
<div class="user-card">
<div class="user-avatar">
<img src="https://school.onesttech.com/backend/uploads/default-images/40X40.webp" alt>
</div>
<div class="user-info">
Student 117
</div>
</div>
</a>
</div>
</td>
<td>Two (A)</td>
<td>Guardian10</td>
<td>04 Jan 2024</td>
<td>Female</td>
<td>0147852117</td>
<td>
<span class="badge-basic-success-text">Active</span>
</td>
<td class="action">
<div class="dropdown dropdown-action">
<button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fa-solid fa-ellipsis"></i>
</button>
<ul class="dropdown-menu dropdown-menu-end ">
<li>
<a class="dropdown-item" href="https://school.onesttech.com/student/edit/91"><span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
Edit</a>
</li>
<li>
<a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('student/delete', 91)">
<span class="icon mr-8"><i class="fa-solid fa-trash-can"></i></span>
<span>Delete</span>
</a>
</li>
</ul>
</div>
</td>
</tr>
<tr id="row_9">
<td class="serial">9</td>
<td class="serial">2023119</td>
<td class="serial"></td>
<td>
<div class>
<a href="https://school.onesttech.com/student/show/9">
<div class="user-card">
<div class="user-avatar">
<img src="https://school.onesttech.com/backend/uploads/default-images/40X40.webp" alt>
</div>
<div class="user-info">
Student 119
</div>
</div>
</a>
</div>
</td>
<td>Two (A)</td>
<td>Guardian6</td>
<td>02 Jan 2024</td>
<td>Male</td>
<td>0147852119</td>
<td>
<span class="badge-basic-success-text">Active</span>
</td>
<td class="action">
<div class="dropdown dropdown-action">
<button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fa-solid fa-ellipsis"></i>
</button>
<ul class="dropdown-menu dropdown-menu-end ">
<li>
<a class="dropdown-item" href="https://school.onesttech.com/student/edit/93"><span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
Edit</a>
</li>
<li>
<a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('student/delete', 93)">
<span class="icon mr-8"><i class="fa-solid fa-trash-can"></i></span>
<span>Delete</span>
</a>
</li>
</ul>
</div>
</td>
</tr>
<tr id="row_10">
<td class="serial">10</td>
<td class="serial">20231110</td>
<td class="serial"></td>
<td>
<div class>
<a href="https://school.onesttech.com/student/show/10">
<div class="user-card">
<div class="user-avatar">
<img src="https://school.onesttech.com/backend/uploads/default-images/40X40.webp" alt>
</div>
<div class="user-info">
Student 1110
</div>
</div>
</a>
</div>
</td>
<td>Two (A)</td>
<td>Guardian9</td>
<td>16 Apr 2021</td>
<td>Female</td>
<td>01478521110</td>
<td>
<span class="badge-basic-danger-text">Inactive</span>
</td>
<td class="action">
<div class="dropdown dropdown-action">
<button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fa-solid fa-ellipsis"></i>
</button>
<ul class="dropdown-menu dropdown-menu-end ">
<li>
<a class="dropdown-item" href="https://school.onesttech.com/student/edit/94"><span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
Edit</a>
</li>
<li>
<a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('student/delete', 94)">
<span class="icon mr-8"><i class="fa-solid fa-trash-can"></i></span>
<span>Delete</span>
</a>
</li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>
</div> --}}

    

   
        



 