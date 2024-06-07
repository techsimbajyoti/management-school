@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'general-setting'
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
                            <label for="inputname" class="form-label">Country <span class="fillable">*</span></label> 
                            <input type="text" name="country" id="country" class="nice-select niceSelect bordered_style wide" value="India" placeholder="Enter your school contact number">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">State <span class="fillable">*</span></label> 
                            <input type="text" name="state" id="state" class="nice-select niceSelect bordered_style wide" value="Madhya Pradesh" placeholder="Enter your school contact number">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">City <span class="fillable">*</span></label> 
                            <input type="text" name="city" class="nice-select niceSelect bordered_style wide" value="Indore" placeholder="Enter your school contact number">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">GST Exemptions <span class="fillable">*</span></label> 
                            {{-- <input type="text" name="city" class="nice-select niceSelect bordered_style wide" value="demo" placeholder="Enter your school contact number"> --}}
                          <select name="city" class="nice-select niceSelect bordered_style wide">
                            <option value="">Please select one of these</option>
                            <option value="">Yes</option>
                            <option value="">No</option>
                          </select>
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">Registration Number/Affiliation Code <span class="fillable">*</span></label> 
                            <input type="text" name="city" class="nice-select niceSelect bordered_style wide" value="demo" placeholder="Enter your school contact number">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">Board <span class="fillable">*</span></label> 
                            <select name="city" class="nice-select niceSelect bordered_style wide">
                              <option value="">Please select one of these</option>
                              <option value="">CBSE</option>
                              <option value="">ICSE</option>
                              <option value="">IB</option>
                              <option value="">NIOS</option>
                              <option value="">AISSCE</option>
                            </select>
                          </div>

                          <div class="col-md-6 default-langauge mb-3">
                            <div class="d-flex flex-column">
                              <label for="currency_code" class="form-label">Currency <span class="fillable">*</span></label> <select name="currency_code" id="currency_code" class="form-select ot-input flag_icon_list">
                                <option value="USD">
                                  USD — $
                                </option>
                                <option value="EUR">
                                  EUR — €
                                </option>
                                <option selected value="INR">
                                  INR — ₹
                                </option>
                              </select>
                            </div>
                          </div>

                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">School Establish Date <span class="fillable">*</span></label> 
                            <input type="date" name="city" class="form-control ot-input" value="demo" placeholder="Enter your school contact number">
                          </div>
                        </div>


                        <div class="row mb-3">
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label class="form-label" for="light_logo">Light Logo (155 x 40 px)</label><br>
                            <div class="d-flex justify-content-center align-items-center">
                            <img class="img-thumbnail mb-10 ot-input full-logo setting-image" src="{{ asset('paper') }}/img/d.png" alt="light logo"></div>
                            <div class="ot_fileUploader left-side mb-3">
                              <input class="form-control" type="text" placeholder="Browse Light Logo" readonly id="placeholder"> <button class="primary-btn-small-input" type="button"><label class="btn btn-lg ot-btn-primary" for="fileBrouse">Browse</label> <input type="file" class="d-none form-control" name="light_logo" id="fileBrouse" accept="image/*"></button>
                            </div>
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                              <label class="form-label" for="favicon">Favicon (40 x 40 px)</label><br>
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
                            <label for="inputname" class="form-label">Footer Text <span class="fillable">*</span></label> 
                            <input type="text" name="footer_text" class="nice-select niceSelect bordered_style wide" value="made with  by Tech Simba and UPDIVISION" placeholder="Enter your footer text">
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

  </script>
@endpush






                               
                               