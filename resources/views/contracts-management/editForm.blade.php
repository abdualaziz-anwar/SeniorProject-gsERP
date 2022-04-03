{{-- edit modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Contracts</h5>
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
                            <input type="text" name="contract_id" value="{{@$formData->contract_id}}"
                                class="form-control" placeholder="Enter contract ID" required />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label for="">From Date</label>
                            <input type="date" name="from_date" value="{{@$formData->from_date}}" class="form-control"
                                placeholder="Enter from date" required />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label for="">To Date</label>
                            <input type="date" name="to_date" value="{{@$formData->to_date}}" class="form-control"
                                placeholder="Enter To date" required />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <select name="property_id" class="form-control">
                                <option value="" disabled selected> Select Property</option>
                                @foreach($properties as $property)
                                <option value="{{$property->id}}" {{@$property->id == @$formData->property_id ?
                                    'selected' : '' }}>{{$property->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <select name="leaseholder_id" class="form-control">
                                <option value="" disabled selected> Select Lease Holder</option>
                                @foreach($leaseholders as $leaseholder)
                                <option value="{{$leaseholder->id}}" {{@$leaseholder->id == @$formData->leaseholder_id ?
                                    'selected' : '' }}>{{$leaseholder->fname.' '.$leaseholder->lname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button onclick="ajaxContractHandler.submitEditForm()"
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