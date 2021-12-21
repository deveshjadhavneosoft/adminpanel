@extends('adminpanel.master')
@section('content')

<h3 class="jumbotron">Add Products</h3>
      @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
<form  method="post" action="{{url('/postaddproducts')}}" enctype="multipart/form-data">
@csrf()

            
            <label class="form-label" for="category">Category</label>
            <div class="form-group">
                <select name="category" id="category">
                <option value="">Categories</option>
                @foreach($catdata as $cat)
                
                <option class="form-control  " value='{{$cat->id}}'>{{$cat->name}}</option>
               
                @endforeach
                </select>
               
            </div>
            @if($errors->has('category'))
            <label class="alert alert-danger">{{$errors->first('category')}}</label>
             @endif
            
            

            <div class="form-outline mb-4">
            <label class="form-label " for="pname">Product Name</label>
              <input type="text" class="form-control " name="pname" />
              
              
            </div>
            @if($errors->has('pname'))
            <label class="alert alert-danger">{{$errors->first('pname')}}</label>
             @endif
            

             <div class="form-outline mb-4">
             <label class="form-label" for="price">Price</label>
              <input type="text" class="form-control " name="price" />
              
             
            </div>
            @if($errors->has('price'))
            <label class="alert alert-danger">{{$errors->first('price')}}</label>
             @endif
            

             <div class="form-outline mb-4">
             <label class="form-label" for="quantity">Quantity</label>
            <input type="text" class="form-control" name="quantity" />
            
           
            </div>
            @if($errors->has('quantity'))
            <label class="alert alert-danger">{{$errors->first('quantity')}}</label>
            @endif
            

                <div class="form-outline mb-4">
                <label class="form-label " for="features">Features</label>
                <input type="text" class="form-control" name="features" />
               
               
                </div>
                @if($errors->has('features'))
                <label class="alert alert-danger">{{$errors->first('features')}}</label>
                @endif
               

             

            <div class="form-outline mb-4">
            <label class="form-label" for="image">Image</label>
              <input type="file" class="form-control " name="image"/>
           
            </div>
            @if($errors->has('image'))
            <label class="alert alert-danger">{{$errors->first('image')}}</label>
             @endif

           
            <div class="pt-1 mb-4">
              <input class="btn btn-info btn-lg " type="submit" name="sub" value="Submit">
            </div>

           

            
           

          </form>

@stop