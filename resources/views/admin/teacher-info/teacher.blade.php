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
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 title">Teachers</h4><a href="{{ route('admit-teachers') }}" class="btn btn-lg ot-btn-primary"><span class="">Add</span></a>
                    </div>
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
                            <th class="purchase">Designation</th>
                            <th class="purchase">Email</th>
                            <th class="purchase">Phone</th>
                            <th class="purchase">Status</th>
                            <th class="action">Action</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <tr id="row_15">
                                <td class="serial">1</td>
                                <td class="serial">10012</td>
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
                                <td>Instructor</td>
                                <td>History</td>
                                <td>Instructor</td>
                                <td>
                                    <a href="" class="__cf_email__" data-cfemail="e087928183858d818495858b85a08d81898cce838f8d">[email&nbsp;protected]</a>
                                </td>
                                <td>07063777851</td>
                                <td><span class="badge-basic-success-text">Active</span></td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-teachers') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                <a href="{{ route('edit-teachers') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                <a href="{{ route('delete-teachers') }}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="row_14">
                                <td class="serial">2</td>
                                <td class="serial">12</td>
                                <td>
                                    <div class="">
                                    <a href="">
                                    <div class="user-card">
                                        <div class="user-avatar"></div>
                                        <div class="user-info">
                                        Jeric Patulot
                                        </div>
                                    </div></a>
                                    </div>
                                </td>
                                <td>Instructor</td>
                                <td>History</td>
                                <td>Admin</td>
                                <td>
                                    <a href="" class="__cf_email__" data-cfemail="462c68362732332a293206353f2823342b273e3e6825292b">[email&nbsp;protected]</a>
                                </td>
                                <td>09178880009</td>
                                <td><span class="badge-basic-success-text">Active</span></td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('view-teachers') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                <a href="{{ route('edit-teachers') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                <a href="{{ route('delete-teachers') }}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
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