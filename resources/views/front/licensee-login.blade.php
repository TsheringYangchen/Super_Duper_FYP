
@extends('front.layouts.master2')
@section('content')
<br>
<div class="container">
    <h3 class="text-center text-primary">BEST_R SYSTEM</h3>
    <p class="text-center">Department of Trade</p>
    <hr class=" w-50 bg-warning">
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">View License Status</div>
                        <div class="card-body">
                            @include('admin.layouts.message')
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="d-flex justify-content-center form_container">
                           
                            <form  method="post" action="front/licensee-login">
                                {{  csrf_field() }}

                                <div class="form-group row">
                                    <label for="lno" class="col-md-6 col-form-label text-md-right">License Number:</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control " name="no" placeholder="License Number"> 
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-6">
                                        <button type="submit" name="button" class="btn btn-primary">View</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> 
</div>
    
    
@endsection


