<h1>USERS</h1>
@foreach($users as $user)
	<h1>{{$user->fullname}}</h1>
	<h2>{{$user->email}}</h2>	
@endforeach