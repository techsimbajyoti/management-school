@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'fees-master'
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
                        <h4 class="mb-0">Fees master</h4><a href="{{route('add-master')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-plus"></i> Add</a>
                      </div>
                      <hr>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered role-table">
                            <thead class="thead">
                              <tr>
                                <th class="serial">SR No.</th>
                                <th class="purchase">Group</th>
                                <th class="purchase">Type</th>
                                <th class="purchase">Due date</th>
                                <th class="purchase">Amount (৳)</th>
                                <th class="purchase">Fine type</th>
                                <th class="purchase">Percentage</th>
                                <th class="purchase">Fine amount (৳)</th>
                                <th class="purchase">Status</th>
                                <th class="action">Action</th>
                              </tr>
                            </thead>
                            <tbody class="tbody">
                              <tr>
                                <td colspan="100%" class="text-center gray-color">
                                  <img src="https://school.onesttech.com/images/no_data.svg" alt="no_data" class="mb-primary" width="100">
                                  <p class="mb-0 text-center">No data available</p>
                                  <p class="mb-0 text-center text-secondary font-size-90">Please add new entity regarding this table</p>
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