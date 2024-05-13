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
        <a href="{{route('plans.create')}}" class="btn btn-primary">Add Plan</a>
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
                        @if(count($plans) > 0)
                            @foreach($plans as $plan)
                                <tr>
                                    <td>{{$cnt++}}</td>
                                    <td>{{ $plan->name }}</td>
                                    <td>{{ $plan->price }}</td>
                                    <td>
                                        <a href="{{route('plans.view',['id'=>base64_encode($plan->id)])}}" class="btn btn-primary btn-sm" title="View" style="margin: 0px 5px 0px 5px;">View</a>

                                        <a href="{{route('plans.edit',['id'=>base64_encode($plan->id)])}}" class="btn btn-primary btn-sm" title="Edit" style="margin: 0px 5px 0px 5px;">Edit</a>

                                        <a  href="{{route('plans.delete',['id'=>base64_encode($plan->id)])}}" class="btn btn-danger btn-sm" title="Delete" style="margin: 0px 5px 0px 5px;">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            @if(count($plans) > 0)
                <div class="row clearfix">
                     <div class="col-lg-12">
                        {!! $plans->appends(Request::all())->links() !!}   
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