@extends('front.layouts.master1') 
@section('content')

<?php
    $lno=$_REQUEST['license_no'];
    $con=mysqli_connect("localhost","root","db2");
    if($lno!=="")
    {
        $query = mysqli_query($con,"SELECT * FROM 'bins' WHERE license_no='$lno'");
        $row = mysqli_fetch_array($query);
        $lname = $row["license_name"];
        $cid = $row["cid"];
    }

    $result = array("$lname","$cid");
    $myJSON = json_encode($result);
    echo $myJSON;



?>
@endsection