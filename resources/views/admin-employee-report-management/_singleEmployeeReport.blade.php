@extends('layout.master')
@section('pagetitle')
Employee Report Management
@endsection
@section('pagecontent')
<style>
    @media print {
        .noPrint {
            display: none;
        }
    }

</style>
<div class="container-fluid ">
    <div class="inner-content">

        <div class="filter px-4">
            <form action="">
                <div class="" style="display: flex; justify-content: end;align-items: end">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">From Date</label>
                        <input type="date" name="start_date" id="" class="form-control" value="{{$start_date}}"
                            style="margin-top: 10px;">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="inlineRadio1">to Date</label>
                        <input type="date" name="end_date" id="" class="form-control" value="{{$end_date}}"
                            style="margin-top: 10px;">
                    </div>
                    <div class="form-check noPrint">
                        <button class="btn btn-danger form-control">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <hr class="mx-4">

        <div class="reportData px-4">
            <div class="table-resposive">
                <table class="table table-responsive">
                    <tr>
                        <td>
                            <p><b>Employee ID:</b> <span class="mx-3">{{$employee->id}}</span></p>
                        </td>
                        <td>
                            <p><b>Employee Name:</b> <span class="mx-3">{{$employee->fname .' '.
                                    $employee->lname}}</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Employee Salary:</b> <span class="mx-3">${{$employee->salary}}</span></p>
                        </td>
                        <td>
                            <p><b>National ID:</b> <span class="mx-3">{{$employee->national_id}}</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Token ID:</b> <span class="mx-3">{{$employee->token_id}}</span></p>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>

            <div class="table-responsive">
                <table class="table table-responsive  shadow p-5 mt-5">
                    <thead>
                        <tr>
                            <th>Pump Capacity</th>
                            <th>Fuel Type</th>
                            <th>Sales Amount</th>
                            <th>Total</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reportListing as $listItem)
                        <tr>
                            <td>{{$listItem->pump_capacity}}</td>
                            <td>{{$listItem->fuel_type}}</td>
                            <td>{{$listItem->sales}}</td>
                            <td>{{$listItem->total}}</td>
                            <td>{{$listItem->report_date}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row noPrint">
            <div class="col">
                <button class="btn btn-danger form-control" onclick="window.print()">Print</button>
            </div>
            <div class="col">
                <a
                    href="{{url('/downloadReport/?emp_id='.$employee->id.'&start_date='.$start_date.'&end_date='.$end_date)}}"><button
                        class="btn btn-success form-control">Download</button></a>
            </div>
        </div>
    </div>
</div>
@endsection