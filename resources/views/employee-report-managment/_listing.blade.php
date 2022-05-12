@extends('layout.master')
@section('pagetitle')
Employee Report Management
@endsection
@section('pagecontent')
<div class="container-fluid ">
    <div class="inner-content">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success text-uppercase mt-4 mx-4  border-0"
            style="background-color: #1C4E80;" id="addNewButton" data-bs-toggle="modal" data-bs-target="#addModal">
            Add New Employee Report
        </button>
        @include($view_path .'.addForm')
        <div id="editForm">
            @include($view_path .'.editForm')
        </div>
        <div id="dashboard_alert_message"></div>

        <hr>
        <div class="table-responsive-md mt-4 mx-4">
            <table class="table table-responsive ">
                <thead>
                    <tr class="text-center" style="background-color: #1C4E80; color: white; ">
                        <th>Report ID</th>
                        <th>Employee Name</th>
                        <th>Token ID</th>
                        <th>Fuel type</th>
                        <th>view</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listing as $listItem)
                    <tr class="text-center">
                        <td>{{$listItem->report_id}}</td>
                        <td>{{$listItem->fname .' '. $listItem->lname}}</td>
                        <td>{{$listItem->token_id}}</td>
                        <td>{{$listItem->fuel_type}}</td>
                        <td>
                            <button type="button" class="btn text-success" data-bs-toggle="modal"
                                data-bs-target="#viewPropertyData{{$listItem->report_id}}">
                                View
                            </button>
                            <div class="modal fade" id="viewPropertyData{{$listItem->report_id}}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title " id="exampleModalLabel">EmployeeReport:
                                                {{$listItem->fname.' '.$listItem->lname}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered p-3">
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Employee National ID</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->national_id}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Employee Name</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->fname.' '.$listItem->lname}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Employee Salary</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->salary}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Employee Phone</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->phone_no}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Employee Token ID</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->token_id}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Employee Salary</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->salary}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Fuel Type</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->fuel_type}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Sales</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->sales}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Total</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->total}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Report Date</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->report_date}}</p>
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger form-control"
                                                data-bs-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td><a href="#" class="btn text-primary"
                                onclick="ajaxEmployeeReportHandler.populateEditForm({{$listItem->report_id}})">Edit</a>
                        </td>
                        <td><a href="#" class="btn text-danger"
                                onclick="ajaxEmployeeReportHandler.deleteItem({{$listItem->report_id}})">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection