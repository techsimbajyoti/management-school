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
                            <input type="text" name="country" class="nice-select niceSelect bordered_style wide" value="demo" placeholder="Enter your school contact number">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">State <span class="fillable">*</span></label> 
                            <input type="text" name="state" class="nice-select niceSelect bordered_style wide" value="demo" placeholder="Enter your school contact number">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">City <span class="fillable">*</span></label> 
                            <input type="text" name="city" class="nice-select niceSelect bordered_style wide" value="demo" placeholder="Enter your school contact number">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">GST Exemptions <span class="fillable">*</span></label> 
                            <input type="text" name="city" class="nice-select niceSelect bordered_style wide" value="demo" placeholder="Enter your school contact number">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">Registration Number/Affiliation Code <span class="fillable">*</span></label> 
                            <input type="text" name="city" class="nice-select niceSelect bordered_style wide" value="demo" placeholder="Enter your school contact number">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">Board <span class="fillable">*</span></label> 
                            <input type="text" name="city" class="nice-select niceSelect bordered_style wide" value="demo" placeholder="Enter your school contact number">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">School Stablish Date <span class="fillable">*</span></label> 
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
                                <a href="#" class="btn btn-lg ot-btn-primary ml-3"><i class="fa fa-save"></i> {{ __('Update') }}</a>
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