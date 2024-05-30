@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'exam'
])
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12 search-form"> 
                <form action="" method="" id="marksheed" enctype="multipart/form-data" name="marksheed">
                    <div class="card ot-card mb-24 position-relative z_1">
                        <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                            <h3 class="mb-0">Filtering</h3>
                            <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                                <div class="single_large_selectBox">
                                    <select class="nice-select niceSelect bordered_style wide" name="student_id">
                                        <option value='0'>Select student</option>
                                        <option value="1">Student 112</option>
                                        <option value="2">Student 123</option>
                                        <option value="3">Student 211</option>
                                        <option value="3">Student 2212</option>
                                        <option value="4">Student 319</option>
                                        <option value="5">Student 329</option>
                                    </select>
                                </div>
                                <div class="single_large_selectBox">
                                    <select class="nice-select niceSelect bordered_style wide" name="exam_type" id="exam_type">
                                        <option value="0">Select Exam Type</option>
                                        <option value="1">First</option>
                                        <option value="2">Mid</option>
                                        <option value="3">Final</option>       
                                    </select>
                                </div>
                                <button class="btn btn-lg ot-btn-primary" type="submit">
                                    <i class="fa fa-search"></i> Search
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="col-lg-12 exam-form" style="display:none;">
                <div class="card ot-card mb-24" id="printableArea">
                    <div class="download_print_btns">
                        <button class="btn btn-lg ot-btn-primary" onclick="printDiv('printableArea')"><i class="fa-solid fa-print"></i> Print Now</button> <a class="btn btn-lg ot-btn-primary" href=""><i class="fas fa-file-pdf"></i> PDF Download</a>
                    </div>
                    <div class="card-header">
                        <h4 class="mb-0">Exam Schedule</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-30">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="marked_bg">Day/Time</th>
                                        <th>11:00 - 11:59</th>
                                        <th>12:00 - 12:59</th>
                                        <th>1:00 - 1:59</th>
                                        <th>2:00 - 2:59</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>01 May 2024</th>
                                        <td>
                                            <div class="classBox_wiz">
                                                <h5>Math</h5>
                                                {{-- <p>Room No: 103</p> --}}
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>02 May 2024</th>
                                        <td></td>
                                        <td>
                                            <div class="classBox_wiz">
                                                <h5>Physics</h5>
                                                {{-- <p>Room No: 104</p> --}}
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>03 May 2024</th>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="classBox_wiz">
                                                <h5>Chemistry</h5>
                                                {{-- <p>Room No: 105</p> --}}
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>04 May 2024</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="classBox_wiz">
                                                <h5>Biology</h5>
                                                {{-- <p>Room No: 106</p> --}}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <dic class="col-lg-12 no-data" style="display:none;">
                <div class="table-content table-basic">
                    <div class="card mt-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Exam routine</h4>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="text-center gray-color">
                                <img src="https://school.onesttech.com/images/no_data.svg" alt="no_data" class="mb-primary" width="100">
                                <p class="mb-0 text-center">No data available</p>
                                <p class="mb-0 text-center text-secondary font-size-90">Please add new entity regarding this table</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
@endsection
@push('scripts')
    <script>
    $(document).ready(function(){
    $('.search-form').show();
    $('.no-data').hide();
    $('.exam-form').hide();

    $('#marksheed').on('submit', function(e) {
        e.preventDefault();
        var studentId = $('select[name="student_id"]').val();
        var examType = $('select[name="exam_type').val();
  
        if (studentId !== "0" && examType !== "0") {
            $('.no-data').hide();
            $('.exam-form').show();
        } else {
            $('.no-data').show();
            $('.exam-form').hide();
        }
    });
}); 

    </script>
@endpush

