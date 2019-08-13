
@extends('layouts.main')
@section('fullname')
@endsection
@section('content')

<!-- Services Section -->
<section id="ViewAllUsers" class="col-md-12">
    <div class="container">
    	<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Subject</th>
		      <th scope="col">Body</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($tasks as $task)
		  	<tr>
		  		<th scope="row">{{$task->id}}</th>
				<td>{{$task->subject}}</td>
				<td>{{$task->body}}</td>	
			</tr>
			@endforeach
		  </tbody>
		</table>
    </div>
</section>

@endsection