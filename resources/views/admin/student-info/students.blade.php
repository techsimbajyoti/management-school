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
                            <h4 class="mb-0 title">Student list</h4><a href="{{ route('admit-student') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-plus"> Add</i></a>
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