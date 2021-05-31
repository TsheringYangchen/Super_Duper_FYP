@extends('admin.layouts.master')
@section('page')
    Edit BIN/EIN Providers
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
                        <form action="/updateissuer/{{$user->id}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
        
                            <input type="hidden" id="id" name="id" value="{{$user->id}}">
        
                    <div class="form-group">
                        <label><b>Provider Name:</b></label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label><b>CID Number:</b></label>
                        <input type="text" name="cid" value="{{$user->cid}}" class="form-control">
                    </div>
					<div class="form-group">
						<label><b>Phone Number :</b></label>
							<input id="phone" type="text" value="{{$user->phone}}" class="form-control " name="phone"> 
						</div>

					
                        <div class="form-group">
						    <label><b>Email Address:</b></label>
							<input id="email" type="email" value="{{$user->email}}" class="form-control " name="email">
						</div>

                         <div class="form-group">
                            <label><b>User Type :</b></label>
                            <input id="user_type" type="text" value="{{$user->user_type}}" class="form-control " name="user_type"> 
                        </div>
                         <div class="form-group mb-5">
                            <button type="submit" name="submit" class="btn btn-primary" style="margin-bottom: 20px"> Update</button>
                        </div>
                </form>
            </div>

            </div>
        </div>

    </div>

</div>
</div>

@endsection
