<!-- edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit EmployeeReport</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="editform">
                    <input type="hidden" name="edit_id" value="{{@$formData->id}}">
                    <div class="row">
                        <div class="col  text-center ">
                            <div id="edit_form_alert_msg">

                            </div>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col">
                            <select name="employee_id" class="form-control">
                                <option value="" disabled>Select employee</option>
                                @foreach($employees as $employee)
                                <option value="{{@$employee->id}}" {{@$employee->id == @$formData->employee_id ?
                                    'selected' : '' }}>{{$employee->fname.' '.$employee->lname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="pump_capacity" value="{{@$formData->pump_capacity}}"
                                class="form-control" placeholder="Enter Pump Capacity" required />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="fuel_type" value="{{@$formData->fuel_type}}" class="form-control"
                                placeholder="Enter Pump Fuel Type" required />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="sales" value="{{@$formData->sales}}" class="form-control"
                                placeholder="Enter Sales Amount" required />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="total" value="{{@$formData->total}}" class="form-control"
                                placeholder="Enter total Amount" required />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Report Date</label>
                            <input type="date" name="report_date" value="{{@$formData->report_date}}"
                                class="form-control" placeholder="Enter report date" required />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button onclick="ajaxEmployeeReportHandler.submitEditForm()"
                            class="btn btn-success form-control border-0"
                            style="background-color: #1C4E80; color: white;"> Update</button>
                        <button type="button" class="btn btn-danger form-control border-0" data-bs-dismiss="modal">Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>