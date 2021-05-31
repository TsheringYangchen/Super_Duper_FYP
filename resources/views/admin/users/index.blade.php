@extends('admin.layouts.master')

@section('page')
    Users
@endsection

@section('content')
    <form action="{{URL::to('/searchIR')}}" method="get" role="search" style="width: 40%">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control mr-2 border-input" name="q" placeholder="Search by name or cid">
            <span class="input-group-btn mr-1">
                <button class="btn btn-info" type="submit">
                    <span class="fa fa-search mt-2"></span>
                </button>
            </span>
        </div>
    </form>
    <div class="row">
        <div class="col-md-12">
            <div class="header">
                <div>
                    <a class="btn" href="{{ url('/admin/add') }}">Add Users</a>
                </div><br>
                <p class="category">List of registered users</p>
            </div>
            <div class="row">
                <div class="col-md-8 offset-2">
                    <table class="table table-responsive table-bordered">
                         <thead class="table-dark text-center">
                            <tr>
                                <th>Name</th>
                                <th>CID</th>
                                <th>Phone No</th>
                                <th>Email</th>
                                <th>User Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @include('admin.layouts.message')
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->cid }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->user_type }}</td>
                                <td class="text-center">
                                    <a href="issuer-edit/{{$user->id}}"><i class="fa fa-edit green-color fa-lg"></i></a>
                                    <a href="/deleteIR/{{$user->id}}" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash red-color fa-lg"></i></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
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