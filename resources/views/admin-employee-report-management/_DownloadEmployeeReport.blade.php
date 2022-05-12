<style>
    table {
        width: 100%;
    }

    table,
    th,
    td {
        border: 1px solid;
        border-collapse: collapse;
    }

    .reporting {
        margin-top: 20px;
    }

    .reporting td {
        text-align: center;
    }

    .employee_table tr {
        margin-left: 10px;
    }

</style>
<div class="container-fluid ">
    <div class="inner-content">
        <hr class="mx-4">
        <h3>Employee Report</h3>
        <div class="reportData px-4">
            <div class="table-resposive">
                <table class="table table-responsive employee_table">
                    <tr>
                        <td>
                            <p><b>Start Date:</b> <span class="mx-3">{{$start_date}}</span></p>
                        </td>
                        <td>
                            <p><b>End Date:</b> <span class="mx-3">{{$end_date}}</span></p>
                        </td>
                    </tr>
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

            <div class="table-responsive reporting">
                <table class="table table-responsive shadow p-5 mt-5">
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
    </div>
</div>