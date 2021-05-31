@extends('admin.layouts.master')
@section('content')
@section('page')
    Search Results.
@endsection
<div class="row">
    <div class="col">
          <form action="{{URL::to('/search')}}" method="get" role="search" style="width: 35%">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control mr-2 border-input" name="q" placeholder="Search by License number or name">
              <span class="input-group-btn mr-1">
                <button class="btn btn-info" type="submit">
                    <span class="fa fa-search mt-2"></span>
                </button>
            </span>
        </div>
      </form>
    </div>
  </div>
<br>
<div class="row">
    <div class="col-md-8 offset-2">
<table class="table table-responsive table-bordered">
    <thead class="table-dark text-center">
      <tr>
        <th>License No</th>
        <th>Licensee</th>
        <th>CID No</th>
        <th>Phone No</th>
        <th>Location</th>
        <th>Image</th>
        <th>License Type</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($licenses as $license)
        <tr>
          <td>{{ $license->license_no }}</td>
          <td>{{ $license->license_name }}</td>
          <td>{{ $license->cid }}</td>
          <td>{{ $license->phone }}</td>
          <td>{{ $license->location }}</td>
          <td>
            <img src="{{ url('uploads').'/'.$license->image}}" alt="{{ $license->image }}" class="mx-auto d-block img-thumbnail" style="width: 90px; height : 80px">
          </td>
          <td>{{ $license->license_type }}</td>
          <td>
            <div style="text-align: center;">
              @if($license->status == 0)
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-circle-fill" viewBox="0 0 16 16">
                <circle cx="8" cy="8" r="8"/>
              </svg>
              @elseif($license->status == 1)
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-circle-fill" viewBox="0 0 16 16">
              <circle cx="8" cy="8" r="8"/>
              </svg>
              @elseif($license->status == 2)
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="yellow" class="bi bi-circle-fill" viewBox="0 0 16 16">
              <circle cx="8" cy="8" r="8"/>
              </svg>
              @elseif($license->status == 3)
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-circle-fill" viewBox="0 0 16 16">
              <circle cx="8" cy="8" r="8"/>
              </svg>
              @endif
            </div>
          </td>
          <td class="text-center">
            <a href="admin/license-edit/{{$license->id}}"><i class="fa fa-edit green-color fa-lg"></i></a>&nbsp;
          </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
<style>
  .green-color 
  {
    color:green;
  }
  .red-color 
  {
  color:red;
  }
</style>
@endsection



                