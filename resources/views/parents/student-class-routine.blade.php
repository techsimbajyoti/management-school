@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'student-class-routine'
])
@section('content')
<style>
    .table { width: 100%; }
    .form-control { width: 100%; }
    .fa-calendar, .fa-dollar-sign { margin-left: 5px; cursor: pointer; }
    .hidden { display: none; }
</style>
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
        <div class="col-12 search-form">
            <form action="" method="" id="marksheed" enctype="multipart/form-data" name="marksheed">
              <input type="hidden" name="_token" value="fE3jhMKUFkldbNrDIJ5XZv8piyHC35HDe5tRxIwb">
              <div class="card ot-card mb-24 position-relative z_1">
                <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                  <h3 class="mb-0">Filtering</h3>
                  <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                    <div class="single_large_selectBox">
                      <select class="nice-select niceSelect bordered_style wide" name="student">
                        <option value="">
                          Select student
                        </option>
                        <option selected value="2">
                        Child 1 - Student 112
                        </option>
                        <option value="17">
                        Child 2-  Student 123
                        </option>
                     </select>
                    </div>
                    <button class="btn btn-lg ot-btn-primary" type="submit">Search</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
    
        <div class="col-md-12">
            <div class="card ot-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Lecture Plan</h4>
                    
                </div>
                <hr>
                <div class="card-body">
                  <form action="" enctype="multipart/form-data" method="" id="visitForm" name="visitForm">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-lg-12">

                        <div class="col-12">  
                            <div class="table-responsive">
                                <table class="table school_borderLess_table table_border_hide2 myTable" id="student-document">
                                    <thead class="table-header" style="border-bottom: 2px solid #dee2e6;">
                                        <tr>
                                            <th scope="col">Week Days <span class="text-danger"></span></th>
                                            <th scope="col">Lecture1 <span class="text-danger"></span></th>
                                            <th scope="col">Lecture2 <span class="text-danger"></span></th>
                                            <th scope="col">Lecture3 <span class="text-danger"></span></th>
                                            <th scope="col">Lecture4 <span class="text-danger"></span></th>
                                            <th scope="col">Lecture5 <span class="text-danger"></span></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                           <td class="text-danger">Monday </td>
                                            <td>Bio <br>(teacher1)</td>
                                            <td>English<br>(teacher2) </td>
                                            <td>Chemistry <br>(teacher5) </td>
                                            <td>Hindi <br>(teacher3) </td>
                                            <td>Sports <br>(teacher4) </td>
                                    
                                               
                                           </tr>    
                                           <tr>
                                            <td class="text-danger">Tuesday </td>
                                             <td>English <br>(teacher2) </td>
                                             <td>English <br>(teacher4) </td>
                                             <td>Chemistry <br>(teacher1) </td>
                                             <td>Hindi <br>(teacher3) </td>
                                             <td>Bio <br>(teacher2) </td>
                                     
                                                
                                            </tr>    
                                            <tr>
                                                <td class="text-danger">Wednesday </td>
                                                 <td>Hindi <br>(teacher2) </td>
                                                 <td>Physics <br>(teacher3) </td>
                                                 <td>Chemistry <br>(teacher5) </td>
                                                 <td>English <br>(teacher4) </td>
                                                 <td>Physics <br>(teacher6) </td>
                                         
                                                    
                                            </tr>    
                                            <tr>
                                                <td class="text-danger">Thursday </td>
                                                 <td>Chemistry <br>(teacher2) </td>
                                                 <td>Physics <br>(teacher3) </td>
                                                 <td>Chemistry <br>(teacher5) </td>
                                                 <td>Sports <br>(teacher4) </td>
                                                 <td>Bio <br>(teacher6) </td>
                                         
                                                    
                                            </tr>    
                                             
                                    </tbody>
                                </table>
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

@push('scripts')


    <script>
        $(document).ready(function() {
            $('.student-disabled-list').hide();

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
