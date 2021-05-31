@extends('front.layouts.master3') 
@section('content')

<div class="container border text-center mt-2" style="background-color: #CAD3C8">
	<h3>BAR INFRINGEMENT NOTICE (BIN)</h3>
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
          </ul>
        </div>
        @endif

        <form method="post" action="/getbin" enctype="multipart/form-data">
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
                  <input class="form-check-input" type="checkbox" name="violation_type[]" value="Selling of alcohol and alcoholic beverages before 1PM" />
                  <label class="form-check-label" for="inlineCheckbox2">2) Selling of alcohol and alcoholic beverages before 1PM</label>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-10">
                  <input class="form-check-input" type="checkbox" name="violation_type[]" value="Selling of alcohol and alcoholic beverages after 10PM" />
                  <label class="form-check-label" for="inlineCheckbox3">3) Selling of alcohol and alcoholic beverages after 10PM</label>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-10">
                  <input class="form-check-input" type="checkbox" name="violation_type[]" value="Selling of alcohol and alcoholic beverages to underage/monks/students" />
                  <label class="form-check-label" for="inlineCheckbox4">4) Selling of alcohol and alcoholic beverages to underage/monks/students</label>
                </div>
              </div>
            
              <div class="form-group row">
                <div class="col-sm-10">
                  <input class="form-check-input" type="checkbox" name="violation_type[]" value="Fronting/Leasing of License" />
                  <label class="form-check-label" for="inlineCheckbox5">5) Fronting/Leasing of License</label>
                </div>
              </div> 

              <div class="form-group row">
                <div class="col-sm-10">
                  <input class="form-check-input" type="checkbox" name="violation_type[]" value="Selling of alcohol and alcoholic beverages to underage/monks/students" />
                  <label class="form-check-label" for="inlineCheckbox6">6) Selling of alcohol and alcoholic beverages to underage/monks/students</label>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-10">
                  <input class="form-check-input" type="checkbox" name="violation_type[]" value="Illegal sale of alcohol and alcoholic beverages" />
                  <label class="form-check-label" for="inlineCheckbox7">7) Illegal sale of alcohol and alcoholic beverages</label>
                </div>
              </div>
            
              <div class="form-group row">
                <div class="col-sm-10">
                  <input class="form-check-input" type="checkbox" name="violation_type[]" value="Not sepearate bar from other business including grocessary shop except in hotel and resturant" />
                  <label class="form-check-label" for="inlineCheckbox8">8) Not sepearate bar from other business including grocessary shop except in hotel and resturant</label>
                </div>
              </div>
            </div> 
          </div>

          <div class="col-sm-12">
            <h4>Evidences</h4>
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
                  <button class="btn btn-success text-white" type="submit" style="font-family: Verdana, Geneva, Tahoma, sans-serif">Issue BIN</button>
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