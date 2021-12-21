@extends('adminpanel.master')
@section('content')
@php 
 $sid=session('sid');
@endphp

<h3 class="text-primary"><i>Change Image</i></h3>

    @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif

    <form method="POST"  action="{{url('/changeimage')}}" enctype="multipart/form-data">
    @csrf()
                        <div class="form-outline mb-4">
                          <input type="file" id="image" class="form-control form-control-lg" name="image"/>
                          <label class="form-label text-primary" for="image">Change Image</label>
                          
                        </div>
                        @if($errors->has('image'))
            <label class="alert alert-danger">{{$errors->first('image')}}</label>
             @endif


                        
             <input type="hidden" value="{{$sid->email}}" name="id"/>

                        <div class="d-flex justify-content-center">
                          <input type="submit" class="btn btn-info  btn-lg gradient-custom-4 text-body" value="Upload" name="sub"></input>
                          
                        </div>
    </form>
@stop