@extends('layouts.app')
@section('title','Edit Plan')

@section('page-style')

@stop
@section('content')
<h2>Edit Plan</h2>
<div class="card p-3">
	<form method="post" action="{{route('eligibility_criteria.update',['id'=>base64_encode($editData->id)])}}" enctype="multipart/form-data">
	 {{ csrf_field() }}
	 	<div class="row clearfix">
			<div class="col-lg-6">
				<div class="form-group">
					<label>Name <span style="color:red;">*</span></label><br>
					<input type="text" name="name" value="{{ $editData->name }}"  class="form-control w-100" placeholder="Name">
					@error('name')
		            <div class="text-danger">{{ $message }}</div>
		            @enderror
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label>Age Less Than <span style="color:red;">*</span></label><br>
					<input type="text" name="age_less_than" value="{{$editData->age_less_than}}" class="form-control w-100" placeholder="Age Less Than">
					@error('age_less_than')
		            <div class="text-danger">{{ $message }}</div> 
		            @enderror
				</div>
			</div>
		</div>
		<div class="row clearfix">
	 		<div class="col-md-6">
	 			<div class="form-group">
					<label>Age Greater Than <span style="color:red;">*</span></label><br>
					<input type="number" name="age_greater_than" value="{{ $editData->age_greater_than }}" class="form-control w-100" placeholder="Age Greater Than">
					@error('age_greater_than')
		            <div class="text-danger">{{ $message }}</div> 
		            @enderror
				</div>
	 		</div>
			<div class="col-md-6">
	 			<div class="form-group">
					<label>Income Less Than <span style="color:red;">*</span></label><br>
					<input type="number" name="income_less_than" value="{{ $editData->income_less_than }}" class="form-control w-100" placeholder="Income Less Than">
					@error('income_less_than')
		            <div class="text-danger">{{ $message }}</div> 
		            @enderror
				</div>
	 		</div>
	 	</div>
		 <div class="row clearfix">
			 <div class="col-md-6">
	 			<div class="form-group">
					<label>Income Greater Than <span style="color:red;">*</span></label><br>
					<input type="number" name="income_greater_than" value="{{ $editData->income_greater_than }}" class="form-control w-100" placeholder="Income Greater Than">
					@error('income_greater_than')
		            <div class="text-danger">{{ $message }}</div> 
		            @enderror
				</div>
	 		</div>
	 	</div>
		<div class="row clearfix">
            <button type="button" name="back" class="btn btn-danger rounded-0" style="margin-left: 50%; width: 10%;" onclick="history.go(-1);">Back</button>
			
            <button type="submit" name="submit" class="btn btn-primary rounded-0" style="margin-left: 50%; width: 10%;">Save</button>
		</div>
	</form>
</div>
@stop