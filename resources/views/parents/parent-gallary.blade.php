@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'parent-gallery'
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
                <div class="table-content table-basic mt-20">
                    <div class="card ot-card">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Gallery Category</h4>
                      
                      </div>
                      <hr>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered class-table">
                            <thead class="thead">
                              <tr>
                                <th class="serial">SR No.</th>
                                <th class="purchase">Name</th>
                                <th class="purchase">Image / Video</th>
                               
                              </tr>
                            </thead>
                            <tbody class="tbody">
                              <tr id="row_3">
                                <td class="serial">3</td>
                                <td>Awards</td>
                                <td><a href="{{route('view-image')}}" class="ot-btn-primary"><i class="fa fa-image"></i></a> <a href="{{route('view-video')}}" class="ot-btn-primary"><i class="fa fa-video"></i></a></td>
                               
                              </tr>
                              <tr id="row_2">
                                <td class="serial">4</td>
                                <td>Annual Program</td>
                                <td><a href="{{route('view-image')}}" class="ot-btn-primary"><i class="fa fa-image"></i></a> <a href="{{route('view-video')}}" class="ot-btn-primary"><i class="fa fa-video"></i></a></td>
                               
                              </tr>
                            </tbody>
                          </table>
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
            $('.detail-view').hide();
            $('.short-view').hide();    

            $('.search-student').click(function(){
                var niceSelect = $('.niceSelect').val();
                if(niceSelect == 1){
                    $('.detail-view').show();
                }else{
                    $('.detail-view').hide();
                }

                if(niceSelect == 0){
                    $('.short-view').show();
                }else{
                    $('.short-view').hide();
                }
                
            })

            var sections = {
                1: ["A", "B", "C"],
                2: ["D", "E"],
                3: ["F", "G", "H", "I"]
            };

            $('#getSections').change(function() {
                var classId = $(this).val();
                var $sectionsDropdown = $('.sections');
                $sectionsDropdown.empty();
                $sectionsDropdown.append('<option value="">Select section</option>');

                if (sections[classId]) {
                    sections[classId].forEach(function(section) {
                        $sectionsDropdown.append('<option value="' + section + '">' + section + '</option>');
                    });
                }
            });
        });
    </script>
@endpush