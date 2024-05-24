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
                                <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end ">
                                <li>
                                <a class="dropdown-item" href=""><span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
                                Edit</a>
                                </li>
                                <li>
                                <a class="dropdown-item" href="javascript:void(0);">
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
                                <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end ">
                                <li>
                                <a class="dropdown-item" href=""><span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
                                Edit</a>
                                </li>
                                <li>
                                <a class="dropdown-item" href="javascript:void(0);">
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
                                <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end ">
                                <li>
                                <a class="dropdown-item" href=""><span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
                                Edit</a>
                                </li>
                                <li>
                                <a class="dropdown-item" href="javascript:void(0);">
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
                                <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end ">
                                <li>
                                <a class="dropdown-item" href=""><span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
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
                                <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end ">
                                <li>
                                <a class="dropdown-item" href=""><span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
                                Edit</a>
                                </li>
                                <li>
                                <a class="dropdown-item" href="javascript:void(0);">
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
                                <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end ">
                                <li>
                                <a class="dropdown-item" href=""><span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
                                Edit</a>
                                </li>
                                <li>
                                <a class="dropdown-item" href="javascript:void(0);">
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
                                <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end ">
                                <li>
                                <a class="dropdown-item" href=""><span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
                                Edit</a>
                                </li>
                                <li>
                                <a class="dropdown-item" href="javascript:void(0);">
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
                                <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end ">
                                <li>
                                <a class="dropdown-item" href=""><span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
                                Edit</a>
                                </li>
                                <li>
                                <a class="dropdown-item" href="javascript:void(0);">
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
                                <td>Tim</td>
                                <td>Two (A)</td>
                                <td>Guardian6</td>
                                <td>02 Jan 2024</td>
                                <td>Male</td>
                                <td>0147852119</td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </form>
        </div>
    </div>

@endsection










    

   
        



 