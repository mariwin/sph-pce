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
    <tbody>
        @foreach($jobs as $job)
            <tr>
                <td>{{$job->id}}</td>
                <td>{{$job->title}}</td>
                <td>{{$job->slug}}</td>
                <td><a href="{{ route('jobs.show', $job->id)}}" class="btn btn-primary">View</a></td>
            </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection