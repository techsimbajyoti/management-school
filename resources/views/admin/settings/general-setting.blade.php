@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'general-setting'
])
@section('content')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
<style>
  .tag {
    display: inline-block;
    padding: 5px;
    background-color: #d1e7dd;
    border-radius: 3px;
    margin-right: 5px;
    margin-bottom: 5px;
  }
  .tag .remove-tag {
    cursor: pointer;
    margin-left: 5px;
  }
  #tagsInput {
    width: calc(100% - 20px);
    border: none;
    outline: none;
  }
  .tags-container {
    border: 1px solid #ccc;
    padding: 10px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
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
            <div class="card ot-card">
                <div class="card-header">
                  <h4>General Settings</h4>
                </div>
                <div class="card-body">
                  <form action="" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-md-12">
                        <div class="row mb-3">
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">School Name <span class="fillable">*</span></label>
                             <input type="text" name="application_name" class="nice-select niceSelect bordered_style wide" value="School Management System" placeholder="Enter you application name">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">School Email <span class="fillable">*</span></label> 
                            <input type="text" name="school_email" class="nice-select niceSelect bordered_style wide" value="school@gmail.com" placeholder="Enter your school email">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">School Contact Number <span class="fillable">*</span></label> 
                            <input type="text" name="contact_no." class="nice-select niceSelect bordered_style wide" value="0000000000" placeholder="Enter your school contact number">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">Address <span class="fillable">*</span></label> 
                            <input type="text" name="address." class="nice-select niceSelect bordered_style wide" value="0000000000" placeholder="Enter your school contact number">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                              <label for="country" class="form-label">Country <span class="fillable">*</span></label> 
                              <input type="text" name="country" id="country" class="form-control" value="India" placeholder="Enter your country">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                              <label for="state" class="form-label">State <span class="fillable">*</span></label> 
                              <input type="text" name="state" id="state" class="form-control" value="Madhya Pradesh" placeholder="Enter your state">
                          </div>

                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">City <span class="fillable">*</span></label> 
                            <input type="text" name="city" class="nice-select niceSelect bordered_style wide" value="Indore" placeholder="Enter your school contact number">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                          <label for="inputname" class="form-label">GST Applicable<span class="fillable">*</span></label> 
                          <br>
                          <input type="radio" value="yes" name="yes_exemptions">
                          <label for="">Yes</label>
                          <input type="radio" value="no" name="yes_exemptions">
                          <label for="">No</label><br>
                          <input type="text" id="exemptions" placeholder="Enter GST Number">
                          </div>
                          
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">Registration Number/Affiliation Code <span class="fillable">*</span></label> 
                            <input type="text" name="city" class="nice-select niceSelect bordered_style wide" value="demo" placeholder="Enter your school contact number">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">Board <span class="fillable">*</span></label> 
                            <select name="city" class="nice-select niceSelect bordered_style wide">
                              <option value="">Please select one of these</option>
                              <option value="">State Board</option>
                              <option value="">CBSE</option>
                              <option value="">ICSE</option>
                              <option value="">IB</option>
                              <option value="">NIOS</option>
                              <option value="">AISSCE</option>
                            </select>
                          </div>

                          <div class="col-md-6 default-langauge mb-3">
                            <div class="d-flex flex-column">
                              <label for="currency_code" class="form-label">Currency <span class="fillable">*</span></label>
                              <input type="text" name="currency_code" id="currency" value="Indian Rupee (INR)" class="form-control ot-input">
                            </div>
                          </div>

                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">School Establish Date <span class="fillable">*</span></label> 
                            <input type="date" name="city" class="form-control ot-input" value="demo" placeholder="Enter your school contact number">
                          </div>

                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">Admission Open <span class="fillable">*</span></label> 
                            <input type="date" name="admission_open" class="form-control ot-input">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">Admission Close <span class="fillable">*</span></label> 
                            <input type="date" name="admission_close" class="form-control ot-input">
                          </div>
                        </div>


                        <div class="row mb-3">
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label class="form-label" for="light_logo">Logo <span class="text-info"> (Accepted Images: jpg,jpeg,png. Max file size 100Kb)</span></label><br>
                            <div class="d-flex justify-content-center align-items-center">
                            <img class="img-thumbnail mb-10 ot-input full-logo setting-image" src="{{ asset('paper') }}/img/d.png" alt="light logo"></div>
                            <div class="ot_fileUploader left-side mb-3">
                              <input class="form-control" type="text" placeholder="Browse Logo" readonly id="placeholder"> <button class="primary-btn-small-input" type="button"><label class="btn btn-lg ot-btn-primary" for="fileBrouse">Browse</label> <input type="file" class="d-none form-control" name="light_logo" id="fileBrouse" accept="image/*"></button>
                            </div>
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                              <label class="form-label" for="favicon">Favicon <span class="text-info"> (Accepted Images: jpeg,jpg,png. Max file size 80Kb)</span></label><br>
                              <div class="d-flex align-items-center gap-3 justify-content-center">
                              <img class="img-thumbnail mb-10 ot-input full-logo setting-image" src="{{ asset('paper') }}/img/d.png" alt="favicon"></div>
                              <div class="ot_fileUploader left-side mb-3">
                                <input class="form-control" type="text" placeholder="Browse Favicon" readonly id="placeholder3"> 
                                <button class="primary-btn-small-input" type="button">
                                  <label class="btn btn-lg ot-btn-primary" for="fileBrouse3">Browse</label> 
                                  <input type="file" class="d-none form-control" name="favicon" id="fileBrouse3" accept="image/*">
                              </button>
                              </div>
                          </div>

                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">Time Zone <span class="fillable">*</span></label> 
                            <input type="text" name="time_zone" class="nice-select niceSelect bordered_style wide" value="Kolkata, West Bengal (GMT+5:30)" placeholder="Enter Time Zone">
                          </div>

                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">Footer Text <span class="fillable">*</span></label> 
                            <input type="text" name="footer_text" class="nice-select niceSelect bordered_style wide" value="Made with by Tech Simba" placeholder="Enter your footer text">
                          </div>

                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">Medium <span class="fillable">*</span></label> 
                            <input type="text" id="tagsInput" class="nice-select niceSelect bordered_style wide" value="" placeholder="Enter school medium">
                          </div>
                        </div>

                        <hr style="margin-top: 50px">
                        <div class="d-flex justify-content-between align-items-center" style="margin-top:30px;">

                            <h5>Upload Page Content</h5>
                            <a id="add-document" class="btn btn-lg ot-btn-primary">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add
                            </a>
                        </div>
                        <div class="row">
                          <div class="col-12">
                              <div class="table-responsive">
                                  <table class="table school_borderLess_table table_border_hide2" id="student-document">
                                      <thead class="table-header" style="border-bottom: 2px solid #dee2e6;">
                                          <tr>
                                              <th scope="col">Heading <span class="text-danger"></span></th>
                                              <th scope="col">List <span class="text-danger"></span></th>
                                              <th scope="col">Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>

                        <div class="col-md-12 mt-24">
                          <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <a href="#" class="btn btn-lg ot-btn-primary ml-3"><i class="fa fa-refresh"></i> {{ __('Update') }}</a>
                            </div>
                          </div>
                      </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
        </div>   
    </div>
</div>
@endsection

@push('scripts')

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>

    <script>

$( function() {
    var availableTags = [
      "Hindi",
      "English",
      "Gujrati",
      "Marathi",
    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#tagsInput" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  } );


  document.getElementById('add-document').addEventListener('click', function() {
        var tableBody = document.querySelector('#student-document tbody');
        var newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td>
                <input type="text" class="form-control" name="document_name[]" placeholder="Enter Heading">
            </td>
            <td>
                <input type="text" class="form-control" name="document_name[]" placeholder="Enter List">
            </td>
            <td>
                <button type="button" class="btn btn-danger remove-document">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </td>
        `;

        tableBody.appendChild(newRow);
    });

    document.querySelector('#student-document tbody').addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-document')) {
            event.target.closest('tr').remove();
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date();
        var year = today.getFullYear();
        var month = ('0' + (today.getMonth() + 1)).slice(-2); // Add leading zero
        var day = ('0' + today.getDate()).slice(-2); // Add leading zero

        var currentDate = year + '-' + month + '-' + day;
        document.getElementById('admission_date').value = currentDate;
    });


        $(document).ready(function() {
          $('#exemptions').hide();
          $('input[name="yes_exemptions"]').click(function() {
            var yes_exemptions = $('input[name="yes_exemptions"]:checked').val();

            if (yes_exemptions === 'yes') {
                $('#exemptions').show();
            } else {
                $('#exemptions').hide();
            }
        });


       


             var countries = <?php echo json_encode($test); ?>;
    autocomplete(document.getElementById("country"), countries);  

    var cutt = ['US Dollar (USD)','Euro (EUR)','British Pound Sterling (GBP)','Australian Dollar (AUD)','Canadian Dollar (CAD)','Chinese Yuan (CNY)','Singapore Dollar (SGD)','Hong Kong Dollar (HKD)','Turkish Lira (TRY)','Russian Ruble (RUB)','Indian Rupee (INR)'];
    autocomplete(document.getElementById("currency"), cutt);

    function autocomplete(inp, arr) {
        var currentFocus;
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            this.parentNode.appendChild(a);
            for (i = 0; i < arr.length; i++) {
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    b = document.createElement("DIV");
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    b.addEventListener("click", function(e) {
                        inp.value = this.getElementsByTagName("input")[0].value;
                        closeAllLists();
                        if (inp.id === 'country') {
                            fetchStates(inp.value);
                        }
                    });
                    a.appendChild(b);
                }
            }
        });
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                currentFocus++;
                addActive(x);
            } else if (e.keyCode == 38) {
                currentFocus--;
                addActive(x);
            } else if (e.keyCode == 13) {
                e.preventDefault();
                if (currentFocus > -1) {
                    if (x) x[currentFocus].click();
                }
            }
        });
        function addActive(x) {
            if (!x) return false;
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }
        function closeAllLists(elmnt) {
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }

    function fetchStates(country) {

        $.ajax({
            url: "{{ route('json-country') }}",
            type: 'POST',
            data: {
                country_id: country,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                var states = data.states.map(function(state) { return state.state; });
                autocomplete(document.getElementById("state"), states);
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });
    }
  });

 

  </script>
@endpush






                               
                               