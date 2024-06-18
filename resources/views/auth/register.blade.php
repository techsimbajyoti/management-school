@extends('layouts.app', [
    'class' => 'register-page',
    'backgroundImagePath' => 'img/bg/school2.jpg'
])

@section('content')
<style>
    /* Progress Bar */
.progress-container {
    width: 100%;
    position: relative;
}

#progressbar {
    display: flex;
    justify-content: space-between;
    list-style-type: none;
    counter-reset: step;
    margin-bottom: 20px;
}

#progressbar li {
    text-align: center;
    position: relative;
    flex: 1;
    counter-increment: step;
}

#progressbar li::before {
    content: counter(step);
    width: 30px;
    height: 30px;
    line-height: 30px;
    display: block;
    font-size: 14px;
    color: #333;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 50%;
    margin: 0 auto 10px auto;
}

#progressbar li::after {
    content: '';
    width: 100%;
    height: 2px;
    background: #ddd;
    position: absolute;
    left: -50%;
    top: 15px;
    z-index: -1;
}

#progressbar li:first-child::after {
    content: none;
}

#progressbar li.active::before, #progressbar li.active::after {
    background: #0275d8;
    color: white;
    border-color: #0275d8;
}

/* Progress Bar Indicator */
.progress {
    height: 4px;
    background: #ddd;
    position: relative;
    margin-top: 20px;
}

.progress-bar {
    width: 0;
    height: 100%;
    background: #0275d8;
    transition: width 0.4s ease;
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
        <div class="container">
            <div class="row" style="margin-top: 40px;">
                <div class="col-lg-10 col-md-10 offset-md-1 mr-auto">
                    <div class="progress-container">
                        <ul id="progressbar">
                            <li class="active" id="step1"><strong>Step 1</strong></li>
                            <li id="step2"><strong>Step 2</strong></li>
                            <li id="step3"><strong>Step 3</strong></li>
                            <li id="step4"><strong>Step 4</strong></li>
                        </ul>
                    </div>
                    <div class="card ot-card">
                        <div class="card-body">
                            @include('admin.applicant.step-form.step-form-1')

                            @include('admin.applicant.step-form.step-form-2')

                            @include('admin.applicant.step-form.step-form-3')

                            @include('admin.applicant.step-form.step-form-4')
                        </div>
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
    demo.checkFullPageBackgroundImage();

    let currentStep = 1;
    const totalSteps = 4;

    function updateProgressBar(step) {
        const percentage = (step - 1) / (totalSteps - 1) * 100;
        $('.progress-bar').css('width', `${percentage}%`);
        $('#progressbar li').removeClass('active');
        for (let i = 1; i <= step; i++) {
            $(`#step${i}`).addClass('active');
        }
    }

    function showForm(step) {
        $('.form1, .form2, .form3, .form4').hide();
        $(`.form${step}`).show();
    }

    
    $('#form1').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('post-applicant-data') }}",
            method: "POST",
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    moveToNextStep(2); // Move to next step upon successful form submission
                } else {
                    console.error('Failed to save data:', response.errors);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });


    $('.save_1').click(function() {
        currentStep = 2;
        updateProgressBar(currentStep);
        showForm(currentStep);
    });

    $('.save_2').click(function() {
        currentStep = 3;
        updateProgressBar(currentStep);
        showForm(currentStep);
    });

    $('.save_3').click(function() {
        currentStep = 4;
        updateProgressBar(currentStep);
        showForm(currentStep);
    });

    $('.back_1').click(function() {
        currentStep = 1;
        updateProgressBar(currentStep);
        showForm(currentStep);
    });

    $('.back_2').click(function() {
        currentStep = 2;
        updateProgressBar(currentStep);
        showForm(currentStep);
    });

    $('.back_3').click(function() {
        currentStep = 3;
        updateProgressBar(currentStep);
        showForm(currentStep);
    });

    updateProgressBar(currentStep);
    showForm(currentStep);

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

            // var sections = {
            //     1: ["A", "B", "C"],
            //     2: ["D", "E"],
            //     3: ["F", "G", "H", "I"]
            // };

            // $('#getSections').change(function() {
            //     var classId = $(this).val();
            //     var $sectionsDropdown = $('.sections');
            //     $sectionsDropdown.empty();
            //     $sectionsDropdown.append('<option value="">Select section</option>');

            //     if (sections[classId]) {
            //         sections[classId].forEach(function(section) {
            //             $sectionsDropdown.append('<option value="' + section + '">' + section + '</option>');
            //         });
            //     }
            // });



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
