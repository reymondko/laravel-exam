@extends('layouts.layout')

@section('content')

<!-- Services Section -->
<section id="ViewAllUsers" class="col-md-12">
    <div class="container">
    	<table class="table table-striped ">
        <thead>
		    <tr>
                <th>Assign</th>
		        <th scope="col">Full Name</th>
		        <th scope="col">Email</th>
		    </tr>
		    </thead>
		    <tbody>
		  	@foreach($users as $user)
				<tr id="{{$user->id}}">
                    <td><input type="checkbox"  id="{{$user->id}}_{{$user->aid}}" class="AssignThisUser"
                        @if ($user->tid!="")
                            checked="checked"
                        @endif
                    /></td>
					<td>{{$user->fullname}}</td>
					<td>{{$user->email}}</td>	
				</tr>
            @endforeach
		    </tbody>
		</table>
    </div>
</section>
<input type="hidden" value="{{$users[0]->TaskID}}" id="TaskID" />

<script type="text/javascript">
$(document).ready(function(){
    $(".AssignThisUser").on("click",function(){
        $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        var ids = this.id;
        var ids = ids.split("_");
        var user_id = ids[0];
        var atask_id = ids[1];
        var task_id = $("#TaskID").val();
        if($(this). prop("checked") == true){
            assigntask(user_id,task_id);
        }
        else{
            deleteTask(atask_id);
        }
    });
});
function deleteTask(id){
    $.ajax({
        type: 'POST',
        url: "{{ url('deleteAssignedUser') }}",
        data:{ "atask":id },
        success: function(data) {
            console.log(data);
        }
    });
}

function assigntask(user_id,task_id){
    $.ajax({
        type: 'POST',
        url: "{{ url('assignUser') }}",
        data:{ "user_id":user_id,"task_id":task_id },
        success: function(data) {
            console.log(data);
        }
    });
}
</script>
@endsection