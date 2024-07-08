@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'edit-student'
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
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="mb-0 title">{{ __('Update Student') }}</h3>
                            <a href="{{ route('students')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        
                    </div>
            
                <form action="{{route('post-admit-student')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    
                    <div class="card ot-card">
                        <div class="card-header">
                            <h6 class="card-title">{{ __('Please fill the form below To update a Student') }}</h6>
                            
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
                                    {{-- <select class="nice-select sections niceSelect bordered_style wide" id="parent_name" name="parent_name"  data-fouc data-placeholder="Choose.." >
                                        <option value="">Select one of these</option>
                                        <option  value="Parent1">Parent1</option>
                                        <option  value="Parent2">Parent2</option>
                                      
                                    </select> --}}
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
                                    <select class="nice-select niceSelect bordered_style wide" id="student_language"  name="student_language"  data-fouc data-placeholder="Choose..">
                                        <option value="">Select one of these</option>
                                        @foreach($Language as $Languages)
                                        <option value="{{ $Languages->lang_code }}">{{ $Languages->name }}</option>
                                        @endforeach
                                        <option value="other">Other</option>
                                    </select>
                                    <input type="text" id="other-language" name="other_gender" class="nice-select niceSelect bordered_style wide" placeholder="Please specify">
                                   
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

                                   <button type="submit" class="btn btn-lg ot-btn-primary"><i class="fa fa-refresh"></i> {{ __('Update') }}</button>

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
{{-- <script src="{{ asset('paper') }}/js/custom.js"></script> --}}
    <script>
        function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
          /*check if the item starts with the same letters as the text field value:*/
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
          }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 38) { //up
          /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
    });
    function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;
      /*start by removing the "active" class on all items:*/
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      /*add class "autocomplete-active":*/
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
          x[i].parentNode.removeChild(x[i]);
        }
      }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
  }
  
  var countries = <?php echo json_encode($test); ?>;
  /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
  autocomplete(document.getElementById("country"), countries);

  var st = <?php echo json_encode($testing); ?>;

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
  autocomplete(document.getElementById("state"), st);

  var parent = ['Parent 1114', 'Parent 1112', 'Parent 1113'];
  autocomplete(document.getElementById("parent_name"), parent);


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

        $('#student_language').change(function() {
            if (this.value === 'other') {
                $('#other-language').show();
            } else {
                $('#other-language').hide();
            }
        });

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






                               
                               