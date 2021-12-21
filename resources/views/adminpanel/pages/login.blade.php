<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Log In</title>
   
      
        
    
  </head>
  <body class="container"> 
      <h1 class="jumbotron">Login Panel</h1>        
       <div>   
                   

                    @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger">{{Session::get('error')}}</div>
                    @endif

                    <form  method="post" action="{{url('/login')}}" enctype="multipart/form-data">
                    @csrf()
                    <div class="form-group"> <label for="exampleInputEmail1">
                            Email Address
                        </label> <input  type="text" class="form-control" name="email" placeholder="Enter a valid email address">
                        @if($errors->has('email'))
                        <label class="alert alert-danger">{{$errors->first('email')}}</label>
                        @endif
                        </div>
                    <div class="form-group"> <label for="exampleInputPassword1">
                            Password
                        </label> <input class="form-control" type="password" name="password" placeholder="Enter password">
                        @if($errors->has('password'))
                        <label class="alert alert-danger">{{$errors->first('password')}}</label>
                        @endif
                        </div>
                    <div> <input type="submit" class="btn btn-primary text-center" value="Log In"></input> 
                      <a class="btn btn-warning  " href="register">Register</a> </div>
                    </form>
                   
          
           
       </div>
     
      
    
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>