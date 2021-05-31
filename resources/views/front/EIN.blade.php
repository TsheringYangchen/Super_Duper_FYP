@extends('front.layouts.master3') 
@section('content')

<div class="container border text-center mt-2" style="background-color: #CAD3C8">
	<h3>ENTERTAINMENT INFRINGEMENT NOTICE (EIN)</h3>
  <br>
  @include('admin.layouts.message')

  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        @if ( $errors->any() )
        <div class="alert alert-success">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>s
        </div>
        @endif

        <form method="post" action="/getein" enctype="multipart/form-data">
        @csrf
          <div class="form-group row">
            <div class="col-md-6">
              <label for="license">License Number</label>
              <input type="text" class="form-control" name="license_no" placeholder="License Number" />
            </div>

            <div class="col-sm-6">
              <label>Violation Date</label>
              <input type="date" class="form-control" id="violation_date" name="violation_date" placeholder="DD/MM/YYYY"> 
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
              <p class="font-weight-bold" style="font-size: 20px">Nature of Offence/Violations</p>
            </div>
          </div>
          
          <div class="alert alert-danger">
            <div class="form-container">
              <div class="form-group row">
                <div class="col-sm-10">
                  <input class="form-check-input" type="checkbox" name="violation_type[]" value="Dry Day Violation" />
                  <label class="form-check-label" for="inlineCheckbox1">1) Dry Day Violation</label>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-10">
                  <input class="form-check-input" type="checkbox" name="violation_type[]"  value="Opening before 5PM" />
                  <label class="form-check-label" for="inlineCheckbox2">2) Opening before 5PM</label>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-10">
                  <input class="form-check-input" type="checkbox" name="violation_type[]" value="Open after 11PM/12PM (Monday/Wednesday/Thursday/Sunday)" />
                  <label class="form-check-label" for="inlineCheckbox3">3) Open after 11PM/12PM (Monday/Wednesday/Thursday/Sunday)</label>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-10">
                  <input class="form-check-input" type="checkbox" name="violation_type[]" value="Open after 12PM/1AM (Friday/Saturday)" />
                  <label class="form-check-label" for="inlineCheckbox4">4) Open after 12PM/1AM (Friday/Saturday)</label>
                </div>
              </div>
              
              <div class="form-group row">
                <div class="col-sm-10">
                  <input class="form-check-input" type="checkbox" name="violation_type[]" value="Open on Sunday/Monday/Thursday" />
                  <label class="form-check-label" for="inlineCheckbox5">5) Open on Sunday/Monday/Thursday</label>
                </div>
              </div> 

              <div class="form-group row">
                <div class="col-sm-10">
                  <input class="form-check-input" type="checkbox" name="violation_type[]" value="Selling of alcohol and alcoholic beverages/allowing entrance to underage/Monks/Students" />
                  <label class="form-check-label" for="inlineCheckbox6">6) Selling of alcohol and alcoholic beverages/allowing entrance to underage/Monks/Students</label>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-10">
                  <input class="form-check-input" type="checkbox" name="violation_type[]" value="Fronting/Leasing of License" />
                  <label class="form-check-label" for="inlineCheckbox7">7) Fronting/Leasing of License</label>
                </div>
              </div>
              
              <div class="form-group row">
                <div class="col-sm-10">
                  <input class="form-check-input" type="checkbox" name="violation_type[]" value="Selling alcohol to intoxicated person" />
                  <label class="form-check-label" for="inlineCheckbox8">8) Selling alcohol to intoxicated person</label>
                </div>
              </div> 
            </div> 
          </div>
        
          <div class="col-sm-12">
            <h4>Evidence Photos</h4>
          </div>
          <div class="custom-file">
            <input type="file" class="form-control" name="images[]"  placeholder="images" multiple>
          </div>
          <br>
          <br>
          <div class="container">
            <div class="row">
              <div class="col-md-9 mx-auto">
                <div class="container btn btn-center">
                  <button class="btn btn-success text-white" type="submit" style="font-family: Verdana, Geneva, Tahoma, sans-serif">Issue EIN</button>
                </div>
              </div>
            </div>
            <br><br>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<style>
  .form-container
	{
		text-align: left;
    padding-left: 2cm;
	} 
  .form-check-label
  {
    padding-left: 1cm;
  }
</style>
	@endsection