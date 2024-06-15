@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'teacher-class-routine'
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
                    <h4 class="mb-0">Class Routine</h4>
                    {{-- <a href="" class="btn btn-lg ot-btn-primary"><i class="fa fa-plus"></i> Add</a> --}}
                  </div>
                  <hr>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered role-table myTable">
                        <thead class="thead">
                          <tr>
                            <th class="serial">SR No.</th>
                            <th class="purchase">Class (Section)</th>
                            <th class="purchase">Shift</th>
                            <th class="purchase">Day</th>
                            {{-- <th class="action">Action</th> --}}
                          </tr>
                        </thead>
                        <tbody class="tbody">
                          <tr id="row_36">
                            <td class="serial">1</td>
                            <td>One (A)</td>
                            <td>Morning</td>
                            <td>Saturday</td>
                            {{-- <td class="action">
                              <div class="dropdown dropdown-action">
                                <ul class="dropdown-menu dropdown-menu-end">
                                  <li>
                                    <a class="dropdown-item" href="https://school.onesttech.com/class-routine/edit/36">Edit</a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('class-routine/delete', 36)"><span>Delete</span></a>
                                  </li>
                                </ul>
                              </div>
                            </td> --}}
                          </tr>
                          <tr id="row_35">
                            <td class="serial">2</td>
                            <td>Two (A)</td>
                            <td>Afternoon</td>
                            <td>Monday</td>
                            {{-- <td class="action">
                              <div class="dropdown dropdown-action">
                                <ul class="dropdown-menu dropdown-menu-end">
                                  <li>
                                    <a class="dropdown-item" href="https://school.onesttech.com/class-routine/edit/35">Edit</a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('class-routine/delete', 35)"><span>Delete</span></a>
                                  </li>
                                </ul>
                              </div>
                            </td> --}}
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
