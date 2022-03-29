@extends('layout.master')
@section('pagetitle')
Contracts Management
@endsection

@section('pagecontent')
<div class="container-fluid ">
    <div class="inner-content">
        {{-- bitton trigger modal --}}
        <button type="button" class="btn btn-success text-uppercase mt-4 mx-4  border-0"
            style="background-color: #1C4E80;" id="addFrombtn" data-bs-toggle="modal" data-bs-target="#addModal">
            Add New Contracts
        </button>
        {{-- bitton trigger modal --}}

        @include($view_path .'.addForm')
        <div id="editForm">
            @include($view_path .'.editForm')
        </div>
        <div id="dashboard_alert_message"></div>

        <hr>
        <div class="table-responsive-md mt-4 mx-4">
            <table class="table table-responsive ">
                {{-- table head --}}
                <thead>
                    <tr class="text-center" style="background-color: #1C4E80; color: white; ">
                        <th>Contract ID</th>
                        <th>Property Name</th>
                        <th>Lease Holder</th>
                        <th>Duration</th>
                        <th>view</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                {{-- ##table head --}}
                {{-- table body --}}
                <tbody>
                    {{-- start loop --}}
                    @foreach($listing as $listItem)
                    <tr class="text-center">
                        <td>{{$listItem->contract_id}}</td>
                        <td>{{$listItem->name}}</td>
                        <td>{{$listItem->fname .' '. $listItem->lname}}</td>
                        <td>{{$listItem->from_date. ' to ' .$listItem->to_date}}</td>
                        <td>
                            {{-- view button --}}
                            <button type="button" class="btn text-success" data-bs-toggle="modal"
                                data-bs-target="#viewPropertyData{{$listItem->con_id}}">
                                View
                            </button>

                            <div class="modal fade" id="viewPropertyData{{$listItem->con_id}}" tabindex="-1"
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
                                                    <td colspan="2" class="text-danger">
                                                        <h6>Contract Infromation</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><b>Contract ID:</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$listItem->con_id}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>From</th>
                                                    <th>To</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$listItem->from_date}}</td>
                                                    <td>{{$listItem->to_date}}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-danger">
                                                        <h6>Property Infromation</h6>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td><img src="{{asset($listItem->image)}}" alt=""
                                                            class="img-fluid py-4" width="100px"></td>
                                                    <td style="padding-top: 50px;">
                                                        <p><b>Property ID:</b> <span>{{$listItem->p_id}}</span></p>
                                                        <p><b> Name:</b> <span>{{$listItem->name}}</span></p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" class="text-danger">
                                                        <h6>Lease Holder Infromation</h6>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td><img src="./images/user.png" alt="" class="img-fluid py-4"
                                                            width="100px"></td>
                                                    <td style="padding-top: 20px;">
                                                        <p><b>ID</b> <span>{{$listItem->national_id}}:</span></p>
                                                        <p><b>Name:</b> <span>{{$listItem->fname . ' ' .$listItem->lname
                                                                }}</span></p>
                                                        <p><b>Phone:</b> <span>{{$listItem->phone_no}}</span></p>
                                                        <p><b>Email:</b> <span>{{$listItem->email}}</span></p>
                                                    </td>
                                                </tr>


                                            </table>

                                        </div>
                                        {{-- modal footer --}}
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger form-control"
                                                data-bs-dismiss="modal">Close
                                            </button>
                                        </div>
                                        {{-- ##modal footer --}}
                                    </div>
                                </div>
                                {{-- ##view button --}}
                            </div>
                        </td>
                        <td><a href="#" class="btn text-primary" onclick="#">Edit</a></td>
                        <td><a href="#" class="btn text-danger" onclick="#">Delete</a></td>
                    </tr>
                    {{-- end loop --}}
                    @endforeach
                    {{-- ##table body --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection