<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">


<div class = "container">
	<div class="wrapper">
		<form action="{{url('/books/'.$book->id)}}" method="post" class="form-signin">       
			{{ csrf_field() }}
	<input type="hidden" name="_method" value="PATCH" required="" /><br>

		    <h3 class="form-signin-heading">Welcome edit a book</h3>
			  <hr class="colorgraph"><br>
			  
	<input type="text" class="form-control" name="name" placeholder="book-name" value="{{$book->name}}" required="" /><br>
		

	  <input type="text" class="form-control" name="author" placeholder="Author" value="{{$aname}}" required="" /><br>
	 

 <input type="text" class="form-control" name="section" placeholder="Section" value="{{$sname}}" required=""  /><br>
 
			  
 <input type="text" class="form-control" name="price" placeholder="Price" value="{{$book->price}}" required=""/> <br>  		  

			 
			  <button class="btn btn-lg btn-primary btn-block"  name="submit" type="Submit">Save</button>  			
		</form>			
	</div>
</div>