@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'parent'
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
                    <form action="" method="post" id="marksheed" enctype="multipart/form-data">
                        @csrf
                        <div class="card ot-card mb-24 position-relative z_1">
                        <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                        <h3 class="mb-0 title">Filtering</h3>
                        <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                        <div class="single_large_selectBox">
                        <input class="form-control ot-input" name="keyword" list="datalistOptions" id="exampleDataList" placeholder="Enter keyword" value>
                        </div>
                        <button class="btn btn-lg ot-btn-info" type="submit">
                            <i class="fa fa-search"></i> Search
                        </button>
                        </div>
                        </div>
                        </div>
                    </form>
                
                    <div class="table-content table-basic mt-20">
                        <div class="card ot-card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="mb-0 title">Parents list</h4><a href="{{ route('admit-parents') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-plus"></i> Add</a>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered role-table">
                                        <thead class="thead">
                                            <tr>
                                            <th class="serial">SR No.</th>
                                            <th class="purchase">Name</th>
                                            <th class="purchase">Phone</th>
                                            <th class="purchase">Email</th>
                                            <th class="purchase">Address</th>
                                            <th class="purchase">Status</th>
                                            <th class="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody">
                                            <tr id="row_7">
                                                <td class="serial">1</td>
                                                <td>Parents7</td>
                                                <td>12365857</td>
                                                <td>
                                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0e697b6f7c6a676f60394e69636f6762206d6163">[email&nbsp;protected]</a>
                                                </td>
                                                <td>Dhaka</td>
                                                <td><span class="badge-basic-success-text">Active</span></td>
                                                <td class="action">
                                                    <div class="dropdown dropdown-action">
                                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                                <a href="{{ route('view-parents') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                                <a href="{{ route('edit-parents') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                                <a href="{{ route('delete-parents') }}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="row_8">
                                                <td class="serial">2</td>
                                                <td>Parents8</td>
                                                <td>12365858</td>
                                                <td>
                                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7413011506101d151a4c341319151d185a171b19">[email&nbsp;protected]</a>
                                                </td>
                                                <td>Dhaka</td>
                                                <td><span class="badge-basic-success-text">Active</span></td>
                                                <td class="action">
                                                    <div class="dropdown dropdown-action">
                                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                                <a href="{{ route('view-parents') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                                <a href="{{ route('edit-parents') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                                <a href="{{ route('delete-parents') }}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="row_9">
                                                <td class="serial">3</td>
                                                <td>Parents9</td>
                                                <td>12365859</td>
                                                <td>
                                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="95f2e0f4e7f1fcf4fbacd5f2f8f4fcf9bbf6faf8">[email&nbsp;protected]</a>
                                                </td>
                                                <td>Dhaka</td>
                                                <td><span class="badge-basic-success-text">Active</span></td>
                                                <td class="action">
                                                    <div class="dropdown dropdown-action">
                                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                                <a href="{{ route('view-parents') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                                <a href="{{ route('edit-parents') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                                <a href="{{ route('delete-parents') }}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
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