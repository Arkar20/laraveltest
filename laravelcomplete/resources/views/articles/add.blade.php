@extends('layouts/app')

@section('content')



	<div class="container ">

		
		@if ($errors->any())
		<div class="alert alert-danger">
		<ul>
	
			@foreach ($errors->all() as $error)
				<li> {{ $error }} </li>
	
			@endforeach
		</ul>
		</div>
	@endif



		
				<form method="post">
					{{csrf_field()}} <!-- For web security -->
			<div class="form-group">
				<label for="">Title</label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Body</label>
				<input type="text" name="body" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Category</label>
				<select name="category_id" id="" class="form-control">
					
						@foreach($categories as $category)
						<option value="{{$category ->id }}"> 
						{{$category ->name }}	
						</option>			
					@endforeach
					
					
					
				</select>
			</div>
			<input type="submit" value="Add new category" class="btn btn-primary">
			
			
			





		</form>

	</div>

@endsection