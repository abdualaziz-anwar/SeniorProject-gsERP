@extends('layout.master')

@section('pagetitle')
PropertyManagement
@endsection

@section('pagecontent')
<div class="container-fluid">
    container-fluid
    <div class="inner-content">
        inner content
        <button type="button" class="btn btn-success text-uppercase mt-4 mx-4 border-0"
            style="background-color:  #1C4E80;" id="addpropertybtn" data-bs-toggle = "modal" data-bs-target="#addPropertModal">
            add New Property
        </button>
        {{-- TODO --}}
    </div>
</div>




@endsection