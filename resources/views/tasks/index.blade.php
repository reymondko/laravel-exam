
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
					<td><button class="btn btn-primary assign_user" id="{{$task->id}}" alt="{{$task->subject}}">Assign</button></td>
					<td><button class="btn btn-primary TaskUploadfile" id="{{$task->id}}" alt="{{$task->subject}}">Upload File</button></td>
				</tr>
				@endforeach
		  </tbody>
		</table>
    </div>
</section>


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
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade col-md-12" id="Assign_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" >
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel"> Assign User For task (<span class="TaskSubj"> </span>)</h4> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade col-md-12" id="UploadFile_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" >
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel"> Assign User For task (<span class="TaskSubjupload"> </span>)</h4> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form enctype="multipart/form-data" id="upload_form" role="form" method="POST" action="" >
						<div class="form-group">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<input type="hidden" id="task_id" >
					      	<div class="form-group">
				        		<label for="catagry_name">File:</label>
						        <input type="file" name="fileupload" class="form-control" id="fileupload_id">
						    </div>
					    </div>
				    </form>
				</div>
				<div class="modal-footer">
					<button type="button" lass="btn btn-primary" class="uploadbutton">Upload</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

		$(".assign_user").click(function(){
			console.log("test "+this.id);
			var tasktitle=$(this).attr("alt");
			var taskid=this.id;
			$(".TaskSubj").html(tasktitle);
			//$("#Assign_modal").modal("show");
			$.ajaxSetup({
					headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
			});
			$.ajax({
					type: 'POST',
					url: "{{ url('assignusers') }}",
					data:{ "taskid":taskid },
					success: function(data) {
						$("#Assign_modal .modal-body").html(data);
						$("#Assign_modal").modal("show");
					}
			});
		});

		$(".TaskUploadfile").click(function(){
			var tasktitle=$(this).attr("alt");
			var taskid=this.id;
			$(".TaskSubjupload").html(tasktitle);
			$("#UploadFile_modal").modal("show");
		});

		$(".uploadbutton").click(function(){
			$.ajax({
				url:'uploadFile',
				data:{
	        		ufile:new FormData($("#upload_form")[0]),
				},
				dataType:'json',
				async:false,
				type:'post',
				processData: false,
				contentType: false,
				success:function(response){
					console.log(response);
		      },
		    })
		});
	});

</script>
@endsection
