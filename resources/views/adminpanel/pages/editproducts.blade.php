@extends('adminpanel.master')
@section('content')

<h3 class="text-primary"><i>Edit Products</i></h3>
      @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
<form  method="post" action="{{url('/updateproducts')}}" enctype="multipart/form-data">
@csrf()

            
            <label class="form-label text-primary" for="category">Category</label>
            <div class="form-outline mb-4">
                <select name="category" id="category">
                <option value="">Categories</option>
                @foreach($catdata as $cat)
                
                <option class="form-control form-control-lg " value='{{$cat->id}}'>{{$cat->name}}</option>
               
                @endforeach
                </select>
               
            </div>
            @if($errors->has('category'))
            <label class="alert alert-danger">{{$errors->first('category')}}</label>
             @endif
            
            

            <div class="form-outline mb-4">
           
              <input type="text" class="form-control form-control-lg " value="{{$proddata->pname}}" name="pname" />
              <label class="form-label text-primary"  for="pname">Product Name</label>
              
            </div>
            @if($errors->has('pname'))
            <label class="alert alert-danger">{{$errors->first('pname')}}</label>
             @endif
            

             <div class="form-outline mb-4">
           
              <input type="text" class="form-control form-control-lg " value="{{$proddata->price}}" name="price" />
              <label class="form-label text-primary" for="price">Price</label>
             
            </div>
            @if($errors->has('price'))
            <label class="alert alert-danger">{{$errors->first('price')}}</label>
             @endif
            

             <div class="form-outline mb-4">
           
            <input type="text" class="form-control form-control-lg " value="{{$proddata->quantity}}" name="quantity" />
            <label class="form-label text-primary" for="quantity">Quantity</label>
           
            </div>
            @if($errors->has('quantity'))
            <label class="alert alert-danger">{{$errors->first('quantity')}}</label>
            @endif
            

                <div class="form-outline mb-4">
            
                <input type="text" class="form-control form-control-lg " value="{{$proddata->features}}" name="features" />
                <label class="form-label text-primary" for="features">Features</label>
               
                </div>
                @if($errors->has('features'))
                <label class="alert alert-danger">{{$errors->first('features')}}</label>
                @endif
               

             

            <div class="form-outline mb-4">
            <label class="form-label text-primary" for="image">Image</label>
              <input type="file" class="form-control form-control-lg" name="image"/>
           
            </div>
            @if($errors->has('image'))
            <label class="alert alert-danger">{{$errors->first('image')}}</label>
             @endif
             <input type="hidden" value="{{$proddata->id}}" name="prodid"/>
           
            <div class="pt-1 mb-4">
              <input class="btn btn-info btn-lg " type="submit" name="sub" value="Submit">
            </div>

           

            
           

          </form>

@stop