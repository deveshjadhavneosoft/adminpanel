@php 
 $sid=session('sid');
@endphp
@if(empty($sid))
  <script>
      location.href="{{url('/adminpanel/login')}}";
  </script>
@endif 

<!DOCTYPE html>
<html lang="en">
<head>
   @include('adminpanel.includes.head')
</head>
<body >
    <main>
        @include('adminpanel.includes.header')
        <section class="container row ">
            <div class="col-sm-4">
                @include('adminpanel.includes.sidebar')
            </div>
            <div class="col-sm-8">
                @yield('content')
            </div>
        </section>
    </main>
   
</body>
</html>