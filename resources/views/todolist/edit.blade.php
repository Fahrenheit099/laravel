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
	            <h2>Edit the Task</h2>
	        </div>
	    </div>
	</div>
	<div class="row gy-5 d-flex justify-content-center">
		<div class="col-xl-10">
			<form action="{{ route('todolist.update', $task->id) }}" method="post">
			    @csrf
                @method('PUT')
		        <div class="mb-3">
					<label for="task" class="form-label">Task:</label>
					<input type="text" name="task" class="form-control" id="task" aria-describedby="newTaskHelp" value="{{ $task->task }}">
					<div id="newTaskHelp" class="form-text">Enter edited task</div>
		        </div>
		        <div class="d-grid gap-2">
		        	<button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
		        </div>
			</form>
		</div>
	</div>
</div>

@endsection