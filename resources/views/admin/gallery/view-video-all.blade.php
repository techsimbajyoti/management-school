<div class="table-content table-basic mt-20">
    <div class="card ot-card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Annual Function Video</h4>
        @if(auth()->guard('web')->check() && auth()->guard('web')->user()->role_id == 1)
        <a href="{{route('gallery-category')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        @elseif(auth()->guard('webstudents')->check() && auth()->guard('webstudents')->user()->role_id == 4)
        <a href="{{route('student-gallary')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        @elseif(auth()->guard('webparents')->check() && auth()->guard('webparents')->user()->role_id == 5)
        <a href="{{route('parent-gallary')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        @elseif(auth()->guard('webteachers')->check() && auth()->guard('webteachers')->user()->role_id == 2)
        <a href="{{route('teacher-gallery-category')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        @elseif(auth()->guard('webaccountants')->check() && auth()->guard('webaccountants')->user()->role_id == 3)
        <a href="{{route('accountant-gallery')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        @endif
      </div>
      <hr>
      <div class="card-body">
        <div class="row">
            <div class="gallery">
              <a href="{{ asset('paper/img/1.mp4') }}" data-lightbox="video-gallery" data-title="Video 1">
                <video width="250" controls>
                    <source src="{{ asset('paper/img/1.mp4') }}" type="video/mp4">
                </video>
            </a>

                <a href="{{ asset('paper/img/2.mp4') }}" data-lightbox="video-gallery" data-title="Video 2">
                    <video width="250" controls>
                        <source src="{{ asset('paper/img/2.mp4') }}" type="video/mp4">
                    </video>
                </a>

                <a href="{{ asset('paper/img/3.mp4') }}" data-lightbox="video-gallery" data-title="Video 3">
                    <video width="250" controls>
                        <source src="{{ asset('paper/img/3.mp4') }}" type="video/mp4">
                    </video>
                </a>
            </div>
        </div>
    </div>
    </div>
  </div>

  @push('scripts')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Include Lightbox JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
  <script>
      $(document).ready(function() {
          // Initialize Lightbox
          lightbox.option({
              'resizeDuration': 200,
              'wrapAround': true,
              'alwaysShowNavOnTouchDevices': true,
              'video': true // This option might be required depending on the Lightbox version
          });
      });
  </script>
  @endpush