<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">


<div class = "container">
	<div class="wrapper">
		<form action="{{url('/loginaction')}}" method="POST" class="form-signin">
		{{ csrf_field() }}
		    <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
			  <hr class="colorgraph"><br>

		 <input type="text" class="form-control" name="email" placeholder="Email" ="" /><br>
		 @if($errors->has('email')) <p>{{$errors->first('email')}}</p>@endif

			<input type="password" class="form-control" name="password" placeholder="Password" =""/>
			@if($errors->has('password')) <p>{{$errors->first('password')}}</p>@endif

	  <button class="btn btn-lg btn-primary btn-block"  name="Submit" type="Submit">Login</button>
		</form>
		<a href='{!! url('/register'); !!}'>
	<button style="width:400px; margin-left:355px; margin-top:-50px;" class="btn btn-lg btn-primary btn-block">Sign Up</button></a>
	</div>
	@if (session()->has('message'))
		<p style="color:red;">{{session('message')}}</p>
	@endif
</div>
