@extends('layout.master')

@section('pagetitle')
PropertyManagement
@endsection

@section('pagecontent')
<div class="container-fluid">

    <div class="inner-content">

        <button type="button" class="btn btn-success text-uppercase mt-4 mx-4 border-0"
            style="background-color:  #1C4E80;" id="addNewButton" data-bs-toggle="modal" data-bs-target="#addModal">
            add New Property
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
                        <th>P_ID</th>
                        <th>P_NAME</th>
                        <th>IMAGE</th>
                        <th>VIEW</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                {{-- ##table head --}}
                {{-- table body --}}
                <tbody>
                    {{-- start loop --}}
                    @foreach ($allProperty as $property)
                    <tr class="text-center">
                        <td>{{$property -> p_id}}</td>
                        <td>{{$property -> name}}</td>
                        <td><img src="{{asset($property -> image)}}" alt="" class="img-fluid" width="50px"></td>

                        <td>
                            {{-- view button trigger --}}
                            <button type="button" class="btn text-success" data-bs-toggle="modal"
                                data-bs-target="#viewPropertyData{{$property -> id}}">
                                View
                            </button>
                            {{-- ##view button trigger --}}

                            <div class="modal fade" id="viewPropertyData{{$property -> id}}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    {{-- start modal --}}
                                    <div class="modal-content">
                                        {{-- modal header --}}
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{$property -> name}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        {{-- ##modal header --}}
                                        {{-- modal body --}}
                                        <div class="modal-body">

                                            <table class="table table-bordered p-3">

                                                <tr class="text-center">
                                                    <td colspan="2"><img src="{{asset($property -> image)}}" alt=""
                                                            class="img-fluid py-4" width="100px"></td>
                                                </tr>

                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Property ID</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$property -> p_id}}</p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="td-width">
                                                        <p><b>Property Name</b></p>
                                                    </td>
                                                    <td>
                                                        <p>{{$property -> name}}</p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="td-width" colspan="2">
                                                        <b>Description</b>
                                                        <br>
                                                        <span>
                                                            <p style="text-align:justify">
                                                                {{$property->description}}
                                                            </p>
                                                        </span>
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
                                onclick="ajaxHandler.populateEditPropertForm({{$property -> id}})">Edit</a>
                        </td>
                        <td><a href="#" class="btn text-danger"
                                onclick="ajaxHandler.deletePropert({{$property->id}})">Delete</a></td>

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