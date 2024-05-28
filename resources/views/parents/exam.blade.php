@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'exam'
])
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12"> 
                <form action id="marksheed" enctype="multipart/form-data">
                    <div class="card ot-card mb-24 position-relative z_1">
                    <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                    <h3 class="mb-0">Filtering</h3>
                    <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                    
                    <div class="single_large_selectBox">
                    <select class="nice-select niceSelect bordered_style wide" name="student_id">
                    <option value>Select student</option>
                    <option value="2">Student 112
                    <option value="17">Student 123
                    <option value="29">Student 211
                    <option value="54">Student 2212
                    <option value="65">Student 319
                    <option value="79">Student 329
                    </select>
                    </div>
                    <button class="btn btn-lg ot-btn-primary" type="submit"><i class="fa fa-search"></i>
                    Search
                    </button>
                    </div>
                    </div>
                    </div>
                </form>
            </div>
            
                <div class="col-lg-12">
                    <div class="download_print_btns ">
                    <button class="btn btn-lg ot-btn-primary" onclick="printDiv('printableArea')">
                    Print Now
                    <span><i class="fa-solid fa-print"></i></span>
                    </button>
                    <a class="btn btn-lg ot-btn-primary" href="">
                    PDF Download
                    <span><i class="fa-brands fa-dochub"></i></span>
                    </a>
                    </div>

                <div class="page-content" id="printableArea">

                        
                <div class="table-responsive">
                    <table class="table border_table mb_30">
                    <thead>
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
                    <p>Room No: 103</p>
                    </div>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    </tr>
                    <tr>
                    <th>02 May 2024</th>
                    <td>
                    </td>
                    <td>
                    <div class="classBox_wiz">
                    <h5>Physics</h5>
                    <p>Room No: 104</p>
                    </div>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    </tr>
                    <tr>
                    <th>03 May 2024</th>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    <div class="classBox_wiz">
                    <h5>Chemistry</h5>
                    <p>Room No: 105</p>
                    </div>
                    </td>
                    <td>
                    </td>
                    </tr>
                    <tr>
                    <th>04 May 2024</th>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    <div class="classBox_wiz">
                    <h5>Biology</h5>
                    <p>Room No: 106</p>
                    </div>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div> 
        </div>
    </div>        
@endsection