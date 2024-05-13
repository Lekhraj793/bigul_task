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
					<label>Price</label><br>
					<input type="text" name="price" value="{{$editData->price}}" class="form-control w-100" placeholder="Price" readonly="true">
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
					<select class="js-example-basic-multiple select-2" name="plan_id[]" id="plan_id" multiple="multiple" disabled>
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
			<button type="button" name="back" class="btn btn-raised btn-danger btn-round waves-effect go-back-btn" style="margin-left: 50%; width: 10%;" onclick="history.go(-1);">Back</button>
		</div>
</div>
@stop
@section('page-script')

<script type="text/javascript">
	$(document).ready(function() {
		var selectedPlan = "<?php echo $selectedPlans; ?>";
		selectedPlan = selectedPlan.split(',');
		$('#plan_id').select2({multiple: true}).val(selectedPlan).trigger('change.select2');
	});
</script>

@stop