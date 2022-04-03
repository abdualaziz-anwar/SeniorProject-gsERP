{{-- add modal --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- modal header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Contracts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- modal header --}}
            {{-- modal body --}}
            <div class="modal-body">
                {{-- strat form --}}
                <form action="#" id="addForm">

                    <div class="row">
                        <div class="col text-center ">
                            <div id="form_alert_msg">

                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="contract_id" class="form-control" placeholder="Enter contract ID"
                                required />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label for="">From Date</label>
                            <input type="date" name="from_date" class="form-control" placeholder="Enter from date"
                                required />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label for="">To Date</label>
                            <input type="date" name="to_date" class="form-control" placeholder="Enter To date"
                                required />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <select name="property_id" class="form-control">
                                <option value="" disabled selected> Select Property</option>
                                @foreach($properties as $property)
                                <option value="{{$property->id}}">{{$property->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <select name="leaseholder_id" class="form-control">
                                <option value="" disabled selected> Select Lease Holder</option>
                                @foreach($leaseholders as $leaseholder)
                                <option value="{{$leaseholder->id}}">{{$leaseholder->fname.' '.$leaseholder->lname}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button onclick="ajaxContractHandler.submitaddForm()"
                            class="btn btn-success form-control border-0"
                            style="background-color: #1C4E80; color: white;"> Submit</button>
                        <button type="button" class="btn btn-danger form-control border-0" data-bs-dismiss="modal">Close
                        </button>
                    </div>
                    {{-- end form --}}
                </form>
            </div>
            {{-- ##model body --}}
        </div>
    </div>
</div>