<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- modal header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- ##modal header --}}
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
                            <input type="number" name="national_id" class="form-control" placeholder="Enter National Id"
                                required />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="f_name" class="form-control" placeholder="Enter First Name"
                                required />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="l_name" class="form-control" placeholder="Enter Last Name"
                                required />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="token_id" class="form-control" placeholder="Enter Token ID"
                                required />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input type="number" name="phone" class="form-control" placeholder="Enter Phone" required />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input type="number" name="salary" class="form-control" placeholder="Enter salary"
                                required />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button onclick="ajaxEmployeeHandler.submitaddForm()"
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