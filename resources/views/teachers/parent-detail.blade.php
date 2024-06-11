@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'parent-detail'
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
            <div class="row">
                <div class="col-12">
                  <div class="card ot-card mb-24 position-relative z_1">
                    <form action="" enctype="multipart/form-data" method="post">
                      @csrf
                      <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                        <h3 class="mb-0">Filtering</h3>
                        <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                          <div class="single_large_selectBox">
                            <select id="getSections" class="class nice-select niceSelect bordered_style wide" name="class">
                              <option value="">
                                Select one of these
                              </option>
                              <option selected value="1">
                                Student 1112
                              </option>
                              <option value="2">
                                Student 1113
                              </option>
                              <option value="3">
                                Student 1114
                              </option>
                              <option value="4">
                                Student 1115
                              </option>
                            </select>
                          </div>
                          <button class="btn btn-lg ot-btn-primary"><i class="fa fa-search"></i> Search</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                
     
        <div class="col-lg-4">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-body text-center">
                    <img src="{{ asset('paper') }}/img/dummy-image.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">Steve Smith</h5>
                    <p class="text-muted mb-1">Contact : 1478523690 </p>
                    
                </div>
            </div>
        </div>
            
        <div class="col-lg-8">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header">
                    <h4 class="mb-0">Father Information</h4>
                </div>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Father Name</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">Steve Smith</p>
                        </div>
                        
                    </div>
                    
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Father Contact </p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">25147820</p>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Father Email</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">demo@demo.com</p>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Father Profession</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">Professor</p>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Father Nationality</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">demo</p>
                        </div>
                        
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-body text-center">
                    <img src="{{ asset('paper') }}/img/dummy-image.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">Sohpia Steve</h5>
                    <p class="text-muted mb-1">Contact : 123654987 </p>
                    
                </div>
            </div>
        
        </div>
        <div class="col-lg-8">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header">
                    <h4 class="mb-0">Mother Information</h4>
                </div>
                <hr>
                <div class="card-body">
                    <div class="row">
                       
                        <div class="col-sm-3">
                            <p class="mb-0">Mother Name</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">Sohpia Steve</p>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                        
                        <div class="col-sm-3">
                            <p class="mb-0">Mother Contact </p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">123654987</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        
                        <div class="col-sm-3">
                            <p class="mb-0">Mother Email</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">demo@demo.com</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        
                        <div class="col-sm-3">
                            <p class="mb-0">Mother Profession</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">Doctor</p>
                        </div>
                    </div>
                    <hr>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-body text-center">
                    <img src="{{ asset('paper') }}/img/dummy-image.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">demo</h5>
                    <p class="text-muted mb-1">Contact : 25635256 </p>
                    <p class="text-muted mb-1">Guardian Relation : Uncle </p>
                    
                </div>
            </div>
        
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">Guardian Information</h4>
                </div>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Guardian Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">demo</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Guardian Contact</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">25635256</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Guardian Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">demo@demo.com</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Guardian Profession</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">Professor</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Guardian Address</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">Bay Area,San Francisco
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Guardian Relation</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">Uncle</p>
                        </div>
                    </div>
                    <hr>
                   
                    
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
    $(document).ready(function() {
    var previousState = {};
    
    $('#holiday').change(function() {
      if ($(this).is(':checked')) {
        // Save the state of radio inputs before unchecking them
        $('#students_table input[type="radio"]').each(function() {
          var name = $(this).attr('name');
          previousState[name] = $('input[name="' + name + '"]:checked').val();
        });
        
        // Uncheck all radio inputs
        $('#students_table input[type="radio"]').prop('checked', false);
      } else {
        // Restore the previous state of radio inputs
        $.each(previousState, function(name, value) {
          $('input[name="' + name + '"][value="' + value + '"]').prop('checked', true);
        });
      }
    });
  });
</script>
@endpush
