<div class="table-content table-basic mt-20">
    <div class="card ot-card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Annual Function Video</h4>
        @if(auth()->guard('web')->check() && auth()->guard('web')->user()->role_id == 1)
        <a href="{{route('gallery-category')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        @elseif(auth()->guard('webstudents')->check() && auth()->guard('webstudents')->user()->role_id == 4)
        <a href="{{route('student-gallary')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        @endif
      </div>
      <hr>
      <div class="card-body">
        <div class="row">
            <div class="gallery">
                <a href="{{ asset('paper') }}/img/1.jpeg" data-lightbox="image-gallery" data-title="Image 1">
                    <img src="{{ asset('paper') }}/img/1.jpeg" alt="Image 1" class="zoom">
                </a>
                <a href="{{ asset('paper') }}/img/11.jpeg" data-lightbox="image-gallery" data-title="Image 2">
                    <img src="{{ asset('paper') }}/img/11.jpeg" alt="Image 2" class="zoom">
                </a>
                <a href="{{ asset('paper') }}/img/111.jpeg" data-lightbox="image-gallery" data-title="Image 2">
                    <img src="{{ asset('paper') }}/img/111.jpeg" alt="Image 2" class="zoom">
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
<!-- Include ElevateZoom JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>
<!-- Include Lightbox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
    $(document).ready(function(){
            $('.zoom').elevateZoom({
                zoomType: "lens",
                lensShape: "round",
                lensSize: 200,
                scrollZoom: true
            });
            
        });
</script>
@endpush