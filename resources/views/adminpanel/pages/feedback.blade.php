@extends('adminpanel.master')
@section('content')

<h3 class="text-primary"><i>Feedback</i></h3>
      @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
<form  method="post" action="{{url('/feedback')}}" >
@csrf()
           

            <div class="form-outline mb-4">
           
              <input type="text" class="form-control form-control-lg " name="subject" />
              <label class="form-label text-primary" for="subject">Subject</label>
           
            </div>
            @if($errors->has('subject'))
            <label class="alert alert-danger">{{$errors->first('subject')}}</label>
             @endif

            <div class="form-outline mb-4">
           
              <textarea class="form-control form-control-lg" name="message"></textarea>
              <label class="form-label text-primary" for="message">Message</label>
             
            </div>
            @if($errors->has('message'))
            <label class="alert alert-danger">{{$errors->first('message')}}</label>
             @endif

            <!-- <div class="form-outline mb-4">
            <label class="form-label" for="file">Image</label>
              <input type="file" class="form-control form-control-lg" name="file[]"  multiple />
            @if($errors->has('file'))
            <label class="alert alert-danger">{{$errors->first('file')}}</label>
             @endif
            </div> -->

           
            <div class="pt-1 mb-4">
              <input class="btn btn-info btn-lg " type="submit" name="sub" value="Submit">
            </div>

           

            
           

          </form>

@stop