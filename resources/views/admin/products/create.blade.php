@extends('admin.layouts.master')

@section('page')
    Add License Holder
@endsection

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12">

        <div class="card col-md-6">
            <div class="card-body">

                @include('admin.layouts.message')
                
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
                <form action="/license/register" method="post" enctype="multipart/form-data">
                    
                    @csrf
                    <div class="form-group">
                        <label for="name"><b>License Number:</b></label>
                        <input type="text" name="license_no" placeholder="License Number" id="license_no" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="license"><b>License Holder Name:</b></label>
                        <input type="text" name="license_name" placeholder="Name" id="license_name" class="form-control">
                    </div>
                   
                    <div class="form-group">
                        <label for="license"><b>CID No:</b></label>
                        <input type="text" name="cid" placeholder="CID No" id="cid" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="license"><b>Phone No#</b></label>
                        <input type="text" name="phone" placeholder="Phone No" id="phone" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label for="image"><b>Select Image</b></label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="license"><b>Establishment Location</b></label>
                        <input type="text" name="location" placeholder="Current location of your business" id="location" class="form-control">
                    </div>
                   
                    <div class="form-group">
                        <label for="license_type"><b>Select License Type</b></label><br>
                        <select name="license_type">
                            <option value="Bar License" name="license_type">
                                 Bar License
                            </option>
                            <option value="Entertainment License" name="license_type">
                                Entertainment License
                            </option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-success"><b>Register</b></button>
                    </div>

                </form>
            </div>

            </div>
        </div>

    </div>

</div>
</div>

@endsection
    
