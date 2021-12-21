@extends('adminpanel.master')
@section('content')
@php 
 $sid=session('sid');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <h3 class="text-primary"><i>Change Password</i></h3>

    @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif

    <form method="POST"  action="{{url('/changepass')}}" >
    @csrf()
                        <div class="form-outline mb-4">
                          <input type="password" id="old_password" class="form-control form-control-lg" name="old_password"/>
                          <label class="form-label text-primary" for="old_password">Old Password</label>
                          
                        </div>
                        @if($errors->has('old_password'))
            <label class="alert alert-danger">{{$errors->first('old_password')}}</label>
             @endif


                        <div class="form-outline mb-4">
                          <input type="password" id="password" class="form-control form-control-lg" name="password"/>
                          <label class="form-label text-primary" for="password">New Password</label>
                          
                        </div>
                        @if($errors->has('password'))
            <label class="alert alert-danger">{{$errors->first('password')}}</label>
             @endif

                        <div class="form-outline mb-4">
                          <input type="password" id="con_password" class="form-control form-control-lg" name="con_password"/>
                          <label class="form-label text-primary" for="con_password">Confirm Password</label>
                          
                        </div>
                        @if($errors->has('con_password'))
            <label class="alert alert-danger">{{$errors->first('con_password')}}</label>
             @endif

             <input type="hidden" value="{{$sid->email}}" name="id"/>

                        <div class="d-flex justify-content-center">
                          <input type="submit" class="btn btn-info  btn-lg gradient-custom-4 text-body" value="SUBMIT" name="sub"></input>
                          
                        </div>
    </form>
   
</body>
</html>
@stop