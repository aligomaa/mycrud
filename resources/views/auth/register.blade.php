<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">


<div class = "container">
	<div class="wrapper">
		<form action="{{url('/registeraction')}}" method="POST" class="form-signin">       
			{{ csrf_field() }}
		    <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
			  <hr class="colorgraph"><br>
			  
		<input type="text" class="form-control" name="name" placeholder="name" required="" /><br>
		@if($errors->has('name')) <p>{{$errors->first('name')}}</p>@endif

	  <input type="text" class="form-control" name="phone" placeholder="phone" required="" /><br>
	  @if($errors->has('phone')) <p>{{$errors->first('phone')}}</p>@endif

 <input type="text" class="form-control" name="email" placeholder="email" required=""  /><br>
 @if($errors->has('email')) <p>{{$errors->first('email')}}</p>@endif
			  
 <input type="password" class="form-control" name="password" placeholder="Password" required=""/> <br>
 @if($errors->has('password')) <p>{{$errors->first('password')}}</p>@endif

 <input type="password" class="form-control" name="cpassword" placeholder=" Confirm Password" required=""/>     		  
@if($errors->has('cpassword')) <p>{{$errors->first('cpassword')}}</p>@endif
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="submit" type="Submit">Register</button>  			
		</form>			
	</div>
</div>