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
                    <h4 class="mb-0">Subject</h4>
                  <hr>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered class-table myTable">
                        <thead class="thead">
                          <tr>
                            <th class="serial">SR No.</th>
                            <th class="purchase">Name</th>
                            <th class="purchase">Code</th>
                            <th class="purchase">Type</th>
                        
                          </tr>
                        </thead>
                        <tbody class="tbody">
                          <tr id="row_2">
                            <td class="serial">3</td>
                            <td>English</td>
                            <td>102</td>
                            <td>Theory</td>
                           
                          </tr>
                          <tr id="row_3">
                            <td class="serial">4</td>
                            <td>Math</td>
                            <td>103</td>
                            <td>Theory</td>
                           
                          </tr>
                          <tr id="row_4">
                            <td class="serial">5</td>
                            <td>Physics</td>
                            <td>104</td>
                            <td>Practical</td>
                            
                          </tr>
                          <tr id="row_5">
                            <td class="serial">6</td>
                            <td>Chemistry</td>
                            <td>105</td>
                            <td>Practical</td>
                           
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
