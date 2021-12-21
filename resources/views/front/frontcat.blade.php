<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
@include('front.includes.head')
</head>
<body>
@include('front.includes.header')


@foreach ($data as $item)
<div class="">
    <div class=" col-md-4" >
  <div class="card" style="width: 18rem;">
      <img class="card-img-top" src='{{asset("Uploads/$item->image")}}' alt="Card image cap" width="250" height="250">
      <div class="card-body">
        <h5 class="card-title">{{$item->pname}}</h5>
        <h5 class="card-title">Price:-{{$item->price}}</h5>
        <p class="card-text">{{$item->features}}</p>
        <a href="#" class="btn btn-primary">add to cart</a>
    
      </div>
    </div>
    </div>
</div>
  @endforeach



    
    @include('front.includes.foot')
</body>   
</html>