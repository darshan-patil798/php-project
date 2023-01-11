<?php 
// use App\Http\Controllers\ProductController;
// $total=0;
// if(Session::has('user'))
// {
//   $total= ProductController::cartItem();
// }

?>
<nav class="py-4" style="border:1px solid black;display:flex;justify-content:space-between;align-items:center">
  <a class="navbar-brand" href="/">Note Keeper
  @if(Session::has('user'))
  ({{Session::get('user')['name']}})
  @endif
  </a>
  @if(Session::has('user'))
  <a href="/logout" class="btn float-right">Logout</a>
  @else
  <a href="/register" class="btn float-right">Register</a>
  @endif
</nav>