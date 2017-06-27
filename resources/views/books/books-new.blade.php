

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">


<div class = "container">
	<div class="wrapper">
		<form action="{{url('/books')}}" method="POST" class="form-signin">       
			{{ csrf_field() }}
		    <h3 class="form-signin-heading">Welcome add new book</h3>
			  <hr class="colorgraph"><br>
			  
		<input type="text" class="form-control" name="name" placeholder="book-name" required="" /><br>
		


	  <input type="text" class="form-control" name="author" placeholder="Author" required="" /><br>
	 

 <input type="text" class="form-control" name="section" placeholder="Section" required=""  /><br>
 
			  
 <input type="text" class="form-control" name="price" placeholder="Price" required=""/> <br>  		  

			 
			  <button class="btn btn-lg btn-primary btn-block"  name="submit" type="Submit">ADD</button>  			
		</form>			
	</div>
</div>