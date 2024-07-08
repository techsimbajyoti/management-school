@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'parent-meeting-track'
])
@section('content')
<style>
      .stepper-wrapper {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        position: relative;
    }
    .stepper-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 1;
        position: relative;
    }
    .stepper-item::before {
        content: '';
        position: absolute;
        top: 20px;
        left: 50%;
        width: 100%;
        border-bottom: 2px solid #ccc;
        z-index: 1;
    }
    .stepper-item:first-child::before {
        left: 0;
        width: 50%;
    }
    .stepper-item:last-child::before {
        content: none;
    }
    .stepper-item .step-counter {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 2;
        margin-bottom: 6px;
    }
    .stepper-item.active .step-counter {
        background-color: #007bff;
        color: #fff;
    }
    .stepper-item.completed .step-counter {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
    }
    .stepper-item.completed::before {
        border-bottom-color: #007bff;
    }

    .arrow-line {
    position: absolute;
    height: 2px; /* Adjust line thickness */
    background-color: #000; /* Line color */
    transform-origin: left center; /* Ensure rotation origin is left */
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
      <div class="col-12 search-form">
          <form action="" method="" id="marksheed" enctype="multipart/form-data" name="marksheed">
            @csrf
            <div class="card ot-card mb-24 position-relative z_1">
              <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                <h3 class="mb-0">Filtering</h3>
                <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                    <div class="single_large_selectBox autocomplete">
                        <input type="text" placeholder="Search By Applicant Id..." id="applicantIds" autocomplete="off" name="applicantIds" class="ot-input form-control ot-input">
                        <input type="hidden" id="selectedApplicantId" name="selectedApplicantId">
                    </div>
                </div>
              </div>
            </div>
          </form>
        </div>


      <div class="col-md-12 search-form">
          <div class="card ot-card">
              <div class="card-header">
                  <h4>Application Status</h4>
              </div>
              <hr>
              <div class="card-body static-steps">
                <div id="steps-container" class="row">
                    <!-- Data will be dynamically added here -->
                </div>
            </div>
          </div>
      </div>    
  </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {

var student = <?php echo json_encode($ApplicantId); ?>;

autocomplete(document.getElementById("applicantIds"), student);

function autocomplete(inp, arr) {
    var currentFocus;

    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        closeAllLists();
        if (!val) { return false; }
        currentFocus = -1;
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        this.parentNode.appendChild(a);
        for (i = 0; i < arr.length; i++) {
            if (arr[i].applicant_id.substr(0, val.length).toUpperCase() == val.toUpperCase() ||
                arr[i].name.substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                b = document.createElement("DIV");
                b.innerHTML = "<strong>" + arr[i].applicant_id.substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].applicant_id.substr(val.length) + " - ";
                b.innerHTML += "<strong>" + arr[i].name.substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].name.substr(val.length);
                b.innerHTML += "<input type='hidden' value='" + arr[i].applicant_id + " - " + arr[i].name + "' data-id='" + arr[i].applicant_id + "'>";
                b.addEventListener("click", function(e) {
                    inp.value = this.getElementsByTagName("input")[0].value;
                    var selectedApplicantId = this.getElementsByTagName("input")[0].getAttribute('data-id');
                    document.getElementById('selectedApplicantId').value = selectedApplicantId;
                    console.log("Selected Applicant ID: " + selectedApplicantId);
                    closeAllLists();

                    // Trigger a custom event to indicate a selection has been made
                    var event = new CustomEvent('applicantSelected', { detail: selectedApplicantId });
                    inp.dispatchEvent(event);
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

    document.addEventListener("click", function(e) {
        closeAllLists(e.target);
    });
}

// Listen for the custom event
document.getElementById("applicantIds").addEventListener('applicantSelected', function(e) {
    var value = e.detail; 

    $.ajax({
        url: '/get-applicant-status-parent',
        method: 'POST',
        data: {
            applicant_id: value,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            console.log(response); // Check response in browser console
            if(response != null){
                $('.static-steps').show();
            }
            showStatuses(response); // Call function to handle the response data
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText); // Log any errors to console
        }
    });


    function showStatuses(steps) {
    var stepCounter = 1;
    var html = '';

    steps.forEach(function(step, index) {
        html += '<div class="col-md-4">';
        html += '<div class="stepper-wrapper">';
        html += '<div class="stepper-item active">';
        html += '<div class="step-counter">' + stepCounter + '</div>';
        html += '<div class="step-name">' + step.meeting_status + '</div>';
        html += '<div class="step-date">' + step.meeting_date + '</div>';
        html += '</div></div></div>';

        stepCounter++;

        if (stepCounter % 3 === 1) {
            html += '</div><div class="row">';
        }
    });

    // Assuming you have a container with id "steps-container"
    $('#steps-container').html(html);

    // Calculate line positions after rendering
    calculateLinePositions();
}

// Function to calculate line positions after rendering
function calculateLinePositions() {
    var arrowLines = $('.arrow-line');
    arrowLines.each(function(index, element) {
        var currentStep = $(this).closest('.col-md-4').prev().find('.stepper-item.active');
        var nextStep = $(this).closest('.col-md-4').next().find('.stepper-item.active');

        if (currentStep.length > 0 && nextStep.length > 0) {
            var currentStepOffset = currentStep.offset();
            var nextStepOffset = nextStep.offset();

            var startX = currentStepOffset.left + currentStep.outerWidth() / 2;
            var startY = currentStepOffset.top + currentStep.outerHeight() - $(window).scrollTop();

            var endX = nextStepOffset.left + nextStep.outerWidth() / 2;
            var endY = nextStepOffset.top - $(window).scrollTop();

            // Set arrow line position and angle
            $(this).css({
                'left': startX,
                'top': startY,
                'width': Math.abs(endX - startX),
                'transform': 'rotate(' + Math.atan((endY - startY) / (endX - startX)) * (180 / Math.PI) + 'deg)'
            });
        }
    });
}

});
  
});
</script>
@endpush