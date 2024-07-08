@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'fees-type'
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
                        <h4 class="mb-0">Fees type</h4><a href="{{route('add-fees-type')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-plus"></i> Add</a>
                      </div>
                      <hr>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered role-table myTable">
                            <thead class="thead">
                              <tr>
                                <th class="serial">SR No.</th>
                                <th class="purchase">Name</th>
                                <th class="purchase">Code</th>
                                <th class="purchase">Description</th>
                                <th class="purchase">Status</th>
                                <th class="action">Action</th>
                              </tr>
                            </thead>
                            <tbody class="tbody">
                              <tr id="row_1">
                                <td class="serial">1</td>
                                <td>january months fee</td>
                                <td>january months fee</td>
                                <td>january months fee Fees Type Description. Lorem ipsum dolor sit amet et justo od 1</td>
                                <td><span class="badge-basic-success-text">Active</span></td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('edit-fees-type') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                               <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                              </tr>
                              <tr id="row_2">
                                <td class="serial">2</td>
                                <td>february month fee</td>
                                <td>february month fee</td>
                                <td>february month fee Fees Type Description. Lorem ipsum dolor sit amet et justo od 1</td>
                                <td><span class="badge-basic-success-text">Active</span></td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('edit-fees-type') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                               <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                              </tr>
                              <tr id="row_3">
                                <td class="serial">3</td>
                                <td>march month fee</td>
                                <td>march month fee</td>
                                <td>march month fee Fees Type Description. Lorem ipsum dolor sit amet et justo od 1</td>
                                <td><span class="badge-basic-success-text">Active</span></td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('edit-fees-type') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
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