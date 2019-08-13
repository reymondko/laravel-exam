@extends('layouts.main')

@section('content')

<!-- Services Section -->
<section id="ViewAllUsers" class="col-md-12">
    <div class="container">
    	<table class="table table-striped table-hover" id="UsersTable">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Full Name</th>
		      <th scope="col">Email</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($users as $user)
		  	<tr id="{{$user->id}}">
		  		<th scope="row">{{$user->id}}</th>
				<td>{{$user->fullname}}</td>
				<td>{{$user->email}}</td>	
			</tr>
			@endforeach
		  </tbody>
		</table>
		<div class="embed-responsive embed-responsive-21by9" id="frameholder">
		  <iframe id="taskListContainer" class="embed-responsive-item" src="..."></iframe>
		</div>
    </div>
</section>

<Script>
	document.getElementById("frameholder").style.display = "none";
	document.querySelectorAll('#UsersTable tr').forEach(e => e.addEventListener("dblclick", function() {
		
    	console.log("clicked "+this.id); 
    	document.getElementById('taskListContainer').src = "tasklist/"+this.id;
   
    	document.getElementById("frameholder").style.display = "block";
	}));	
</Script>
@endsection