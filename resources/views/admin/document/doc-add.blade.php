@extends('admin.layouts.master')
@section('page')
    Upload reports
@endsection

@section('content')

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
<div class="jumbotron col-md-8">
<form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control border-input" id="title" name="title">
  </div>
  
  <div class="form-group">
    <label for="file">Choose File:</label>
    <input type="file" class="form-control-file" id="file" name="file">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>
</div>
@endsection