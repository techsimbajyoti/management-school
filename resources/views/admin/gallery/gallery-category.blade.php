@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'gallery-category'
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
                        <h4 class="mb-0">Gallery category</h4>
                        <a href="{{route('add-gallery-category')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-plus"></i> Add</a>
                      </div>
                      <hr>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered class-table">
                            <thead class="thead">
                              <tr>
                                <th class="serial">SR No.</th>
                                <th class="purchase">Name</th>
                                <th class="purchase">Image</th>
                                <th class="purchase">Status</th>
                                <th class="action">Action</th>
                              </tr>
                            </thead>
                            <tbody class="tbody">
                              <tr id="row_3">
                                <td class="serial">3</td>
                                <td>Awards</td>
                                <td><a href="{{route('view-image')}}" ><img src="{{asset('paper/img/oceans.jpeg')}}" height="40px" width="40px"></a></td>
                                <td><span class="badge-basic-success-text">Active</span></td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('edit-gallery-category') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                <a href="{{ route('delete-gallery-category') }}" class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                              </tr>
                              <tr id="row_2">
                                <td class="serial">4</td>
                                <td>Annual Program</td>
                                <td><a href="{{route('view-image')}}"><img src="{{asset('paper/img/bg/school2.jpg')}}" height="40px" width="40px"></a></td>
                                <td><span class="badge-basic-success-text">Active</span></td>
                                <td class="action">
                                    <div class="dropdown dropdown-action">
                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a href="{{ route('edit-gallery-category') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                <a href="{{ route('delete-gallery-category') }}" class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                            </div>
                                        </div>
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