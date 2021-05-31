@extends('admin.layouts.master')
@section('page')
    Uploads Report
@endsection
@section('content')
<div class="control-btn float-right">
  <a href="{{ route('document.create') }}" class="btn btn-primary">Add File</a>
</div>
<br>
<p>List of Uploaded Files</p>
<br>
@if (session('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
@endif
@if (session('error'))
  <div class="alert alert-danger" role="alert">
    {{ session('error') }}
  </div>
@endif
<table class="table table-bordered">
  <thead>
    <tr style="background-color:skyblue">
      <th><b>Title</b></th>
      <th><b>File Name</b></th>
      <th><b>Action</b></th>
    </tr>
  </thead>
    <tbody>
      @forelse ($docs as $doc)
      <tr>
        <td>{{ $doc->title }}</td>
        <td>{{ $doc->file_url }}</td>
        <td>
          <a href="{{ route('document.edit', $doc->id) }}" ><i class="fa fa-edit green-color fa-lg"></i></a>&nbsp;&nbsp;
          <a href="/delete-report/{{$doc->id}}" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash red-color fa-lg"></i></a>
              
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="3">
          <center>
            No data found
          </center>
        </td>
      </tr>
      @endforelse
  </tbody>
</table>
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