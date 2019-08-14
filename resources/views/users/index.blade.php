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
						<td>
							<select class="UserType" id="{{$user->id}}">
								<option value="1" 
								@if ($user->usertype==1)
									selected="selected"
								@endif
								>Employee</option>
								<option value="2" 
								@if ($user->usertype==2)
									selected="selected"
								@endif
								>Subcontractors</option>
								<option value="3" 
								@if ($user->usertype==3)
									selected="selected"
								@endif
								>Clients</option>
							</select>
							
						</td>	
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="embed-responsive embed-responsive-21by9" id="frameholder">
				<iframe id="taskListContainer" class="embed-responsive-item" src="" style="display:hidden"></iframe>
			</div>
    </div>
</section>
<script type="text/javascript">
$(document).ready(function(){
		$(".UserType").on('change',function(){
			$.ajaxSetup({
					headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
			});
				var typeID=$(this).val();
				var userid=this.id;
				console.log(typeID+" == "+userid)
			
		  	$.ajax({
					type: 'POST',
					url: "{{ url('updateusertype') }}",
					data:{ "userid":userid,"typeID":typeID, },
					success: function(data) {
					console.log(data);
					}
				});
		});
	});
</script>
@endsection