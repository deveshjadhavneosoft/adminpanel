@extends('adminpanel.master')
@section('content')
@php 
 $sid=session('sid');
@endphp
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Edit</title>
    <style>
        /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/


.border-md {
    border-width: 2px;
}

.btn-facebook {
    background: #405D9D;
    border: none;
}

.btn-facebook:hover, .btn-facebook:focus {
    background: #314879;
}

.btn-twitter {
    background: #42AEEC;
    border: none;
}

.btn-twitter:hover, .btn-twitter:focus {
    background: #1799e4;
}



/*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/

body {
    min-height: 100vh;
}

.form-control:not(select) {
    padding: 1.5rem 0.5rem;
}

select.form-control {
    height: 52px;
    padding-left: 0.5rem;
}

.form-control::placeholder {
    color: #ccc;
    font-weight: bold;
    font-size: 0.9rem;
}
.form-control:focus {
    box-shadow: none;
} 

    </style>

    </head>
  <body>

   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
    <h3 class="text-primary"><i>Edit</i></h3>

<div class="container-fluid">
    <div class="row py-5 mt-4 align-items-center">
       
        <div class="col-md-12 col-lg-12 ">
            
               

                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif

                <form  method="post" action="{{url('/update')}}" enctype="multipart/form-data">
                @csrf()
                <div class="row">
                 <!-- Email Address -->
                 <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="email" type="email" name="email" value="{{$sid->email}}" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                       
                    </div>
                    @if($errors->has('email'))
                        <label class="alert alert-danger">{{$errors->first('email')}}</label>
                        @endif

                    

                   <!-- Username -->
                   <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="uname" type="text" name="uname" value="{{$sid->uname}}" placeholder="UserName" class="form-control bg-white border-left-0 border-md">
                       
                    </div>
                    @if($errors->has('uname'))
                        <label class="alert alert-danger">{{$errors->first('uname')}}</label>
                        @endif

                    <!-- Name -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="name" type="text" name="name" value="{{$sid->name}}" placeholder="Full Name" class="form-control bg-white border-left-0 border-md">
                       
                    </div>
                    @if($errors->has('name'))
                        <label class="alert alert-danger">{{$errors->first('name')}}</label>
                        @endif

                    <!-- Age -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="age" type="text" name="age" value="{{$sid->age}}" placeholder="Age" class="form-control bg-white border-left-0 border-md">
                        
                    </div>
                    @if($errors->has('age'))
                        <label class="alert alert-danger">{{$errors->first('age')}}</label>
                        @endif

                     <!-- City -->
                     <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="city" type="text" name="city" value="{{$sid->city}}" placeholder="City" class="form-control bg-white border-left-0 border-md">
                        
                    </div>
                    @if($errors->has('city'))
                        <label class="alert alert-danger">{{$errors->first('city')}}</label>
                        @endif

                   
                        <input type="hidden" value="{{$sid->email}}" name="id"/>
                    
                  
                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                    
                    <input class="btn btn-info btn-lg " type="submit" name="sub" value="Update">
                   
                    </div>

                   

                </div>
            </form>
        </div>
    </div>
</div>


  </body>
</html>

@stop