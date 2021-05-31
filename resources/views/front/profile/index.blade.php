    @extends('front.layouts.master3')

    @section('content')

    <br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{Auth::user()->name}}'s Dashboard</div><br>
                        <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px;height:150px;float:left;border-radius:50%;margin-right:25px">
                        <form action="{{ route('profile.update') }}" enctype="multipart/form-data" method="post">
                       <br>
                            <div>
                            <label>Update Profile Image</label><br>
                            <input type="file" name="avatar">
                        </div><br>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-sm btn-primary">
                    </form><br>
                    </div>
                </div>
               
            </div>
        </div>
    </div>


    @endsection




          