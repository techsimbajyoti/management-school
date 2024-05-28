@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'marksheet'
])
@section('content')
    <div class="content">
            <div class="row">
            <div class="col-md-12"> 
                <form action="" method="post" id="marksheet" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="VEysqVBCR0KYZWVKtIbfyAXh5yl4uSwDtDxCKKTo"> <div class="card ot-card mb-24 position-relative z_1">
                    <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                    <h3 class="mb-0">Filtering</h3>
                    <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                    
                    <div class="single_large_selectBox">
                    <select class="nice-select niceSelect bordered_style wide studen" name="student">
                    <option value>Select student</option>
                    <option selected value="2">Student 112
                    <option value="17">Student 123
                    <option value="29">Student 211
                    <option value="54">Student 2212
                    <option value="65">Student 319
                    <option value="79">Student 329
                    </select>
                    </div>
                    <div class="single_large_selectBox">
                    <select class="nice-select niceSelect bordered_style wide exam_types " name="exam_type">
                    <option value>Select Exam Type *</option>
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
        </div>
    </div>        
@endsection