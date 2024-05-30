@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'gallary'
])
@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12 search-form">
      <div class="col-12 p-0">
        <form action="" method="" id="marksheed" enctype="multipart/form-data" name="marksheed">
          <input type="hidden" name="_token" value="T8ADYQ4K6q9LyaUSsnKqFQ0S4GqWjDxZrDkKbHTb">
          <div class="card ot-card mb-24 position-relative z_1">
            <div class="card-header d-flex align-items-center gap-4 flex-wrap">
              <h3 class="mb-0">Filtering</h3>
              <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                <div class="single_large_selectBox">
                  <select class="nice-select niceSelect bordered_style wide student" name="student">
                    <option value="">
                      Select Ocassion
                    </option>
                    <option value="2">
                      Cultural Day
                    </option>
                    <option value="17">
                      Sports Day
                    </option>
                    <option value="29">
                      Independence Day
                    </option>
                    <option value="54">
                      Fun Day
                    </option>
                    <option value="65">
                      Interschool Competition
                    </option>
                  </select>
                </div>
                <button class="btn btn-lg ot-btn-primary" type="submit"><i class="fa fa-search"></i> Search</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    
  
  
    <div class="col-md-12 gallary-box" style="display:none;">
      <div class="card ot-card mb-24 position-relative z_1">
        <div class="card-header">
          <h3>Image Gallery</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <img src="{{asset('paper/img/student.jpeg')}}" class="card-img-top" alt="Image 1">
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <img src="{{asset('paper/img/student1.jpeg')}}" class="card-img-top" alt="Image 2">
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <img src="{{asset('paper/img/download.jpeg')}}" class="card-img-top" alt="Image 3">
              </div>
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
    $('.gallary-box').hide();
    $('.search-form').show();


    $('#marksheed').on('submit', function(e) {
      e.preventDefault(); 
      $('.gallary-box').show();
      $('.search-form').show();
     
    });

   });

</script>
@endpush