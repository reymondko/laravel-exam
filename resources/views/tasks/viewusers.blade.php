@extends('layouts.layout')

@section('content')

<!-- Services Section -->
<section id="ViewAllUsers" class="col-md-12">
    <div class="container">
    	<table class="table table-striped ">
        <thead>
		    <tr>
		      <th scope="col">Full Name</th>
		      <th scope="col">Email</th>
		    </tr>
		    </thead>
		    <tbody>
		  	@foreach($assignedusers as $user)
				<tr id="{{$user->id}}">
					<td>{{$user->fullname}}</td>
					<td>{{$user->email}}</td>	
				</tr>
            @endforeach
		    </tbody>
		</table>
    </div>
</section>

@endsection