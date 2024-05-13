@extends('layouts.app')
@section('title','Edit Plan')

@section('page-style')

@stop
@section('content')
<h2>Edit Plan</h2>
<div class="card p-3">
	<form method="post" action="{{route('plans.update',['id'=>base64_encode($editData->id)])}}" enctype="multipart/form-data">
	 {{ csrf_field() }}
	 	<div class="row clearfix">
			<div class="col-lg-6">
				<div class="form-group">
					<label>Name</label><br>
					<input type="text" name="name" value="{{$editData->name}}"  class="form-control w-100" placeholder="Name">
					@error('name')
		            <div class="text-danger">{{ $message }}</div>
		            @enderror
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label>Price</label><br>
					<input type="text" name="price" value="{{$editData->price}}" class="form-control w-100" placeholder="Price">
					@error('price')
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
@section('page-script')


@stop