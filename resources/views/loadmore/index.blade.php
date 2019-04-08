@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <h1>Job Listing</h1>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Title</td>
          <td>Slug</td>
          <td colspan="1">Action</td>
        </tr>
    </thead>
    {{ csrf_field() }}
    <tbody id='post_data'>
    </tbody>
  </table>
<div>
@endsection
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
$(document).ready(function(){

  var lastId = '';
  if($("#load_more_button").length == 0) {
    lastId = $('#load_more_button').val();
  }
  var _token = $('input[name="_token"]').val();

  load_data(lastId, _token);

  function load_data(id, _token){ 
    $.ajax({
    url:"{{ route('loadmore.load_data') }}",
    method:"POST",
    data:{id:id, _token:_token},
    success:function(data)
    {
      $('#tr_load_more').remove();
      $('#post_data').append(data);
    }
    })
  }

  $(document).on('click', '#load_more_button', function(){
    var id = $(this).val()
    $('#load_more_button').html('<b>Loading...</b>');
    load_data(id, _token);
  });
});
</script>