<div class="modal fade" id="editPropertModal" tabindex="-1" aria-labelledby="editPropertModal" aria-hidden="true">
    <div class="modal-dialog">
        {{-- start modal --}}
        <div class="modal-content">
            {{-- modal header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit New Property</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- ##modal header --}}
            {{-- modal body --}}
            <div class="modal-body">
                <form action="#" id="editProperty">
                    <input type="hidden" name="edit_id" value="{{@$formData->id}}">

                    <div class="row">
                        <div class="col text-center">
                            <div id="edit_form_alert_msg">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col  text-center ">
                            <img src="{{ isset($formData) ? asset($formData->image) : asset('images/user.png') }}"
                                alt="..." class="img-fluid" width="100px">
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col  text-center ">
                            <input type="file" name="image" class="mt-3" />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="property_id" class="form-control" placeholder="Enter Property Id"
                                value="{{@$formData->p_id}}" required />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="name" class="form-control" placeholder="Enter Property Name"
                                value="{{@$formData->name}}" required />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <textarea name="description" class="form-control"
                                placeholder="Enter Property Description">{{@$formData->description}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button onclick="ajaxHandler.submiteditPropertForm()"
                            class="btn btn-success form-control border-0"
                            style="background-color: #1C4E80; color: white;"> Update</button>
                        <button type="button" class="btn btn-danger form-control border-0" data-bs-dismiss="modal">Close
                        </button>
                    </div>

                </form>
            </div>
            {{-- ##modal body --}}
        </div>
        {{-- end modal --}}
    </div>
</div>