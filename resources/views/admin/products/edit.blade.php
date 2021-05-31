
@extends('admin.layouts.master')

@section('page')
    Edit License Holder
@endsection

@section('content')

<div class="row">

    <div class="col-md-12">

        <div class="card col-md-8">
            <div class="card-body">
                @if ( $errors->any() )

                    <div class="alert alert-success">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
                <br>
                <div class="jumbotron">
                <form action="/update/{{ $license->id}}" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <input type="hidden" id="id" name="id" value="{{$license->id}}">

                    <div class="form-group">
                        <label for="name">License Holder Name:</label>
                        <input type="text" name="license_name" value="{{ $license->license_name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">License Number:</label>
                        <input type="text" name="license_no" value="{{ $license->license_no}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="license"><b>CID No:</b></label>
                        <input type="text" name="cid" value="{{ $license->cid}}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="license"><b>Phone No#</b></label>
                        <input type="text" name="phone" value="{{ $license->phone}}" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label for="license"><b>Location</b></label>
                        <input type="text" name="location" value="{{ $license->location}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="license_type"><b>Select License Type</b></label><br>
                        <select name="license_type">
                            <option value="Bar License" name="license_type" @if ($license->license_type) selected @endif>
                                 Bar License
                            </option>
                            <option value="Entertainment License" name="license_type" @if ($license->license_type) selected @endif>
                                Entertainment License
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="image"><b>Image</b></label>
                        <!-- input type="file" name="image" class="custom-file-input" value="{{ $license->image }}"-->
                        <input type="file" name="image" id="profile-img" value="{{ $license->image }}">
                        <img src="{{ url('uploads').'/'.$license->image}}" id="profile-img-tag" width="200px" />

                    </div>

                    <div class="form-group mb-5">
                        <button type="submit" name="submit" class="btn btn-primary" style="margin-bottom: 20px"> Update</button>
                        <a href="/admin/viewLicense" class="btn btn-danger" style="margin-bottom: 20px"> Cancel </a>
                    </div>

                </form>
            </div>

            </div>
        </div>

    </div>

</div>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
</script>

@endsection
