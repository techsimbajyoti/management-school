@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'class-setup'
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
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit Class Setup</h4>
                    <a href="{{ route('class-setup') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <hr>
                <div class="card-body">
                  <form action="" enctype="multipart/form-data" method="" id="visitForm" name="visitForm">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label"> Class Name <span class="fillable">*</span></label> 
                            <input class="nice-select niceSelect bordered_style wide" name="name" id="class_setup" list="datalistOptions" id="exampleDataList" type="text" placeholder="Enter name" value="">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label class="form-label">Section <span class="fillable">*</span></label>
                            <div class="input-check-radio academic-section d-flex">
                                <div class="form-check me-3" style="display: flex; align-items: center;">
                                    <input type="checkbox" name="sections[]" value="1" id="flexCheckDefaultA" />
                                    <label class="form-check-label ms-2" for="flexCheckDefaultA">A</label>
                                </div>
                                <div class="form-check me-3" style="display: flex; align-items: center;">
                                    <input type="checkbox" name="sections[]" value="2" id="flexCheckDefaultB" />
                                    <label class="form-check-label ms-2" for="flexCheckDefaultB">B</label>
                                </div>
                                <div class="form-check me-3" style="display: flex; align-items: center;">
                                    <input type="checkbox" name="sections[]" value="3" id="flexCheckDefaultC" />
                                    <label class="form-check-label ms-2" for="flexCheckDefaultC">C</label>
                                </div>
                                <div class="form-check" style="display: flex; align-items: center;">
                                    <input type="checkbox" name="sections[]" value="4" id="flexCheckDefaultD" />
                                    <label class="form-check-label ms-2" for="flexCheckDefaultD">D</label>
                                </div>
                            </div>
                        </div>
                        
                        
                      
                        
                          <div class="col-md-6">
                            <label for="validationServer04" class="form-label">Status <span class="fillable">*</span></label> <select class="nice-select niceSelect bordered_style wide" name="status" id="validationServer04" aria-describedby="validationServer04Feedback">
                              <option value="1">
                                Active
                              </option>
                              <option value="0">
                                Inactive
                              </option>
                            </select>
                          </div>
                    
                          <div class="col-md-12 mt-24">
                            <div class="card-footer">
                              <div class="d-flex justify-content-end">
                                  <button type="submit" class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> {{ __('Save & Continue') }}</button>
                                  <a href="{{ route('class-setup') }}" class="btn btn-lg ot-btn-primary ml-3"><i class="fa fa-save"></i> {{ __('Save') }}</a>
                              </div>
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
  


  var parent = ['One', 'Two', 'Three'];
  autocomplete(document.getElementById("class_setup"), parent);

    </script>
    @endpush
