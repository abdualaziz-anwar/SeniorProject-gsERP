{{-- adding property modal --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{-- modal content --}}
        <div class="modal-content">
            {{-- modal header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Property</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- ##modal header --}}
            {{-- modal body --}}
            <div class="modal-body">
                <form action="#" id="addForm">

                    {{-- alert message div --}}
                    <div class="row">
                        <div class="col  text-center ">
                            <div id="form_alert_msg">

                            </div>
                        </div>
                    </div>
                    {{-- ##alert message --}}

                    <div class="row">
                        <div class="col text-center">
                            <img src="{{asset('images/user.png')}}" alt="" class="img-fluid" width="100px">
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col text-center">
                            <input type="file" name="image" class="mt-3" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="property_id" class="form-control" placeholder="Enter Property ID"
                                required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="name" class="form-control" placeholder="Enter Property Name"
                                required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <textarea name="description" class="form-control"
                                placeholder="Enter Property Description"></textarea>
                        </div>
                    </div>
                    {{-- modal footer --}}
                    {{-- TODO ONCLICK--}}
                    <div class="modal-footer">
                        <button onclick="ajaxHandler.submitAddPropertForm()"
                            class="btn btn-success form-control border-0"
                            style="background-color: #1C4E80; color: white;"> Submit</button>

                        <button type="button" class="btn btn-danger form-control border-0" data-bs-dismiss="modal">Close
                        </button>
                    </div>
                    {{-- modal footer --}}
                </form>
            </div>
            {{-- ##modal body --}}
        </div>
        {{-- ##modal content --}}
    </div>
</div>