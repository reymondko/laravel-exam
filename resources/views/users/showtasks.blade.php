@extends('layouts.layout')

@section('content')

<!-- Services Section -->
<section id="ViewAllUsers" class="col-md-12">
    <div class="container">
    	<table class="table table-striped ">
		  <thead>
		    <tr>
		      <th scope="col">Subject</th>
		      <th scope="col">Body</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($assignedtasks as $task)
		  	<tr>
				<td>{{$task->subject}}</td>
				<td>{{$task->body}}</td>	
			</tr>
			@endforeach
		  </tbody>
		</table>
    </div>
</section>

@endsection