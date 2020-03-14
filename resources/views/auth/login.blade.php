@extends('layouts.login_app')
@section('content')
@if(Session::has('password_email_invalid'))
   <p style="color:red">{{ Session::get('password_email_invalid') }}!</p>
@endif
<form action="{{ route('login') }}" method="post" name="login">
@csrf
   <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
   </div>
   <div class="form-group">
      <label for="exampleInputEmail1">Password</label>
      <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
   </div>
   
   <div class="col-md-12 text-center ">
      <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
   </div>
   
   
   <div class="form-group">
      <p class="text-center">Don't have account? <a href="/authentication/register" id="signup">Sign up here</a></p>
   </div>
</form>
@endsection