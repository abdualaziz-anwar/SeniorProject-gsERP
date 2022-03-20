@extends('layout.master')

@section('pagetitle')
LeaseHolder Management
@endsection

@section('pagecontent')
<div class="container-fluid">

    <div class="inner-content">

        <button type="button" class="btn btn-success text-uppercase mt-4 mx-4 border-0"
            style="background-color:  #1C4E80;" id="addleaseholderbtn" data-bs-toggle="modal"
            data-bs-target="#addModal">
            add New leaseholder
        </button>
        {{-- add form modal --}}
        @include($view_path . '.addForm')
        {{-- edit form modal --}}
        <div id="editForm">
            @include($view_path . '.editForm')
        </div>
        {{-- TODO --}}
        <div id="dashboard_alert_message"></div>

        <hr>

        <div class="table-responsive-md mt-4 mx-4">
            {{-- table start --}}
            <table class="table table-responsive">
                {{-- table head --}}
                <thead>
                    <tr class="text-center" style="background-color: #1C4E80; color: white; ">
                        <th>NATIONAL_ID</th>
                        <th>F_NAME</th>
                        <th>L_NAME</th>
                        <th>EMAIL</th>
                        <th>PHONE</th>
                        <th>DurationOf</th>
                        <th></th>
                        <th>VIEW</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                {{-- ##table head --}}
                {{-- table body --}}
                <tbody>
                    {{-- start loop --}}
                    @foreach ($allLeaseholder as $leaseholder)
                    <tr class="text-center">
                        <td>{{$leaseholder -> national_id}}</td>
                        <td>{{$leaseholder -> fname}}</td>
                        <td>{{$leaseholder -> lname}}</td>
                        <td>{{$leaseholder -> email}}</td>
                        <td>{{$leaseholder -> phone_no}}</td>
                        <td>{{$leaseholder -> duration_of}}</td>
                        <td><img src="{{asset($leaseholder -> image)}}" alt="" class="img-fluid" width="50px"></td>

                        <td>
                            {{-- view button trigger --}}
                            <button type="button" class="btn text-success" data-bs-toggle="modal"
                                data-bs-target="#viewPropertyData{{$leaseholder -> id}}">
                                View
                            </button>
                            {{-- ##view button trigger --}}

                            <div class="modal fade" id="viewPropertyData{{$leaseholder -> id}}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    {{-- start modal --}}
                                    <div class="modal-content">
                                        {{-- modal header --}}
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{$leaseholder -> fname. ''
                                                .$leaseholder -> lname}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        {{-- ##modal header --}}
                                        {{-- modal body --}}
                                        <div class="modal-body">

                                            <table class="table table-bordered p-3">
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>National ID</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$leaseholder->national_id}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Name</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$leaseholder->fname.' '.$leaseholder->lname}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Email</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$leaseholder->email}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Phone</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$leaseholder->phone_no}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>DurationOf</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$leaseholder->duration_of}}</p>
                                                    </td>
                                                </tr>

                                            </table>
                                            {{-- end table --}}
                                        </div>
                                        {{-- ##modal body --}}
                                        {{-- modal footer --}}
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger form-control"
                                                data-bs-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                        {{-- ##modal footer --}}
                                    </div>
                                </div>
                            </div>
                        </td>
                        {{-- TODO ONCLICK --}}
                        <td><a href="#" class="btn text-primary"
                                onclick="ajaxLeaseHolderHandler.populateEditForm({{$leaseholder->id}})">Edit</a>
                        </td>
                        <td><a href="#" class="btn text-danger"
                                onclick="ajaxLeaseHolderHandler.deleteItem({{$leaseholder->id}})">Delete</a></td>

                    </tr>
                    @endforeach
                    {{-- start loop --}}
                </tbody>
                {{-- table body --}}
            </table>
            {{-- ##table start --}}
        </div>
    </div>
</div>

@endsection