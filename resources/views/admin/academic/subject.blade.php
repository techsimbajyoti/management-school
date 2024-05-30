@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'subject'
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
                    <h4 class="mb-0">Subject</h4><a href="{{ route('add-subject') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-plus"></i> Add</a>
                  </div>
                  <hr>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered class-table">
                        <thead class="thead">
                          <tr>
                            <th class="serial">SR No.</th>
                            <th class="purchase">Name</th>
                            <th class="purchase">Code</th>
                            <th class="purchase">Type</th>
                            <th class="purchase">Status</th>
                            <th class="action">Action</th>
                          </tr>
                        </thead>
                        <tbody class="tbody">
                          <tr id="row_2">
                            <td class="serial">3</td>
                            <td>English</td>
                            <td>102</td>
                            <td>Theory</td>
                            <td><span class="badge-basic-success-text">Active</span></td>
                            <td class="action">
                                <div class="dropdown dropdown-action">
                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                            <a href="{{ route('edit-subject') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                            <a href="{{ route('delete-subject') }}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                          </tr>
                          <tr id="row_3">
                            <td class="serial">4</td>
                            <td>Math</td>
                            <td>103</td>
                            <td>Theory</td>
                            <td><span class="badge-basic-success-text">Active</span></td>
                            <td class="action">
                                <div class="dropdown dropdown-action">
                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                            <a href="{{ route('edit-subject') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                            <a href="{{ route('delete-subject') }}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                          </tr>
                          <tr id="row_4">
                            <td class="serial">5</td>
                            <td>Physics</td>
                            <td>104</td>
                            <td>Practical</td>
                            <td><span class="badge-basic-success-text">Active</span></td>
                            <td class="action">
                                <div class="dropdown dropdown-action">
                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                            <a href="{{ route('edit-subject') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                            <a href="{{ route('delete-subject') }}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                          </tr>
                          <tr id="row_5">
                            <td class="serial">6</td>
                            <td>Chemistry</td>
                            <td>105</td>
                            <td>Practical</td>
                            <td><span class="badge-basic-success-text">Active</span></td>
                            <td class="action">
                                <div class="dropdown dropdown-action">
                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                            <a href="{{ route('edit-subject') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                            <a href="{{ route('delete-subject') }}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
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
