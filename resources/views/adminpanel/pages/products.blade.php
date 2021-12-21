@extends('adminpanel.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".delcat").click(function(e){
          var cid=$(this).attr("cid");
          alert(cid);
          $.ajax({
              url:"{{url('adminpanel/deleteproducts')}}",
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
<h1 class="jumbotron">Products</h1>
<table class="table" id="mytable">
    <thead>
      <tr>
          <th colspan="7" class="text-center">
              <a href="/adminpanel/addproducts" class="btn btn-primary">Add Products</a>
          </th>
      </tr>
      <tr>
          <th>S.no</th>
          <th>Product Name</th>
          <th> Price </th>
          <th> Quantity </th>
          <th> Features </th>
          <th> Image </th>
          <th> Actions </th>
      </tr>
      </thead>
      <tbody>
      @php 
       $sn=1;
      @endphp
      @foreach($proddata as $prod)
        <tr>
            <td>{{$sn}}</td>
            <td>{{$prod->pname}}</td>
            <td>{{$prod->price}}</td>
            <td>{{$prod->quantity}}</td>
            <td>{{$prod->features}}</td>
            <td>
            <img src="{{asset('/Uploads/'.$prod->image)}}" width=50 height=50/>
            </td>
            <td><a href="/adminpanel/editproducts/{{$prod->id}}" class="btn btn-info">Edit</a>
                <a href="javascript:void(0)" cid="{{$prod->id}}" class="btn btn-danger delcat">Delete</a></td>
        </tr>
        @php 
       $sn++;
      @endphp
      @endforeach
      </tbody>
  </table>
  @stop