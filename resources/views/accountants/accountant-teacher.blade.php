@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'accountant-teacher'
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
            <div class="table-content table-basic mt-20">
                <div class="card ot-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 title">Staff</h4>
                    </div>
                    <hr>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered user-table myTable">
                        <thead class="thead">
                            <tr>
                            <th class="serial">SR No.</th>
                            <th class="purchase">Staff ID</th>
                            <th class="purchase">Name</th>
                            <th class="purchase">Roles</th>
                            <th class="purchase">Departments</th>
                            <th class="purchase">Email</th>
                            <th class="purchase">Contact</th>
                            <th class="purchase">Status</th>
                            <th class="purchase">Payment Status</th>
                            <th class="action">Action</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <tr id="row_15">
                                <td class="serial">1</td>
                                <td class="serial">10011</td>
                                <td>
                                    <div class="">
                                    <a href="">
                                    <div class="user-card">
                                        <div class="user-info">
                                        Grace Madueke
                                        </div>
                                    </div></a>
                                    </div>
                                </td>
                                <td>Admin</td>
                                <td>Administration</td>
                            
                                <td>
                                    <a href="" >demo@gmail.com</a>
                                </td>
                             
                                <td>0706526451</td>
                                <td><span class="badge-basic-success-text">Active</span></td>
                                <td>
                                    <input type="hidden" name="items[]" value="2">
                                    <input type="hidden" name="students[]" value="2">
                                    <input type="hidden" name="studentsRoll[]" value="2">
                                    <div class="remember-me d-flex align-items-center input-check-radio mb-20 gap-4 attendance">
                                        <div class="form-check d-flex align-items-center mt-6">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault1" name="teacher[1]" value="1">
                                            <label class="form-check-label ms-1" for="flexRadioDefault1"  style="padding-left:3px;">Full Paid</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mt-6">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault2" name="teacher[1]" value="2">
                                            <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault2">Partially Paid</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mt-6">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault3" name="teacher[1]" value="3" checked>
                                            <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault3">Outstanding</label>
                                        </div>
                                    </div>
                                </td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-teachers-detail') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="row_14">
                                <td class="serial">2</td>
                                <td class="serial">10012</td>
                                <td>
                                    <div class="">
                                    <a href="">
                                    <div class="user-card">
                                        <div class="user-info">
                                        Jeric Patulote
                                        </div>
                                    </div></a>
                                    </div>
                                </td>
                                <td>Accountant</td>
                                <td>Accounts</td>
                                
                                <td>
                                    <a href="">demo@gmail.com</a>
                                </td>
                               
                                <td>09178880009</td>
                                <td><span class="badge-basic-success-text">Active</span></td>
                                <td>
                                    <input type="hidden" name="items[]" value="2">
                                    <input type="hidden" name="students[]" value="2">
                                    <input type="hidden" name="studentsRoll[]" value="2">
                                    <div class="remember-me d-flex align-items-center input-check-radio mb-20 gap-4 attendance">
                                        <div class="form-check d-flex align-items-center mt-6">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault1" name="teacher[2]" value="1">
                                            <label class="form-check-label ms-1" for="flexRadioDefault1"  style="padding-left:3px;">Full Paid</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mt-6">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault2" name="teacher[2]" value="2">
                                            <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault2">Partially Paid</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mt-6">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault3" name="teacher[2]" value="3" checked>
                                            <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault3">Outstanding</label>
                                        </div>
                                    </div>
                                </td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-teachers') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="row_15">
                                <td class="serial">3</td>
                                <td class="serial">10013</td>
                                <td>
                                    <div class="">
                                    <a href="">
                                    <div class="user-card">
                                        <div class="user-info">
                                            Charlotte Harris
                                        </div>
                                    </div></a>
                                    </div>
                                </td>
                                <td>Teacher</td>
                                <td>Commerce</td>
                            
                                <td>
                                    <a href="" >demo@gmail.com</a>
                                </td>
                                
                                <td>02263264461</td>
                                <td><span class="badge-basic-success-text">Active</span></td>
                                <td>
                                    <input type="hidden" name="items[]" value="2">
                                    <input type="hidden" name="students[]" value="2">
                                    <input type="hidden" name="studentsRoll[]" value="2">
                                    <div class="remember-me d-flex align-items-center input-check-radio mb-20 gap-4 attendance">
                                        <div class="form-check d-flex align-items-center mt-6">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault1" name="teacher[3]" value="1">
                                            <label class="form-check-label ms-1" for="flexRadioDefault1"  style="padding-left:3px;">Full Paid</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mt-6">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault2" name="teacher[3]" value="2">
                                            <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault2">Partially Paid</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mt-6">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault3" name="teacher[3]" value="3" checked>
                                            <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault3">Outstanding</label>
                                        </div>
                                    </div>
                                </td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-teachers-detail') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="row_15">
                                <td class="serial">4</td>
                                <td class="serial">10014</td>
                                <td>
                                    <div class="">
                                    <a href="">
                                    <div class="user-card">
                                        <div class="user-info">
                                            Alexander Garcia
                                        </div>
                                    </div></a>
                                    </div>
                                </td>
                                <td>Teacher</td>
                                <td>Arts</td>
                            
                                <td>
                                    <a href="" >demo@gmail.com</a>
                                </td>
                                
                                <td>065837778514</td>
                                <td><span class="badge-basic-success-text">Active</span></td>
                                <td>
                                    <input type="hidden" name="items[]" value="2">
                                    <input type="hidden" name="students[]" value="2">
                                    <input type="hidden" name="studentsRoll[]" value="2">
                                    <div class="remember-me d-flex align-items-center input-check-radio mb-20 gap-4 attendance">
                                        <div class="form-check d-flex align-items-center mt-6">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault1" name="teacher[4]" value="1">
                                            <label class="form-check-label ms-1" for="flexRadioDefault1"  style="padding-left:3px;">Full Paid</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mt-6">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault2" name="teacher[4]" value="2">
                                            <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault2">Partially Paid</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mt-6">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault3" name="teacher[4]" value="3" checked>
                                            <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault3">Outstanding</label>
                                        </div>
                                    </div>
                                </td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-teachers-detail') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="row_15">
                                <td class="serial">5</td>
                                <td class="serial">10015</td>
                                <td>
                                    <div class="">
                                    <a href="">
                                    <div class="user-card">
                                        <div class="user-info">
                                            Lucas Thomas
                                        </div>
                                    </div></a>
                                    </div>
                                </td>
                                <td>Teacher</td>
                                <td>Science</td>
                            
                                <td>
                                    <a href="" >demo@gmail.com</a>
                                </td>
                               
                                <td>02283777851</td>
                                <td><span class="badge-basic-success-text">Active</span></td>
                                <td>
                                    <input type="hidden" name="items[]" value="2">
                                    <input type="hidden" name="students[]" value="2">
                                    <input type="hidden" name="studentsRoll[]" value="2">
                                    <div class="remember-me d-flex align-items-center input-check-radio mb-20 gap-4 attendance">
                                        <div class="form-check d-flex align-items-center mt-6">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault1" name="teacher[5]" value="1">
                                            <label class="form-check-label ms-1" for="flexRadioDefault1"  style="padding-left:3px;">Full Paid</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mt-6">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault2" name="teacher[5]" value="2">
                                            <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault2">Partially Paid</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mt-6">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault3" name="teacher[5]" value="3" checked>
                                            <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault3">Outstanding</label>
                                        </div>
                                    </div>
                                </td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-teachers-detail') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                               
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
@endsection
