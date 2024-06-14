@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'attendance'
])
@section('content')
<div class="content">
  <div class="row">
    <div class="col-12 search-form">
      <form action="" method="" id="marksheed" enctype="multipart/form-data" name="marksheed">
        <input type="hidden" name="_token" value="fE3jhMKUFkldbNrDIJ5XZv8piyHC35HDe5tRxIwb">
        <div class="card ot-card mb-24 position-relative z_1">
          <div class="card-header d-flex align-items-center gap-4 flex-wrap">
            <h3 class="mb-0">Filtering</h3>
            <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
              
              <div class="single_large_selectBox">
                <select class="class nice-select niceSelect bordered_style wide" name="view">
                  <option value="0">
                    Short view
                  </option>
                  <option value="1">
                    Detail view
                  </option>
                  <option value="2">
                  Percentage view
                  </option>
                </select>
              </div>
              <div class="d-flex align-items-center gap-3">
              <div class="single_large_selectBox d-flex align-items-center gap-2">
                <label for="fromDate" style="margin-right: 8px;">From</label>
                <input value="" name="date" class="form-control ot-input" type="date">
              </div>
              <div class="single_large_selectBox d-flex align-items-center gap-2">
                <label for="fromDate" style="margin-right: 8px;">To</label>
                <input value="" name="date" class="form-control ot-input" type="date">
              </div><button class="btn btn-lg ot-btn-primary" type="submit">Search</button>
            </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-12 detail-view" style="display:none;">
      <div class="table-content table-basic mt-20">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Attendance Report</h4>
            <div>
              <small><span class="font-weight-bold" style="color: #386e42;">Present = P</span> <span class="font-weight-bold" style="color: #d1ba21;">Late = L</span> <span class="font-weight-bold" style="color: #cc2121;">Absent = A</span> <span class="font-weight-bold" style="color: #343a40;">Holiday = H</span></small>
            </div>
          </div>
          <hr>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th class="purchase">Name</th>
                    <th class="purchase">Class</th>
                    <th class="purchase">Subject</th>
                    <th class="purchase">Total Classes</th>
                    <th class="purchase">Classes Conducted</th>
                    <th class="purchase">Classes Attended</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Student 112</td>
                    <td>One (A)</td>
                    <td>English</td>
                    <td>60</td>
                    <td>53</td>
                    <td>50</td>
                  </tr>
                  <tr>
                    <td>Student 112</td>
                    <td>One (A)</td>
                    <td>Chemistry</td>
                    <td>60</td>
                    <td>57</td>
                    <td>55</td>
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
            <h4 class="mb-0">Attendance Report</h4>
            <div class="text-dark">
              <small><span class="font-weight-bold" style="color: #386e42;">Present = P</span> <span class="font-weight-bold" style="color: #d1ba21;">Late = L</span> <span class="font-weight-bold" style="color: #cc2121;">Absent = A</span><span class="font-weight-bold" style="color: #343a40;">Holiday = H</span></small>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="myTable">
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
                    <th class="font-weight-bold" style="color: #386e42;" title="Present" data-toggle="tooltip">P</th>
                    <th class="font-weight-bold" style="color: #d1ba21;" title="Late" data-toggle="tooltip">L</th>
                    <th class="font-weight-bold" style="color: #cc2121;" title="Absent" data-toggle="tooltip">A</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>P</td>
                    <td>P</td>
                    <td>P</td>
                    <td>A</td>
                    <td>P</td>
                    <td>P</td>
                    <td>H</td>
                    <td>P</td>
                    <td>P</td>
                    <td>P</td>
                    <td>P</td>
                    <td>P</td>
                    <td>P</td>
                    <td>H</td>
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
                    <td><span class="font-weight-bold" style="color: #386e42;">11</span></td>
                    <td><span class="font-weight-bold" style="color: #d1ba21;">0</span></td>
                    <td><span class="font-weight-bold" style="color: #cc2121;">1</span></td>
                  
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 percentage-view" style="display:none;">
      <div class="table-content table-basic mt-20">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Percentage View</h4>
            <div>
              <small><span class="font-weight-bold" style="color: #386e42;">Present = P</span> <span class="font-weight-bold" style="color: #d1ba21;">Late = L</span> <span class="font-weight-bold" style="color: #cc2121;">Absent = A</span> <span class="font-weight-bold" style="color: #343a40;">Holiday = H</span></small>
            </div>
          </div>
          <hr>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered role-table" id="myTable">
                <thead class="thead">
                  <tr>
                    <th class="purchase">Student name</th> 
                    <th class="purchase">Class (Section)</th>
                    <th class="purchase">Total Class's</th>
                    <th class="purchase">Class's Done</th>
                    <th class="purchase">Student's classes done?</th>
                    <th class="purchase">Percentage</th>
                    <th class="purchase">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr id="document-file">
                    <td>Student 1112</td>
                    <td>One (A)</td>
                    <td>120</td>
                    <td>100</td>
                    <td>90</td>
                    <td>90%</td>
                    <td class="action">
                      <div class="dropdown dropdown-action">
                          <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                  <a href="{{ route('detail-student-attendance') }}" class="dropdown-item student-details"><i class="fa fa-eye"></i>  {{ __('View student detail') }}</a>
                              </div>
                          </div>
                      </div>
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
  </div>
</div>@endsection @push('scripts') 
<script type="text/javascript" charset="utf8" src="paper/js/dataTable-jquery.js"></script>
<script type="text/javascript"  charset="utf8" src="paper/js/dataTable.js"></script>
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
        $('.percentage-view').hide();
      } else if (view == "1") {
        $('.detail-view').show();
        $('.short-view').hide();
        $('.percentage-view').hide();
      }
      else if (view == "2") {
        $('.detail-view').hide();
        $('.short-view').hide();
        $('.percentage-view').show();
      }
    });
   });


$(function() {
$("#myTable").dataTable();
// $("#myTable1").dataTable();
});


</script> @endpush
