@extends('layout.master')

@section('pagetitle')
Manger Management
@endsection

@section('pagecontent')
<div class="container-fluid">
    <div class="inner-content">
        {{-- button trigger modal --}}
        <button type="button" class="btn btn-success text-uppercase mt-4 mx-4 border-0"
            style="background-color: #1C4E80;" id="addNewButton" data-bs-toggle="modal" data-bs-target="#addModal">
            Add New Gas Station Manager
        </button>

        @include($view_path . '.addForm');

        <div id="editForm">
            @include($view_path .'.editForm')
        </div>
        <div id="dashboard_alert_message"></div>

        <hr>

        <div class="table-responsive-md mt-4 mx-4">
            <table class="table table-responsive">
                {{-- table head --}}
                <thead>
                    <tr class="text-center" style="background-color: #1C4E80; color: white; ">
                        <th>National_Id</th>
                        <th>F_name</th>
                        <th>L_name</th>
                        <th>Phone_No</th>
                        <th>Email</th>
                        <th>G_id</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                {{-- ##table head --}}
                {{-- table body --}}
                <tbody>
                    @foreach ($listing as $listItem)
                    <tr class="text-center">
                        <td>{{$listItem -> national_id}}</td>
                        <td>{{$listItem -> fname}}</td>
                        <td>{{$listItem -> lname}}</td>
                        <td>{{$listItem -> phone_no}}</td>
                        <td>{{$listItem -> email}}</td>
                        <td>{{$listItem -> g_id}}</td>
                        {{-- for view button --}}
                        <td>
                            {{-- button trigger modal --}}
                            <button type="button" class="btn text-success" data-bs-toggle="modal"
                                data-bs-target="#viewPropertyData{{$listItem->id}}">
                                View
                            </button>

                            <div class="modal fade" id="viewPropertyData{{$listItem->id}}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        {{-- modal header --}}
                                        <div class="modal-header">
                                            <h5 class="modal-title " id="exampleModalLabel">GasStationManager:
                                                {{$listItem->fname.' '.$listItem->lname}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        {{-- ##modal header --}}
                                        {{-- modal bdoy --}}
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
                                                        <p>{{$listItem->fname.' '.$listItem->lname}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Email</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->email}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Password</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->password}}</p>
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
                                                        <p><b>Gas ID</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->g_id}}</p>
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>
                                        {{-- ##modal bdoy --}}
                                        {{-- modal footer --}}
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger form-control"
                                                data-bs-dismiss="modal">Close
                                            </button>
                                        </div>
                                        {{-- modal footer --}}
                                    </div>
                                </div>
                            </div>
                        </td>
                        {{-- ##for view button --}}
                        <td><a href="" class="btn text-primary"
                                onclick="ajaxGasStationManagerHandler.populateEditForm({{$listItem->id}})">Edit</a></td>
                        <td><a href="" class="btn text-danger"
                                onclick="ajaxGasStationManagerHandler.deleteItem({{$listItem->id}})">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
                {{-- table body --}}
            </table>

        </div>
    </div>
</div>

@endsection