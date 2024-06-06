
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'admin-edit'
])

@section('content')
<style>
    :root {
    --ot-border-primary: #cdcece; /* A shade of blue */
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
                    <div class="profile-body edit-admin">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="title">Edit My Profile</h4>
                            <a href="{{route('profile.edit')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="profile-body-form">
                            <form action="" enctype="multipart/form-data" method="" id="visitForm" name="visitForm">
                                @csrf
                                <div class="row mb-3 mt-3">
                                    
                                    <div class="col-md-12">
                                    <label class="form-label" for="image">Image: <span class="text-info">(Accepted Images : jpg, jpeg, png. Max Size 2Mb.)</span></label>
                                    <div class="d-flex flex-column align-items-center justify-content-center"><img class="img-thumbnail ot-input-image-preview mb-3" src="{{ url('paper/img/demo.png') }}" alt="Admin"></div>
                                    <div class="ot_fileUploader left-side mb-3">
                                        <input class="form-control" type="text" placeholder="Image" readonly id="placeholder">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="btn btn-lg ot-btn-primary" for="fileBrouse">Browse</label> 
                                        <input type="file" class="d-none form-control" name="image" id="fileBrouse" accept="image/*"></button>
                                    </div>
                                    </div>
                                {{-- </div> --}}
                                {{-- <div class="row mb-3 mt-3"> --}}
                                    <div class="col-md-6 mt-3">
                                    {{-- <div class="row mb-3"> --}}
                                        <label for="inputname" class="form-label">Name <span class="text-danger">*</span></label>
                                        {{-- <div class="col-sm-12"> --}}
                                        <input name="name" type="text" class="form-control ot-input" value="Admin" placeholder="Name">
                                        {{-- </div> --}}
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        {{-- <div class="row mb-3"> --}}
                                            <label for="inputname" class="form-label">Gender <span class="text-danger">*</span></label>
                                            {{-- <div class="col-sm-12"> --}}<br>
                                            <input name="name" type="radio" value="Admin" placeholder="Name">
                                            <label for="">Male</label>
                                            <br>
                                            <input name="name" type="radio" value="Admin" placeholder="Name">
                                            <label for="">Female</label>
                                            {{-- </div> --}}
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label for="inputname" class="form-label">Date Of Birth</label>
                                            {{-- <div class="col-sm-12"> --}}
                                            <input name="date_of_birth" type="date" class="form-control ot-input" value="admin@gmail.com">
                                            {{-- </div> --}}
                                        </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="inputname" class="form-label">Email</label>
                                        {{-- <div class="col-sm-12"> --}}
                                        <input name="email" type="email" class="form-control ot-input" value="admin@gmail.com">
                                        {{-- </div> --}}
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="inputname" class="form-label">Address <span class="text-danger">*</span></label>
                                        {{-- <div class="col-sm-12"> --}}
                                        <input name="phone" type="text" class="form-control ot-input" placeholder="" value="">
                                        {{-- </div> --}}
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="inputname" class="form-label">Country <span class="text-danger">*</span></label>
                                        {{-- <div class="col-sm-12"> --}}
                                        <input name="country" id="country" type="text" class="form-control ot-input" placeholder="" value="India">
                                        {{-- </div> --}}
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="inputname" class="form-label">State <span class="text-danger">*</span></label>
                                        {{-- <div class="col-sm-12"> --}}
                                        <input name="state" id="state" type="text" class="form-control ot-input" placeholder="" value="Madhya Pradesh">
                                        {{-- </div> --}}
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="inputname" class="form-label">City <span class="text-danger">*</span></label>
                                        {{-- <div class="col-sm-12"> --}}
                                        <input name="city" type="text" class="form-control ot-input" placeholder="" value="Indore">
                                        {{-- </div> --}}
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="inputname" class="form-label">Pin Code <span class="text-danger">*</span></label>
                                        {{-- <div class="col-sm-12"> --}}
                                        <input name="city" type="text" class="form-control ot-input" placeholder="" value="123456">
                                        {{-- </div> --}}
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="inputname" class="form-label">Phone <span class="text-danger">*</span></label>
                                        {{-- <div class="col-sm-12"> --}}
                                        <input name="phone" type="text" class="form-control ot-input" placeholder="" value="0000000000">
                                        {{-- </div> --}}
                                    </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                    <div class="text-right">
                                        <button class="btn btn-lg ot-btn-primary"><i class="fa fa-refresh"></i> Update</button>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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