@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'student-payment'
])

@section('content')
<style>
    .pay-now-container {
      display: flex;
      flex-direction: row;
      align-items: center;
    }
    .pay-now-container .form-control {
      flex: 1;
      margin-right: 5px;
    }
    .pay-now-container .btn {
      flex: 0;
    }
    .pay-now-column {
      width: 300px;
    }
    .table-responsive {
      overflow-x: auto;
    }
  </style>
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
                <div class="row">
                    <div class="col-12">
                      <div class="card ot-card mb-24 position-relative z_1">
                        <form action="" enctype="multipart/form-data" method="post" id="fees-collect" name="fees-collect">
                          @csrf
                          <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                            <h3 class="mb-0">Filtering</h3>
                            <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                              <div class="single_selectBox">
                                <select id="getSections" class="nice-select niceSelect bordered_style wide" name="class">
                                  <option value="">
                                    Select class
                                  </option>
                                  <option value="1">
                                    Complete Payment
                                  </option>
                                  <option value="2">
                                    Incomplete Payment
                                  </option>
                                </select>
                              </div>
                              <a class="btn btn-lg ot-btn-primary" id="search"><i class="fa fa-search"></i> Search</a>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="table-content table-basic mt-20">
                    <div class="card">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 all-payment">All Payments</h4>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered role-table" id="students_table">
                            <thead class="thead">
                              <tr>
                                <th class="purchase">Student name</th>
                                <th class="purchase">Admission NO</th>
                                <th class="purchase">Payment Ref</th>
                                <th class="purchase">Amount</th>
                                <th class="purchase">Paid</th>
                                <th class="purchase">Balance</th>
                                <th class="purchase">Pay Now</th>
                                <th class="purchase">Receipt No.</th>
                                <th class="purchase">Year</th>
                                <th class="purchase">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr id="document-file">
                                <td>Student 111</td>
                                <td>2023111</td>
                                <td>2024/538537</td>
                                <td>10000</td>
                                <td>0.00</td>
                                <td>10000</td>
                                <td class="pay-now-column">
                                    <form id="jq5xG0zx9YrLa6" method="post" class="ajax-pay" action="" name="jq5xG0zx9YrLa6">
                                      @csrf
                                      <div class="pay-now-container">
                                        <input min="1" max="500" id="val-jq5xG0zx9YrLa6" class="form-control" style="width:100px;" required placeholder="Pay Now" title="Pay Now" name="amt_paid" type="number">
                                        <a data-text="Pay" class="btn btn-danger" type="submit">Pay  <i class="fa-solid fa-paper-plane"></i></a>
                                      </div>
                                    </form>
                                </td>
                                <td>64035550</td>
                                <td>2018-2019</td>
                                <td class="action">
                                <div class="dropdown">
                                    <a href="#" class="btn ot-btn-primary" data-toggle="dropdown">...<i class="icon-arrow-down5"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left">
                                        <a href="" class="dropdown-item">Print Receipt</a>
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

@push('scripts')
<script>
    $(document).ready(function() {

        $('#getSections').click(function(){
            var amount = $(this).val();

            if(amount == 1){
                $('.all-payment').html('Complete Payment');
            }else if(amount == 2){
                $('.all-payment').html('Incomplete Payment');
            }else{
                $('.all-payment').html('All Payment');
            }
        })


        $('#student-fees').hide();
        $('.student-list').hide();

        $('#fees_group').click(function(){
            $('#student-fees').show();
        })

        $('#search').click(function(){
            $('.student-list').show();
        })

        var sections = {
                1: ["A", "B", "C"],
                2: ["D", "E"],
                3: ["F", "G", "H", "I"]
            };

            $('#getSections').change(function() {
                var classId = $(this).val();
                var $sectionsDropdown = $('.sections');
                $sectionsDropdown.empty();
                $sectionsDropdown.append('<option value="">Select section</option>');

                if (sections[classId]) {
                    sections[classId].forEach(function(section) {
                        $sectionsDropdown.append('<option value="' + section + '">' + section + '</option>');
                    });
                }
            });

            $('.search-student').click(function(){
                $('.student-disabled-list').show();
            })
    });
</script>
@endpush