@extends('admin.layouts.master')

@section('page')
    Dashboard
@endsection

@section('content')
<div class="container">
<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center" style="color:brown">
          <b>Bar Infringement Notice (BIN)
          </b>
        </h5>
        <hr style="border: 2px solid #F8EFBA">
        <div class="text-center">
          <a href="{{ url('admin/viewbin') }}" class="btn" style="color:#ef5777"><!--i class="fa fa-arrow-left"-->View Details</i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center" style="color:#82589F">
          <b>Entertainment Infringement Notice (EIN)
          </b>
        </h5>
        <hr style="border: 2px solid #F8EFBA">
        <div class="text-center">
          <a href="{{ url('admin/viewein') }}" class="btn" style="#82589F"> View Details
          </a>
        </div> 
      </div>
    </div>
  </div>
</div>
</div>

@endsection