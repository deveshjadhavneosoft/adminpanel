@extends('adminpanel.master')
@section('content')

<h3 class="jumbotron">Edit Category</h3>
      @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
<form  method="post" action="{{url('/updatecategory')}}" enctype="multipart/form-data">
@csrf()
           

            <div class="form-outline mb-4">
           
              <input type="text" class="form-control form-control-lg " name="name" value="{{$catdata->name}}"/>
              <label class="form-label text-primary" for="name">Name</label>
           
            </div>
            @if($errors->has('name'))
            <label class="alert alert-danger">{{$errors->first('name')}}</label>
             @endif

             <div class="form-outline mb-4">
           
                <input type="text" class="form-control form-control-lg " name="description" value="{{$catdata->description}}" />
                <label class="form-label text-primary" for="description">Description</label>
                
            </div>
                @if($errors->has('description'))
                <label class="alert alert-danger">{{$errors->first('description')}}</label>
                @endif

            <div class="form-outline mb-4">
            <label class="form-label" for="image">Image</label>
              <input type="file" class="form-control form-control-lg" name="image"/>
            @if($errors->has('image'))
            <label class="alert alert-danger">{{$errors->first('image')}}</label>
             @endif
            </div>
            <input type="hidden" value="{{$catdata->id}}" name="catid"/>
           
            <div class="pt-1 mb-4">
              <input class="btn btn-info btn-lg " type="submit" name="sub" value="Submit">
            </div>

           

            
           

          </form>

@stop