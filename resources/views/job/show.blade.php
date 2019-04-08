@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h2>Details</h2>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif  
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">ID:</label>
          <input type="text" class="form-control" name="share_name" value={{ $job->id }} />
        </div>
        <div class="form-group">
          <label for="price">Title :</label>
          <input type="text" class="form-control" name="share_price" value={{ $job->title }} />
        </div>
        <div class="form-group">
          <label for="quantity">Slug:</label>
          <input type="text" class="form-control" name="share_qty" value={{ $job->slug }} />
        </div>
        <div class="form-group">
          <label for="quantity">Related Industries:</label>
          <table class="table table-striped">
            <thead>
                <tr>
                  <td>ID</td>
                  <td>Name</td>
                  <td>Slug</td>
                </tr>
            </thead>
            <tbody>
                @foreach($job->industries as $industry)
                    <tr>
                        <td>{{$industry->id}}</td>
                        <td>{{$industry->name}}</td>
                        <td>{{$industry->slug}}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>


        </div>
  </div>
</div>
@endsection