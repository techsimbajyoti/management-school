@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'admit-student'
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
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="mb-0 title">{{ __('Admit Student') }}</h3>
                            <a href="{{ route('students')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        
                    </div>
            
                <form action="{{route('post-admit-student')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    
                    <div class="card ot-card">
                        <div class="card-header">
                            <h6 class="card-title">{{ __('Please fill The form Below To Admit A New Student') }}</h6>
                        </div>
                        <hr>

                        <div class="card-body">
                            <h5>Student Information</h5><br>
                            <div class="row mb-3">
                              
                                <div class="col-md-4">
                                   
                                    <span style="color:red">*</span>
                                    <label class="form-label">{{ __('Admission No.:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="admission_no" class="nice-select sections niceSelect bordered_style wide" placeholder="Admission No." required>
                                        </div>
                                        @if ($errors->has('admission_no'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('admission_no') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-md-4">
                                    <span style="color:red">*</span>
                                    <label class="form-label">{{ __('Parent Name:') }}</label>
                                    <div class="form-group">
                                    <div class="autocomplete">
                                        <input type="text" placeholder="Parent Name" class="nice-select sections niceSelect bordered_style wide" id="parent_name" name="parent_name">
                                    </div>
                                </div>
                                </div>
                                        @if ($errors->has('parent_name')) 
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('parent_name') }}</strong>
                                            </span>
                                        @endif
                             
                                <div class="col-md-4">
                                    <span style="color:red">*</span>
                                    <label class="form-label">{{ __('First Name:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="first_name" class="nice-select niceSelect bordered_style wide" placeholder="Student First Name" required>
                                        </div>
                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <span style="color:red">*</span>
                                    <label class="form-label">{{ __('Last Name:') }}</label>

                                    <div class="form-group">
                                        <input type="text" name="last_name" class="nice-select niceSelect bordered_style wide" placeholder="Student Last Name" required>
                                    </div>
                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <span style="color:red">*</span>
                                    <label class="form-label">{{ __('Email address:') }}</label>
    
                                     <div class="form-group">
                                         <input type="text" name="email" class="nice-select niceSelect bordered_style wide" placeholder="Email Address" required value="admin@gmail.com">
                                     </div>
                                     @if ($errors->has('email'))
                                         <span class="invalid-feedback" style="display: block;" role="alert">
                                             <strong>{{ $errors->first('email') }}</strong>
                                         </span>
                                     @endif
                                 </div> 
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label">Gender:</label>
                                        <select class="nice-select sections niceSelect bordered_style wide" id="gender" name="gender" required data-fouc data-placeholder="Choose.." name="gender">
                                            <option value="">Select one of these</option>
                                            <option  value="Male">Male</option>
                                            <option  value="Female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <input type="text" id="other-gender" name="other_gender" class="hidden form-control mt-2" placeholder="Please specify">
                                    </div>
                                </div>
                                  
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <span style="color:red">*</span>
                                        <label class="form-label">{{ __('Class:') }}</label>
                                            <div class="form-group">
                                                <select id="getSections" class="nice-select sections niceSelect bordered_style wide" name="class" required>
                                                    <option value>Select class</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                    </select>
                                            </div>
                                            @if ($errors->has('class'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('class') }}</strong>
                                                </span>
                                            @endif
                                    </div>    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span style="color:red">*</span>
                                            <label class="form-label">Section:</label>
                                            <select class="nice-select sections niceSelect bordered_style wide"  name="section" required data-fouc data-placeholder="Choose.." name="section">
                                                <option value="">Select one of these</option>
                                                <option value="A">A</option>
                                                <option  value="B">B</option>
                                                <option  value="C">C</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label">Date of Birth:</label>
                                        <input name="date_of_birth" value="" type="date" class="form-control date-pick" placeholder="Date of birth">
        
                                    </div>
                                </div>           
                            </div>
                            <div class="row mb-3">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Blood Group:</label>
                                        <select class="nice-select niceSelect bordered_style wide" id="blood-group" name="blood_group"  data-fouc data-placeholder="Choose.." name="blood_group">
                                            <option value="">Select one of these</option>
                                            @foreach($BloodGroup as $BloodGroups)
                                            <option value="{{ $BloodGroups->bg_code }}">{{ $BloodGroups->bg_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                            
                                        <label class="form-label">Religion:</label>
                                        <select class="nice-select niceSelect bordered_style wide" id="religion" name="religion" required data-fouc data-placeholder="Choose.." name="section">
                                            <option value="">Select one of these</option>
                                            @foreach($Religion as $Religions)
                                            <option  value="{{ $Religions->religion_code}}">{{ $Religions->religion_name}}</option>
                                            @endforeach
                                            <option  value="other">Other</option>
                                        </select>
                                        <input type="text" id="other-religion" name="other_religion" class="hidden nice-select niceSelect bordered_style wide mt-2" placeholder="Please specify">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Category:</label>
                                        <select class="nice-select niceSelect bordered_style wide" id="category" name="category"  data-fouc data-placeholder="Choose.." name="category">
                                            <option value="">Select one of these</option>
                                            <option  value="General">General</option>
                                            <option  value="OBC">OBC</option>
                                            <option  value="SC">SC</option>
                                            <option  value="ST">ST</option>
                                            <option  value="other">Other</option>
                                        </select>
                                        <input type="text" id="other-category" name="other_category" class="hidden nice-select niceSelect bordered_style wide mt-2" placeholder="Please specify">
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">{{ __('Student Language:') }}</label>
                                    <input type="text" class="nice-select niceSelect bordered_style wide" placeholder="Enter Language type" id="student_language"  name="student_language">
                                    @if ($errors->has('student_language'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('student_language') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label">{{ __('Admission Date:') }}</label>
                                        <input type="date" name="admission_date" id="admission_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">{{ __('Student Photo:') }}</label>
                                    <input type="file" class="form-control" name="image" accept=".png,.jpg,.jpeg" required>
                                    <span class="text-info">Accepted Images: jpeg,jpg,png.Max file size 2Mb.</span>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label"><span class="fillable">* </span>Status:</label>
                                        <select class="nice-select niceSelect bordered_style wide" id="category" name="category"  data-fouc data-placeholder="Choose.." name="category">
                                            <option value="">Select one of these</option>
                                            <option  value="active">Active</option>
                                            <option  value="deactive">deactive</option>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                            <hr style="margin-top: 50px">
                            <h5 style="margin-top:30px;">Contact Information</h5><br>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <span style="color:red">*</span>
                                    <label class="form-label">{{ __('Address:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="residence_address" class="nice-select niceSelect bordered_style wide" placeholder="Residance Address" required>
                                        </div>
                                        @if ($errors->has('residence_address'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('residence_address') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                
                                        <div class="form-group">
                                            <span style="color:red">*</span>
                                            <label class="form-label">{{ __('Country:') }} </label>
                                            <div class="autocomplete">
                                            <input id="country" type="text" class="nice-select niceSelect bordered_style wide @error('country') is-invalid @enderror" name="country" placeholder="Country" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span style="color:red">*</span>
                                            <label class="form-label">{{ __('State:') }} </label>
                                            {{-- <select name="state" id="state" class="nice-select niceSelect bordered_style wide @error('state') is-invalid @enderror">
                                                <option value="">Select state</option>
                                            </select> --}}
                                            <div class="autocomplete">
                                                <input id="state" type="text" class="nice-select niceSelect bordered_style wide @error('state') is-invalid @enderror" name="state" placeholder="State" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    
                                        <label class="form-label">{{ __('City:') }}</label>
        
                                            <div class="form-group">
                                                <input type="text" name="city" class="nice-select niceSelect bordered_style wide" placeholder="City" required>
                                            </div>
                                            @if ($errors->has('city'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('city') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                            </div>
                            <div class="row mb-3" >
                                <div class="col-md-4">
                                    
                                    <label class="form-label">{{ __('Pin Code:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="pin_code" class="nice-select niceSelect bordered_style wide" placeholder="Pin Code" required>
                                        </div>
                                        @if ($errors->has('pin_code'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('pin_code') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-md-4">
                                    <span style="color:red">*</span>
                                    <label class="form-label">{{ __('Contact Number:') }}</label>
                                        <div class="form-group">
                                            <input type="text" name="mobile" class="nice-select niceSelect bordered_style wide" placeholder="Contact Number" required>
                                        </div>
                                        @if ($errors->has('mobile'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('mobile') }}</strong>
                                            </span>
                                        @endif
                                </div>
                               
                               <div class="col-md-4">
                                    <span style="color:red">*</span>
                                    <label class="form-label">{{ __('Alternative Number:') }}</label>
                                       <div class="form-group">
                                            <input type="text" name="parent_mobile" class="nice-select niceSelect bordered_style wide" placeholder="Alternative Number" required>
                                        </div>
                                        @if ($errors->has('parent_mobile'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('parent_mobile') }}</strong>
                                            </span>
                                        @endif
                                </div> 
                            </div>

                            <hr style="margin-top: 50px">
                            <div class="d-flex justify-content-between align-items-center" style="margin-top:30px;">

                                <h5>Upload Documents</h5>
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
                                                    <th scope="col">Name <span class="text-danger"></span></th>
                                                    <th scope="col">Document <span class="text-danger"></span></th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                             
                            
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> {{ __('Save & Continue') }}</button>
                                    <a href="{{ route('students') }}" class="btn btn-lg ot-btn-primary ml-3"><i class="fa fa-save"></i> {{ __('Save') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>    
                </form>
            </div>
        </div>
    </div>
    <input type="hidden" id="countriess" value="{{ json_encode($test) }}">
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script>
        $( function() {
    var availableTags = <?php echo json_encode($lang); ?>;
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#student_language" )
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

        $(document).ready(function() {
            $('#other-gender').hide();
            $('#other-language').hide();
            $('#other-category').hide();
            $('#other-religion').hide();

            $('#gender').change(function() {
            if (this.value === 'other') {
                // $('#other-gender').removeClass('hidden').attr('required', true);

                $('#other-gender').show();
            } else {
                // $('#other-gender').addClass('hidden').removeAttr('required');
                $('#other-gender').hide();
            }
        });

        // $('#student_language').change(function() {
        //     if (this.value === 'other') {
        //         $('#other-language').show();
        //     } else {
        //         $('#other-language').hide();
        //     }
        // });

        $('#category').change(function(){
            if (this.value === 'other') {
                $('#other-category').show();
            } else {
                $('#other-category').hide();
            }
        })

        $('#religion').change(function(){
            if (this.value === 'other') {
                $('#other-religion').show();
            } else {
                $('#other-religion').hide();
            }
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



            var countries = <?php echo json_encode($test); ?>;
    autocomplete(document.getElementById("country"), countries);  

  var parent = ['Parent 1114', 'Parent 1112', 'Parent 1113'];
  autocomplete(document.getElementById("parent_name"), parent);

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
        
    document.getElementById('add-document').addEventListener('click', function() {
        var tableBody = document.querySelector('#student-document tbody');
        var newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td>
                <input type="text" class="form-control" name="document_name[]" placeholder="Enter Document Name">
            </td>
            <td>
                <input type="file" class="form-control" name="document_file[]">
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


    </script>
@endpush






                               
                               