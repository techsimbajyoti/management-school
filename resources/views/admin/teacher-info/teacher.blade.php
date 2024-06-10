@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'teacher'
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
                    <h4 class="mb-0 title">Staff</h4><a href="{{ route('admit-teachers') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-plus"></i> Add</a>
                    </div>
                    <hr>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered user-table">
                        <thead class="thead">
                            <tr>
                            <th class="serial">SR No.</th>
                            <th class="purchase">Staff ID</th>
                            <th class="purchase">Name</th>
                            <th class="purchase">Roles</th>
                            <th class="purchase">Departments</th>
                            <th class="purchase">Email</th>
                            <th class="purchase">Password</th>
                            <th class="purchase">Contact</th>
                            <th class="purchase">Status</th>
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
                                <td>123456789</td>
                                <td>0706526451</td>
                                <td><span class="badge-basic-success-text">Active</span></td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-teachers') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                <a href="{{ route('edit-teachers') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</button>
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
                                <td>123456789</td>
                                <td>09178880009</td>
                                <td><span class="badge-basic-success-text">Active</span></td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-teachers') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                <a href="{{ route('edit-teachers') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</button>
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
                                <td>123456789</td>
                                <td>02263264461</td>
                                <td><span class="badge-basic-success-text">Active</span></td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-teachers') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                <a href="{{ route('edit-teachers') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</button>
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
                                <td>123456789</td>
                                <td>065837778514</td>
                                <td><span class="badge-basic-success-text">Active</span></td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-teachers') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                <a href="{{ route('edit-teachers') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</button>
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
                                <td>123456789</td>
                                <td>02283777851</td>
                                <td><span class="badge-basic-success-text">Active</span></td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-teachers') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                <a href="{{ route('edit-teachers') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</button>
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