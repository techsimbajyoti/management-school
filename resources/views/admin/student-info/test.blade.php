@extends('layouts.app', [
    'class' => '',
    'elementActive' => ''
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
   
    <div id="ajax-alert" style="display: none"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('Admit Student') }}</h5>
                    <a href="{{ route('students') }}" class="btn btn-lg btn-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="progress mb-3">
                        <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                    <form id="ajax-reg" method="post" enctype="multipart/form-data" class="wizard-form steps-validation" action="" data-fouc="" name="ajax-reg">
                        @csrf
                        <div class="steps">
                            <h6 class="font-weight-bold">Personal data</h6>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Full Name: <span class="text-danger">*</span></label>
                                            <input value="" required type="text" name="name" placeholder="Full Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address: <span class="text-danger">*</span></label>
                                            <input value="" class="form-control" placeholder="Address" name="address" type="text" required>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <h6 class="font-weight-bold">Student Data</h6>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="my_class_id">Class: <span class="text-danger">*</span></label>
                                            <select onchange="getClassSections(this.value)" data-placeholder="Choose..." required name="my_class_id" id="my_class_id" class="select-search form-control">
                                                <option value=""></option>
                                                <!-- Populate options -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="section_id">Section: <span class="text-danger">*</span></label>
                                            <select data-placeholder="Choose..." required name="section_id" id="section_id" class="select-search form-control">
                                                <option value=""></option>
                                                <!-- Populate options -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <h6 class="font-weight-bold">Contact Data</h6>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact">Contact: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="contact">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="parent_contact">Parent Contact: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="parent_contact">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="buttons d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary prev-step">Previous</button>
                            <button type="button" class="btn btn-primary next-step">Next</button>
                            <button type="submit" class="btn btn-success submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    var currentStep = 0;
    var steps = $('.steps fieldset');
    var btnNext = $('.next-step');
    var btnPrev = $('.prev-step');
    var btnSubmit = $('.submit');
    var progressBar = $('#progress-bar');

    steps.hide();
    $(steps[0]).show();
    btnPrev.hide();
    btnSubmit.hide();
    updateProgressBar();

    btnNext.click(function() {
        if (currentStep < steps.length - 1) {
            $(steps[currentStep]).hide();
            currentStep++;
            $(steps[currentStep]).show();
            if (currentStep == steps.length - 1) {
                btnNext.hide();
                btnSubmit.show();
            }
            btnPrev.show();
            updateProgressBar();
        }
    });

    btnPrev.click(function() {
        if (currentStep > 0) {
            $(steps[currentStep]).hide();
            currentStep--;
            $(steps[currentStep]).show();
            if (currentStep == 0) {
                btnPrev.hide();
            }
            btnNext.show();
            btnSubmit.hide();
            updateProgressBar();
        }
    });

    function updateProgressBar() {
        var percentage = ((currentStep + 1) / steps.length) * 100;
        progressBar.css('width', percentage + '%');
        progressBar.attr('aria-valuenow', percentage);
        progressBar.text(Math.round(percentage) + '%');
    }
});
</script>
@endpush
