@extends('adminpanel.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".delcat").click(function(e){
          var cid=$(this).attr("cid");
          alert(cid);
          $.ajax({
              url:"{{url('adminpanel/deletecategory')}}",
              method:'delete',
              data:{_token:'{{csrf_token()}}',cid:cid},
              success:function(response){
                console.log(response)
                $("#mytable").load(location.href + " #mytable");
              }
          })
        })
    })
</script>
<h1 class="jumbotron"> Category </h1>
  <table class="table" id="mytable">
      <tr>
          <th colspan="5" class="text-center">
              <a href="/adminpanel/addcategory" class="btn btn-primary">Add Category</a>
          </th>
      </tr>
      <tr>
          <th>S.no</th>
          <th>Name</th>
          <th> Description </th>
          <th> Image </th>
          <th> Actions </th>
      </tr>
      @php 
       $sn=1;
      @endphp
      @foreach($catdata as $cat)
        <tr>
            <td>{{$sn}}</td>
            <td>{{$cat->name}}</td>
            <td>{{$cat->description}}</td>
            <td>
            <img src="{{asset('/Uploads/'.$cat->image)}}" width=50 height=50/>
            </td>
            <td><a href="/adminpanel/editcategory/{{$cat->id}}" class="btn btn-info">Edit</a>
                <a href="javascript:void(0)" cid="{{$cat->id}}" class="btn btn-danger delcat">Delete</a></td>
        </tr>
        @php 
       $sn++;
      @endphp
      @endforeach
  </table>
  @stop