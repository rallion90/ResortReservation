@extends('layouts.register_app')
@section('content')
<form action="{{ route('registration') }}" method="post" name="registration">
@csrf	
	<div class="form-group">
		<label for="exampleInputEmail1">Fullname</label>
		<input type="text"  name="fullname" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Enter Firstname">
	</div>
	
	<div class="form-group">
		<label for="exampleInputEmail1">Email Address</label>
		<input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Password</label>
		<input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Repeat Password</label>
		<input type="password" name="repeat_password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
	</div>
	<div class="col-md-12 text-center mb-3">
		<button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Register to Reserve</button>
	</div>
	<div class="col-md-12 ">
		<div class="form-group">
			<p class="text-center"><a href="/authentication/login" id="signin">Already have an account?</a></p>
		</div>
	</div>
</div>
</form>
@endsection