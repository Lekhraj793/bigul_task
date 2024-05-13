@extends('layouts.app')
@section('title','Add Plan')

@section('page-style')

@stop
@section('content')
<h2>Add Plan</h2>
<div class="card p-3">
	<form method="post" action="{{route('combo_plans.store')}}" enctype="multipart/form-data">
	 {{ csrf_field() }}
	 	<div class="row clearfix">
	 		<div class="col-md-6">
	 			<div class="form-group">
					<label>Name <span style="color:red;">*</span></label><br>
					<input type="text" name="name" value="{{old('name')}}"  class="form-control w-100" placeholder="Name">
					@error('name')
		            	<div class="text-danger">{{ $message }}</div>
		            @enderror
				</div>
	 		</div>
	 		<div class="col-md-6">
	 			<div class="form-group">
					<label>Price</label><br>
					<input type="number" name="price" value="{{old('price')}}" class="form-control w-100" placeholder="Price">
					@error('price')
		            <div class="text-danger">{{ $message }}</div> 
		            @enderror
				</div>
	 		</div>
	 	</div>
		 <div class="row clearfix">
	 		<div class="col-md-6">
	 			<div class="form-group">
					<label>Plans <span style="color:red;">*</span></label><br>
					<select class="js-example-basic-multiple select-2" name="plan_id[]" id="plan_id" multiple="multiple">
						@if(count($plans) > 0)
							@foreach($plans as $plan)
								<option value="{{ $plan->id }}">{{ $plan->name }}</option>
							@endforeach
						@endif
					</select>
					@error('name')
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
<script type="text/javascript">
	$(document).ready(function() {
		$('#plan_id').select2();
	});
</script>

@stop