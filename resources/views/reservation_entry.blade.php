@extends('layouts.app')
@section('content')
<form action="">
	<div class="container">
		<div class="row">
			<div class="col-md-6">

				<div class="form-header">
					<h2>Make your reservation</h2>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<span class="form-label">Check In</span>
							<input class="form-control" type="date" required>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<span class="form-label">Check Out</span>
							<input class="form-control" type="date" required>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<span class="form-label">Room Name</span>
							<input class="form-control" type="text" disabled value="Room Name" required>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<span class="form-label">Room Price</span>
							<input class="form-control" disabled value="1000" type="text" required>
						</div>
					</div>
				</div>
				
			</div>

			<div class="col-md-6">
				<div class="for-header">
					<h2>Customer Information</h2>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<span class="form-label">First Name</span>
							<input class="form-control" type="text" required>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<span class="form-label">Last Name</span>
							<input class="form-control" type="text" required>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<span class="form-label">Email</span>
							<input class="form-control" type="text" required>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<div id="paypal-button"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection