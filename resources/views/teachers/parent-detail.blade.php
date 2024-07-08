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
    @include('students.parent-profile')
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
