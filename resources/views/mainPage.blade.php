<html>
<head>
  <title> home page  </title>
 <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>

<h1 align="center"> Maktabaty  </h1>


<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  
  <a href='{!! url('books-new'); !!}'> <button class="btn btn-primary">
            <span class="glyphicon glyphicon-remove"></span>
                 ADD NEW BOOK
               
          </button></a>
   <span style="margin-left:71%; color:black;">
             Welcome ,     @if(Auth::check())
                  {{Auth::getUser()->name}}
                      @endif

                 </span>

                 <a href='{!! url('/logout'); !!}'> <button class="btn btn-primary">
            <span class="glyphicon glyphicon-remove"></span>
                Logout
               
          </button></a>
</nav>


  <table class="table table-bordered table-inverse">
 <thead>
    <tr>
      <th>ID</th>
      <th>book Name</th>
      <th>Author</th>
      <th>Section</th>
      <th>Price</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
      @foreach($books as $book)
    <tr>
      <td>{{$book->id}}</td>
      <td>{{$book->name}}</td>
      <td>{{$book->aname}}</td>
      <td>{{$book->sname}}</td>
      <td>{{$book->price}}</td>
      <td>  

 {{Form::open(['url'=>'books/'.$book->id.'/edit' , 'method'=>'get'])}}
          <button class="btn btn-success">
           Edit
          </button>
          {{Form::close()}}     
</td>
<td>
         {{Form::open(['url'=>'books/'.$book->id,'method'=>'delete'])}}
          <button class="btn btn-danger">
         
            Delete
          </button>
          {{Form::close()}}
        </td>
    </tr>
   @endforeach
  </tbody>
</table>


</body>
</html>