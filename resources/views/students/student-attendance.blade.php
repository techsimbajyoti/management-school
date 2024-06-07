@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'attendance'
])
@section('content')
<div class="content">
  <div class="row">
    <div class="col-12 p-0 search-form">
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
                </select>
              </div>
              <div class="single_large_selectBox">
                <input value="" name="date" class="form-control ot-input" type="date">
              </div>
              <div class="single_large_selectBox">
                <input value="" name="date" class="form-control ot-input" type="date">
              </div><button class="btn btn-lg ot-btn-primary" type="submit">Search</button>
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
              <small><span class="font-weight-bold" style="color: #386e42;">Present = P</span> <span class="font-weight-bold" style="color: #d1ba21;">Late = L</span> <span class="font-weight-bold" style="color: #cc2121;">Absent = A</span> <span class="font-weight-bold" style="color: #217fcc;">Test = F</span> <span class="font-weight-bold" style="color: #343a40;">Holiday = H</span></small>
            </div>
          </div>
          <hr>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped mb-30" id="myTable1">
                <thead class="thead-light">
                  <tr>
                    <th>Date</th>
                    <th>Attendance</th>
                    <th>Note</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="3" class="text-center gray-color">
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
            <h4 class="mb-0">Attendance Report</h4>
            <div class="text-dark">
              <small><span class="font-weight-bold" style="color: #386e42;">Present = P</span> <span class="font-weight-bold" style="color: #d1ba21;">Late = L</span> <span class="font-weight-bold" style="color: #cc2121;">Absent = A</span> <span class="font-weight-bold" style="color: #217fcc;">Test = F</span> <span class="font-weight-bold" style="color: #343a40;">Holiday = H</span></small>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped mb-30" id="myTable">
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
                    <th class="font-weight-bold" style="color: #217fcc;" title="Test" data-toggle="tooltip">F</th>
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
                    <td><span class="font-weight-bold" style="color: #386e42;">0</span></td>
                    <td><span class="font-weight-bold" style="color: #d1ba21;">0</span></td>
                    <td><span class="font-weight-bold" style="color: #cc2121;">0</span></td>
                    <td><span class="font-weight-bold" style="color: #217fcc;">0</span></td>
                  </tr>
                </tbody>
              </table>
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
      } else if (view == "1") {
        $('.detail-view').show();
        $('.short-view').hide();
      }
    });
   });


$(function() {
$("#myTable").dataTable();
$("#myTable1").dataTable();
});


</script> @endpush
