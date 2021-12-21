@extends('adminpanel.master')
@section('content')

<h3 class="text-primary"><i>Add Category</i></h3>
      @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
<form  method="post" action="{{url('/postaddcategory')}}" enctype="multipart/form-data">
@csrf()
           

            <div class="form-group">
            <label class="form-label " for="name">Name</label>
              <input type="text" class="form-control " name="name" />
              
           
            </div>
            @if($errors->has('name'))
            <label class="alert alert-danger">{{$errors->first('name')}}</label>
             @endif

             <div class="form-group">
             <label class="form-label" for="description">Description</label>
                <input type="text" class="form-control " name="description" />
                
                
            </div>
                @if($errors->has('description'))
                <label class="alert alert-danger">{{$errors->first('description')}}</label>
                @endif

            <div class="form-group">
            <label class="form-label" for="image">Image</label>
              <input type="file" class="form-control" name="image"/>
            @if($errors->has('image'))
            <label class="alert alert-danger">{{$errors->first('image')}}</label>
             @endif
            </div>

           
            <div class="pt-1 mb-4">
              <input class="btn btn-info btn-lg " type="submit" name="sub" value="Submit">
            </div>

           

            
           

          </form>

@stop