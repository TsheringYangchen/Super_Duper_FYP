@extends('front.layouts.master')
@section('content')
<br>
<div class="container justify-content-center">
<br><br>
      <table class="table table-bordered table-sm mytable-marg w-75" style="height: 100px">
      <thead class="table-dark text-center">
        <tr>
          <th>License No</th>
          <th>Name</th>
          <th>CID No</th>
          <th>Phone No</th>
          <th>License Type</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($status as $coding)
        <tr>
          <td>{{ $coding->license_no }}</td>
          <td>{{$coding->license_name }}</td>
          <td>{{ $coding->cid }}</td>
          <td>{{ $coding->phone }}</td>
          <td>{{ $coding->license_type }}</td>
          <td>
            <div style="text-align: center;">
                @if($coding->status == 0)
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-circle-fill" viewBox="0 0 16 16">
                  <circle cx="8" cy="8" r="8"/>
                </svg>
                @elseif($coding->status == 1)
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-circle-fill" viewBox="0 0 16 16">
                <circle cx="8" cy="8" r="8"/>
              </svg>
              @elseif($coding->status == 2)
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="yellow" class="bi bi-circle-fill" viewBox="0 0 16 16">
                <circle cx="8" cy="8" r="8"/>
              </svg>
              @elseif($coding->status == 3)
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-circle-fill" viewBox="0 0 16 16">
                <circle cx="8" cy="8" r="8"/>
              </svg>
              @endif
          </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  <br><br>
    <div class="text-center">
		  <button type="button" class="btn w-50" data-toggle="collapse" data-target="#rules">RULES AND REGULATION</button>
	 </div>
	 <div id="rules" class="collapse text-center"><br>
    <table class="table table-bordered table-sm">
      <thead style="background-color: #b2bec3; color: #0a3d62">
        <tr class="text-center">
          <th style="width:30%">Nature of Offence</th>
          <th style="width:10%">Fine</th>
          <th style="width:60%">Remarks</th>
        </tr>
      </thead>
      <tbody>
        <tr style="text-align: center">
          <td>Dry Day Violation</td>
          <td>1000</td>
          <td>Selling of alcohols on Tuesday</td>
        </tr>
        <tr style="text-align: center">
          <td>Selling of alcohol and alcoholic beverages before 1PM</td>
          <td>500</td>
          <td>Selling of alcohols before time</td>
        </tr>
        <tr style="text-align: center">
          <td>Dry Day Violation</td>
          <td>3000</td>
          <td>Selling of alcohols on Tuesday</td>
        </tr>
        <tr style="text-align: center">
          <td> Selling of alcohol and alcoholic beverages after 10PM</td>
          <td>900</td>
          <td>Selling of alcohols after given time</td>
        </tr>
      </tbody> 
  </table>  
	 </div><br>
   <div class="text-center">
    <button type="button" class="btn w-50" data-toggle="collapse" data-target="#represent">COLOR CODING</button>
  </div>
  <div id="represent" class="collapse text-center"><br>
    <p style="color: blue"><b>Blue</b> =&nbsp;&nbsp;Default license color</p>
    <p style="color: green"><b>Green</b>=&nbsp;&nbsp;First Violation</p>
    <p style="color: Orange"><b>Yellow</b>= &nbsp;&nbsp;Second Violation</p>
    <p style="color: red"><b>Red</b> =&nbsp;&nbsp;Third Violation</p>
  </div><br>
</div>   
<style>
  .mytable-marg
  {
  	margin:0 auto;
  }
</style>
@endsection


