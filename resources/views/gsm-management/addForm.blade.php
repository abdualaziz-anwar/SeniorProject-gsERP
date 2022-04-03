{{-- adding modal --}}
{{-- adding property modal --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{-- modal content --}}
        <div class="modal-content">
            {{-- modal header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Gas Station Manager</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- ##modal header --}}
            {{-- modal body --}}
            <div class="modal-body">
                <form action="#" id="addFrom">

                    {{-- alert message div --}}
                    <div class="row">
                        <div class="col  text-center ">
                            <div id="form_alert_msg">

                            </div>
                        </div>
                    </div>
                    {{-- ##alert message --}}

                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="national_id" class="form-control" placeholder="Enter National ID"
                                required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="f_name" class="form-control" placeholder="Enter  First Name"
                                required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="l_name" class="form-control" placeholder="Enter  Last Name"
                                required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="g_id" class="form-control" placeholder="Enter Gas Id" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number"
                                required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <input type="text" name="password" class="form-control" placeholder="Enter password"
                                required>
                        </div>
                    </div>


                    {{-- modal footer --}}
                    <div class="modal-footer">
                        <button onclick="ajaxGasStationManagerHandler.submitaddFrom()"
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