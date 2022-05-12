@extends('layout.master')
@section('pagetitle')
Employee Management
@endsection
@section('pagecontent')
<div class="container-fluid ">
    <div class="inner-content">
        {{-- button trigger --}}
        <button type="button" class="btn btn-success text-uppercase mt-4 mx-4  border-0"
            style="background-color: #1C4E80;" id="addNewButton" data-bs-toggle="modal" data-bs-target="#addModal">
            Add New Employee
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
                        <th>National-ID</th>
                        <th>F-Name</th>
                        <th>L-Name</th>
                        <th>Salary</th>
                        <th>Phone</th>
                        <th>Token ID</th>
                        <th>view</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- start loop --}}
                    @foreach($listing as $listItem)
                    <tr class="text-center">
                        <td>{{$listItem->national_id}}</td>
                        <td>{{$listItem->f_name}}</td>
                        <td>{{$listItem->l_name}}</td>
                        <td>{{$listItem->salary}}</td>
                        <td>{{$listItem->phone_no}}</td>
                        <td>{{$listItem->token_id}}</td>
                        <td>
                            {{-- view button --}}
                            <button type="button" class="btn text-success" data-bs-toggle="modal"
                                data-bs-target="#viewPropertyData{{$listItem->id}}">
                                View
                            </button>
                            <div class="modal fade" id="viewPropertyData{{$listItem->id}}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title " id="exampleModalLabel">Employee:
                                                {{$listItem->f_name.' '.$listItem->l_name}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        {{-- start modal body --}}
                                        <div class="modal-body">
                                            <table class="table table-bordered p-3">
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>National ID</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->national_id}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Name</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->f_name.' '.$listItem->l_name}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Salary</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->salary}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Phone</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->phone_no}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Token ID</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->token_id}}</p>
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>
                                        {{-- end modal body --}}
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
                                onclick="ajaxEmployeeHandler.populateEditForm({{$listItem->id}})">Edit</a>
                        </td>
                        <td><a href="#" class="btn text-danger"
                                onclick="ajaxEmployeeHandler.deleteItem({{$listItem->id}})">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection