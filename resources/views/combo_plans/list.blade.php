<?php 
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>
@extends('layouts.app')
@section('title','Plan List')

@section('page-style')

@stop
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 text-end">
        <a href="{{route('combo_plans.create')}}" class="btn btn-primary">Add Combo Plan</a>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="table-responsive contact">
                <table class="table" id="employee_table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $cnt = 1; ?>
                        @if(count($comboPlans) > 0)
                            @foreach($comboPlans as $comboPlan)
                                <tr>
                                    <td>{{$cnt++}}</td>
                                    <td>{{ $comboPlan->name }}</td>
                                    <td>{{ $comboPlan->price }}</td>
                                    <td>
                                        <a href="{{route('combo_plans.view',['id'=>base64_encode($comboPlan->id)])}}" class="btn btn-primary btn-sm" title="View" style="margin: 0px 5px 0px 5px;">View</a>

                                        <a href="{{route('combo_plans.edit',['id'=>base64_encode($comboPlan->id)])}}" class="btn btn-primary btn-sm" title="Edit" style="margin: 0px 5px 0px 5px;">Edit</a>

                                        <a  href="{{route('combo_plans.delete',['id'=>base64_encode($comboPlan->id)])}}" class="btn btn-danger btn-sm" title="Delete" style="margin: 0px 5px 0px 5px;">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            @if(count($comboPlans) > 0)
                <div class="row clearfix">
                     <div class="col-lg-12">
                        {!! $comboPlans->appends(Request::all())->links() !!}   
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@stop
@section('page-script')
<script type="text/javascript">
    
</script>

@stop