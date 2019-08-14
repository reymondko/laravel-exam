
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
					<td class="showusers" id="{{$task->id}}">{{$task->subject}}</td>
					<td>{{$task->body}}</td>	
					<td><button class="btn btn-primary">Assign</button></td>
				</tr>
				@endforeach
		  </tbody>
		</table>
    </div>
</section>

<!-- Default bootstrap modal example -->
<div class="modal fade" id="UAL_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">User Assigned List</h4> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 	</div>
<script type="text/javascript">
$(document).ready(function(){
		$(".showusers").dblclick(function(){
			$.ajaxSetup({
					headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
			});
				var taskid=this.id;
		  	$.ajax({
					type: 'POST',
					url: "{{ url('assigneduser') }}",
					data:{ "taskid":taskid },
					success: function(data) {
						$("#UAL_modal .modal-body").html(data);
						$("#UAL_modal").modal("show");
					}
				});
		});
	});

</script>
@endsection
