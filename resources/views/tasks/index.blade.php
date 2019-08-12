<h1>TASKS</h1>

@foreach($tasks as $task)
	<h1>{{$task->subject}}</h1>
	<h2>{{$task->body}}</h2>	
@endforeach