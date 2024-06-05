@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'student-profile'
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
            @include('admin.student-info.profile-inc')
           </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#other-gender').hide();
            $('#other-language').hide();
            $('#other-category').hide();
            $('#other-religion').hide();

            $('#gender').change(function() {
            if (this.value === 'other') {
                // $('#other-gender').removeClass('hidden').attr('required', true);

                $('#other-gender').show();
            } else {
                // $('#other-gender').addClass('hidden').removeAttr('required');
                $('#other-gender').hide();
            }
        });

        $('#student_language').change(function() {
            if (this.value === 'other') {
                $('#other-language').show();
            } else {
                $('#other-language').hide();
            }
        });

        $('#category').change(function(){
            if (this.value === 'other') {
                $('#other-category').show();
            } else {
                $('#other-category').hide();
            }
        })

        $('#religion').change(function(){
            if (this.value === 'other') {
                $('#other-religion').show();
            } else {
                $('#other-religion').hide();
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
        $('#state').on('change', function () {
                var idState = $(this).val();
                
                // $("#country").html('');
                $.ajax({
                    url: "{{url('json-state')}}",
                    type: "POST",
                    data: { 
                        state_id: idState,
                        _token: '{{csrf_token()}}' 
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log(result);
                        $('#country').html('<option value="">Select Country</option>');
                        $.each(result.states, function (key, value) {
                            $("#country").append('<option value="' + value
                                .id + '">' + value.country + '</option>');
                        });
                        // $('#city-dd').html('<option value="">Select City</option>');
                        $("#country").val('{{ old('country') }}');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Log any error response
                    }
                });
            });
            
    document.getElementById('add-document').addEventListener('click', function() {
        var tableBody = document.querySelector('#student-document tbody');
        var newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td>
                <input type="text" class="form-control" name="document_name[]" placeholder="Enter Document Name">
            </td>
            <td>
                <input type="file" class="form-control" name="document_file[]">
            </td>
            <td>
                <button type="button" class="btn btn-danger remove-document">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </td>
        `;

        tableBody.appendChild(newRow);
    });

    document.querySelector('#student-document tbody').addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-document')) {
            event.target.closest('tr').remove();
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date();
        var year = today.getFullYear();
        var month = ('0' + (today.getMonth() + 1)).slice(-2); // Add leading zero
        var day = ('0' + today.getDate()).slice(-2); // Add leading zero

        var currentDate = year + '-' + month + '-' + day;
        document.getElementById('admission_date').value = currentDate;
    });


    </script>
@endpush






                               
                               