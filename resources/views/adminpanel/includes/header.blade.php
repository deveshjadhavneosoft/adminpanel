<nav class="navbar navbar-expand-lg navbar-light text-white bg-dark">
<i class="navbar-brand" style="text-decoration: none; color:white;" >Neosoft Technologies</i>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard"  style="text-decoration: none; color:white;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " style="text-decoration: none; color:white;" href="#">Welcome: {{$sid->email}}</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" style="text-decoration: none; color:white;" href="/adminpanel/logout">Logout</a>
      </li>    
    </ul>  
  </div>
</nav>