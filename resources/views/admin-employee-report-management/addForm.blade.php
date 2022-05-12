<!-- add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New EmployeeReport</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="addForm">

                    <div class="row">
                        <div class="col text-center ">
                            <div id="form_alert_msg">

                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <select name="employee_id" class="form-control">
                                <option value="" disabled selected> Select Employee</option>
                                @foreach($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->fname.' '.$employee->lname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="pump_capacity" class="form-control"
                                placeholder="Enter Pump Capacity" required />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="fuel_type" class="form-control" placeholder="Enter Pump Fuel Type"
                                required />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="sales" class="form-control" placeholder="Enter Sales Amount"
                                required />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="total" class="form-control" placeholder="Enter total Amount"
                                required />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Report Date</label>
                            <input type="date" name="report_date" class="form-control" placeholder="Enter report date"
                                required />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button onclick="ajaxEmployeeReportHandler.submitaddFrom()"
                            class="btn btn-success form-control border-0"
                            style="background-color: #1C4E80; color: white;"> Submit</button>
                        <button type="button" class="btn btn-danger form-control border-0" data-bs-dismiss="modal">Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>