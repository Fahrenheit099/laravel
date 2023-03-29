@extends('todolist.layout')

@section('content')
<h1 class="d-flex justify-content-center">ToDo List</h1>
<div class="p-3 border bg-light">
	<div class="row gy-5 d-flex justify-content-center">
		<div class="col-xl-10">
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <strong>Oops!</strong> Your Input Can't Be success.<br><br>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		@if (Session::has('success'))
			<div class="alert alert-info">
				<strong>{{ Session::get('success') }}</strong>
			</div>
		@endif
		</div>
	</div>
	<div class="row gy-5 d-flex justify-content-center">
	    <div class="col-xl-10 margin-tb">
	        <div class="pull-left">
	            <h2>Add New Task</h2>
	        </div>
	    </div>
	</div>
	<div class="row gy-5 d-flex justify-content-center">
		<div class="col-xl-10">
			<form action="{{ route('todolist.store') }}" method="post">
			    @csrf
		        <div class="mb-3">
					<label for="task" class="form-label">New Task:</label>
					<input type="text" name="task" class="form-control" id="task" aria-describedby="newTaskHelp" value="{{ old('task') }}">
					<div id="newTaskHelp" class="form-text">Enter your new task.</div>
		        </div>
		        <div class="d-grid gap-2">
		        	<button type="submit" class="btn btn-primary btn-lg btn-block">Create</button>
		        </div>
			</form>
		</div>
	</div>
</div>

@if ($to_do_list->items())

<div class="p-3 border bg-light mt-3">
	<div class="row gy-5 d-flex justify-content-center">
		<div class="col-xl-10 margin-tb">
			<div class="table-responsive">
				<table class="table table-success table-striped table-hover table-bordered table-sm" style="table-layout: fixed; width:100%">
						<col width="30">
						<col width="">
						<col width="140">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th colspan="2" class="text-center">Tasks</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($to_do_list as $task)
						<tr>
							<td style="text-align: center;" valign="middle">{{ ++$i }}</td>
							<td style="word-wrap:break-word;" valign="middle">{{ $task->task }}</td>
							<td style="text-align: center;" valign="middle" width="140">
								<form action="{{ route('todolist.destroy',$task->id) }}" method="post">
									@csrf
									@method('DELETE')
									<a class="btn btn-primary" href="{{ route('todolist.edit', $task->id) }}">Edit</a>
									<button type="submit" class="btn btn-danger">Delete</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div>
				{{ $to_do_list->links() }}
			</div>
		</div>
	</div>
</div>

@endif

@endsection