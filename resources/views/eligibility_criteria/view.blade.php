@extends('layouts.app')
@section('title','View Plan')

@section('page-style')

@stop
@section('content')
<div class="card p-3">
	 	<div class="row clearfix">
			<div class="col-lg-6">
				<div class="form-group">
					<label>Name</label><br>
					<input type="text" name="first_name" value="{{$editData->name}}"  class="form-control w-100" placeholder="Name" readonly="true">
					@error('name')
		                <div class="text-danger">{{ $message }}</div>
		            @enderror
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label>Age Less Than <span style="color:red;">*</span></label><br>
					<input type="text" name="age_less_than" value="{{$editData->age_less_than}}" class="form-control w-100" placeholder="Age Less Than" readonly="true">
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
					<input type="number" name="age_greater_than" value="{{ $editData->age_greater_than }}" class="form-control w-100" placeholder="Age Greater Than" readonly="true">
					@error('age_greater_than')
		            <div class="text-danger">{{ $message }}</div> 
		            @enderror
				</div>
	 		</div>
			<div class="col-md-6">
	 			<div class="form-group">
					<label>Income Less Than <span style="color:red;">*</span></label><br>
					<input type="number" name="income_less_than" value="{{ $editData->income_less_than }}" class="form-control w-100" placeholder="Income Less Than" readonly="true">
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
					<input type="number" name="income_greater_than" value="{{ $editData->income_greater_than }}" class="form-control w-100" placeholder="Income Greater Than" readonly="true">
					@error('income_greater_than')
		            <div class="text-danger">{{ $message }}</div> 
		            @enderror
				</div>
	 		</div>
	 	</div>
		<div class="row clearfix">
			<button type="button" name="back" class="btn btn-raised btn-primary btn-round waves-effect go-back-btn" style="margin-left: 50%; width: 10%;" onclick="history.go(-1);">Back</button>
		</div>
</div>
@stop
@section('page-script')


@stop