@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'teacher-exam-routine'
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
                    <h4 class="mb-0">Exam Routine</h4>
                    {{-- <a href="https://school.onesttech.com/exam-routine/create" class="btn btn-lg ot-btn-primary"><span class="">Add</span></a> --}}
                  </div>
                  <hr>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered role-table myTable">
                        <thead class="thead">
                          <tr>
                            <th class="serial">SR No.</th>
                            <th class="purchase">Class (Section)</th>
                            <th class="purchase">Type</th>
                            <th class="purchase">Date</th>
                            {{-- <th class="action">Action</th> --}}
                          </tr>
                        </thead>
                        <tbody class="tbody">
                          <tr id="row_73">
                            <td class="serial">1</td>
                            <td>One (A)</td>
                            <td>Mid</td>
                            <td>07 May 2024</td>
                            {{-- <td class="action">
                              <div class="dropdown dropdown-action">
                                <ul class="dropdown-menu dropdown-menu-end">
                                  <li>
                                    <a class="dropdown-item" href="https://school.onesttech.com/exam-routine/edit/73">Edit</a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('exam-routine/delete', 73)"><span>Delete</span></a>
                                  </li>
                                </ul>
                              </div>
                            </td> --}}
                          </tr>
                          <tr id="row_72">
                            <td class="serial">2</td>
                            <td>Three (B)</td>
                            <td>Final</td>
                            <td>04 May 2024</td>
                            {{-- <td class="action">
                              <div class="dropdown dropdown-action">
                                <ul class="dropdown-menu dropdown-menu-end">
                                  <li>
                                    <a class="dropdown-item" href="https://school.onesttech.com/exam-routine/edit/72">Edit</a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('exam-routine/delete', 72)"><span>Delete</span></a>
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
