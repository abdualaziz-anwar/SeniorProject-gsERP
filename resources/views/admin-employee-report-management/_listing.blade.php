@extends('layout.master')
@section('pagetitle')
Employee Report Management
@endsection
@section('pagecontent')
<div class="container-fluid ">
    <div class="inner-content">
        <div id="dashboard_alert_message"></div>
        <hr>
        <div class="table-responsive-md mt-4 mx-4">
            <table class="table table-responsive ">
                <thead>
                    <tr class="text-center" style="background-color: #1C4E80; color: white; ">
                        <th>National ID</th>
                        <th>Employee Name</th>
                        <th>Total Reports of this Month</th>
                        <th>Token ID</th>
                        <th>view</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listing as $listItem)
                    <tr class="text-center">
                        <td>{{$listItem->national_id}}</td>
                        <td>{{$listItem->fname .' '. $listItem->lname}}</td>
                        <td>{{$listItem->total_reports+1}}</td>
                        <td>{{$listItem->token_id}}</td>
                        <td>
                            <button type="button" class="btn text-success">
                                <a href="{{url('admin-employee-report/'.$listItem->id)}}">View</a>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection