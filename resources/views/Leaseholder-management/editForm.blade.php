{{-- edit modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- moidal header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit LeaseHolder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- moidal header --}}
            {{-- modaal bOdy --}}
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
                            <input type="text" name="national_id" class="form-control" placeholder="Enter National Id"
                                value="{{@$formData->national_id}}" required />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="f_name" class="form-control" placeholder="Enter First Name"
                                value="{{@$formData->fname}}" required />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="l_name" class="form-control" placeholder="Enter Last Name"
                                value="{{@$formData->lname}}" required />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="email" class="form-control" placeholder="Enter email"
                                value="{{@$formData->email}}" required />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="phone" class="form-control" placeholder="Enter phone"
                                value="{{@$formData->phone_no}}" required />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Duration OF</label>
                            <input type="date" name="duration_of" class="form-control"
                                value="{{@$formData->duration_of}}" placeholder="Enter Phone" required />
                        </div>
                    </div>
                    {{-- modal footer --}}
                    <div class="modal-footer">
                        <button onclick="ajaxLeaseHolderHandler.submitEditForm()"
                            class="btn btn-success form-control border-0"
                            style="background-color: #1C4E80; color: white;"> Update</button>
                        <button type="button" class="btn btn-danger form-control border-0" data-bs-dismiss="modal">Close
                        </button>
                    </div>
                    {{-- ##modal footer --}}
                </form>

            </div>
            {{-- ##modaal bOdy --}}
        </div>
    </div>
</div>