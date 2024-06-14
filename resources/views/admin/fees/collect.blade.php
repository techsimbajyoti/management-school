@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'fees-collect'
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
                        <form action="" enctype="multipart/form-data" method="post" id="fees-collect" name="fees-collect">
                          @csrf
                          <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                            <h3 class="mb-0">Filtering</h3>
                            <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                              <div class="single_selectBox">
                                <select id="getSections" class="class nice-select niceSelect bordered_style wide" name="class">
                                  <option value="">
                                    Select class
                                  </option>
                                  <option value="2">
                                    Two
                                  </option>
                                </select>
                              </div>
                              <div class="single_selectBox">
                                <select class="sections section nice-select niceSelect bordered_style wide" name="section">
                                  <option value="">
                                    Select section
                                  </option>
                                </select>
                              </div>
                              <div class="single_selectBox">
                                <select class="students nice-select niceSelect bordered_style wide" name="student">
                                  <option value="">
                                    Select student
                                  </option>
                                </select>
                              </div>
                              <a class="btn btn-lg ot-btn-primary" id="search"><i class="fa fa-search"></i> Search</a>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="table-content table-basic mt-20 student-list">
                    <div class="card">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Fees collect</h4>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered role-table myTable" id="students_table">
                            <thead class="thead">
                              <tr>
                                <th class="purchase">Student name</th>
                                <th class="purchase">Admission NO</th>
                                <th class="purchase">Class (Section)</th>
                                <th class="purchase">Guardian name</th>
                                <th class="purchase">Mobile number</th>
                                <th class="purchase">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr id="document-file">
                                <td>Student 111</td>
                                <td>2023111</td>
                                <td>Two (A)</td>
                                <td>Guardian8</td>
                                <td>0147852111</td>
                                <td>
                                  <a href="#" target="_blank" class="btn btn-sm ot-btn-primary">Collect</a>
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
        $('#student-fees').hide();
        $('.student-list').hide();

        $('#fees_group').click(function(){
            $('#student-fees').show();
        })

        $('#search').click(function(){
            $('.student-list').show();
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

            $('.search-student').click(function(){
                $('.student-disabled-list').show();
            })
    });
</script>
@endpush