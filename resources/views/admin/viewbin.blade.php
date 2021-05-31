@extends('admin.layouts.master')
@section('content')
@section('page')
  BIN Details
@endsection       

<form action="{{URL::to('/searchbin')}}" method="get" role="search" style="width: 40%">
  {{ csrf_field() }}
  <div class="input-group">
      <input type="text" class="form-control mr-2 border-input" name="q" placeholder="Search by License Number">
        <span class="input-group-btn mr-1">
          <button class="btn btn-info" type="submit">
              <span class="fa fa-search mt-2"></span>
          </button>
      </span>
  </div>
</form>
<br>

<div class="row">
  <div class="col-md-8 offset-2">
    <table class="table table-responsive table-bordered">
      <thead class="table-dark text-center">
        <tr>
        <th scope="col">License No</th>
        <th scope="col">Violation Date</th>
        <th scope="col">Violation Type</th>
        <th scope="col">Issued By</th>
        <th scope="col">Evidence</th>
      </tr>
      </tr>
    </thead>
    @include('admin.layouts.message')
    <tbody>
        @foreach ($issuers as $issuer)
        <tr>
          <td>{{ $issuer->license_no}}</td>
          <td>{{ $issuer->violation_date}}</td>
          <td>{{ $issuer->violation_type}}</td>
          <td>{{ $issuer->user_id}}</td>
          <td><?php foreach(json_decode($issuer->image) as $picture){?><img src="{{ url('uploads/bin').'/'.$picture}}" alt="{{ $issuer->images }}" class="mx-auto d-block img-thumbnail" style="width: 200px; height : 150px">
              <?php } ?>
          </td>
        </tr>
        @endforeach
      
    </tbody>
  </table>

  {{$issuers->links() }}
</div>
</div>

<style>
  img:hover 
  {
    transform: scale(1.6);
  }
</style>
@endsection
                



                
    
