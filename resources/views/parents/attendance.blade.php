@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'attendance'
])
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12 p-0 search-form">
                <form action="https://school.onesttech.com/parent-panel-attendance/search" method="post" id="marksheed" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="fE3jhMKUFkldbNrDIJ5XZv8piyHC35HDe5tRxIwb"> <div class="card ot-card mb-24 position-relative z_1">
                <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                <h3 class="mb-0">Filtering</h3>
                <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                
                <div class="single_large_selectBox">
                <select class="nice-select niceSelect bordered_style wide " name="student">
                <option value>Select student</option>
                <option selected value="2">Student 112
                <option value="17">Student 123
                <option value="29">Student 211
                <option value="54">Student 2212
                <option value="65">Student 319
                <option value="79">Student 329
                </select>
                </div>
                <div class="single_large_selectBox">
                <select class="class nice-select niceSelect bordered_style wide" name="view">
                <option value="0">Short view</option>
                <option value="1">Details view</option>
                </select>
                </div>
                <div class="single_large_selectBox">
                <input value name="month" class="form-control ot-input " type="month" placeholder="Search month">
                </div>
                <div class="single_large_selectBox">
                <input value name="date" class="form-control ot-input " type="date">
                </div>
                <button class="btn btn-lg ot-btn-primary" type="submit">
                Search
                </button>
                </div>
                </div>
                </div>
                </form>
                </div>
            <div class="col-md-12 detail-view" style="display:none;">
                <div class="table-content table-basic mt-20">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Attendance report</h4>
                            <div>
                                <small><span class="text-success">Present = P</span> <span class="text-warning">Late = L</span> <span class="text-danger">Absent = A</span> <span class="text-primary">Test = F</span> <span>Holiday = H</span></small>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered role-table" id="students_table">
                                    <thead class="thead">
                                        <tr>
                                            <th class="purchase">Date</th>
                                            <th class="purchase">Attendance</th>
                                            <th class="purchase">Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                            <div class="ot-pagination pagination-content d-flex justify-content-end align-content-center py-3">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-between"></ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 short-view" style="display:none;">
                <div class="table-content table-basic mt-20">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Attendance report</h4>
                            <div>
                                <small><span class="text-success">Present = P</span> <span class="text-warning">Late = L</span> <span class="text-danger">Absent = A</span> <span class="text-primary">Test = F</span> <span>Holiday = H</span></small>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <th>5</th>
                                            <th>6</th>
                                            <th>7</th>
                                            <th>8</th>
                                            <th>9</th>
                                            <th>10</th>
                                            <th>11</th>
                                            <th>12</th>
                                            <th>13</th>
                                            <th>14</th>
                                            <th>15</th>
                                            <th>16</th>
                                            <th>17</th>
                                            <th>18</th>
                                            <th>19</th>
                                            <th>20</th>
                                            <th>21</th>
                                            <th>22</th>
                                            <th>23</th>
                                            <th>24</th>
                                            <th>25</th>
                                            <th>26</th>
                                            <th>27</th>
                                            <th>28</th>
                                            <th>29</th>
                                            <th>30</th>
                                            <th class="purchase text-success">P</th>
                                            <th class="purchase text-warning">L</th>
                                            <th class="purchase text-danger">A</th>
                                            <th class="purchase text-primary">F</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><span class="text-success">0</span></td>
                                            <td><span class="text-warning">0</span></td>
                                            <td><span class="text-danger">0</span></td>
                                            <td><span class="text-primary">0</span></td>
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
   $(document).ready(function(){
    $('.short-view').hide();
    $('.detail-view').hide();
    $('.search-form').show();

    $('#marksheed').on('submit', function(e) {
      e.preventDefault();
      var view = $('select[name="view"]').val();
      if (view == "0") {
        $('.short-view').show();
        $('.detail-view').hide();
      } else if (view == "1") {
        $('.detail-view').show();
        $('.short-view').hide();
      }
    });
   });
</script>  
@endpush
