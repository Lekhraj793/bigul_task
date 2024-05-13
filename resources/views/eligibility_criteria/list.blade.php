<?php 
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>
@extends('layouts.app')
@section('title','Eligibility Criteria List')

@section('page-style')

@stop
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 text-end">
        <a href="{{route('eligibility_criteria.create')}}" class="btn btn-primary">Add Eligibility Criteria</a>
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
                            <th>Age Less Than</th>
                            <th>Age Greater Than</th>
                            <th>Income Less Than</th>
                            <th>Income Greater Than</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $cnt = 1; ?>
                        @if(count($eligibilityCriterias) > 0)
                            @foreach($eligibilityCriterias as $eligibilityCriteria)
                                <tr>
                                    <td>{{$cnt++}}</td>
                                    <td>{{ $eligibilityCriteria->name }}</td>
                                    <td>{{ $eligibilityCriteria->age_less_than }}</td>
                                    <td>{{ $eligibilityCriteria->age_greater_than }}</td>
                                    <td>{{ $eligibilityCriteria->income_less_than }}</td>
                                    <td>{{ $eligibilityCriteria->income_greater_than }}</td>
                                    <td>
                                        <a href="{{route('eligibility_criteria.view',['id'=>base64_encode($eligibilityCriteria->id)])}}" class="btn btn-primary btn-sm" title="View" style="margin: 0px 5px 0px 5px;">View</a>

                                        <a href="{{route('eligibility_criteria.edit',['id'=>base64_encode($eligibilityCriteria->id)])}}" class="btn btn-info btn-sm" title="Edit" style="margin: 0px 5px 0px 5px;">Edit</a>

                                        <a  href="{{route('eligibility_criteria.delete',['id'=>base64_encode($eligibilityCriteria->id)])}}" class="btn btn-danger btn-sm" title="Delete" style="margin: 0px 5px 0px 5px;">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            @if(count($eligibilityCriterias) > 0)
                <div class="row clearfix">
                     <div class="col-lg-12">
                        {!! $eligibilityCriterias->appends(Request::all())->links() !!}   
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