<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Register</title>
   

    </head>
  <body class="container">
      <h1 class="jumbotron">Rgistration panel</h1>

   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  
        <div>
            
               

                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif

                <form  method="post" action="{{url('/register')}}" enctype="multipart/form-data">
                @csrf()
                <div >
                 <!-- Email Address -->
                 <div class="form-group">
                        
                            <label>
                               Email
                            </label>
                        
                        <input class="form-control" id="email" type="email" name="email" placeholder="Email Address" >
                       
                    </div>
                    @if($errors->has('email'))
                        <label class="alert alert-danger">{{$errors->first('email')}}</label>
                        @endif

                    <!-- Password -->
                    <div class="form-group">
                       <label>Password</label>
                        <input class="form-control" id="password" type="password" name="password" placeholder="Password" >
                       
                    </div>
                    @if($errors->has('password'))
                        <label class="alert alert-danger">{{$errors->first('password')}}</label>
                        @endif

                   <!-- Username -->
                   <div class="form-group">
                      <label>Username</label>
                        <input class="form-control" id="uname" type="text" name="uname" placeholder="UserName">
                       
                    </div>
                    @if($errors->has('uname'))
                        <label class="alert alert-danger">{{$errors->first('uname')}}</label>
                        @endif

                    <!-- Name -->
                    <div class="form-group">
                       <label>Full Name</label>
                        <input class="form-control"  id="name" type="text" name="name" placeholder="Full Name" >
                       
                    </div>
                    @if($errors->has('name'))
                        <label class="alert alert-danger">{{$errors->first('name')}}</label>
                        @endif

                    <!-- Age -->
                    <div class="form-group">
                       <label for="age">Age</label>
                        <input class="form-control" id="age" type="text" name="age" placeholder="Age" >
                        
                    </div>
                    @if($errors->has('age'))
                        <label class="alert alert-danger">{{$errors->first('age')}}</label>
                        @endif

                     <!-- City -->
                     <div class="form-group">
                         <label>City</label>
                       
                        <input class="form-control" id="city" type="text" name="city" placeholder="City" >
                        
                    </div>
                    @if($errors->has('city'))
                        <label class="alert alert-danger">{{$errors->first('city')}}</label>
                        @endif

                   

                    <!-- Image -->
                    <div class="form-group">
                        <label for="image">Image</label>
                        
                        <input id="image" type="file" name="image" class="form-control bg-white   border-md">
                       
                       
                    </div>
                    @if($errors->has('image'))
                        <label class="alert alert-danger">{{$errors->first('image')}}</label>
                        @endif
                  
                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                    
                    <input class="btn btn-info btn-lg " type="submit" name="sub" value="Register">
                   
                    </div>

                  

                    <!-- Already Registered -->
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold">Already Registered? <a href="login" class="text-primary ml-2">Login</a></p>
                    </div>

                </div>
            </form>
        </div>
   


  </body>
</html>