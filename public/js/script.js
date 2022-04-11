var el = document.getElementById("wrapper");
var toggleButton = document.getElementById("menu-toggle");

toggleButton.onclick = function () {
    el.classList.toggle("toggled");
};

// DashBoard Loader.
var loader_el = document.getElementById("dashboard_loader");
var loaderGif = {
    show: () => {
        if (loader_el.style.display === "none") {
            loader_el.style.display = "block";
        }
    },
    hide: () => {
        if (loader_el.style.display === "block") {
            loader_el.style.display = "none";
        }
    },
};
// ##DashBoard Loader.

$("#addNewButton").on("click", function () {
    $("#addForm")[0].reset();
});

$.validator.addMethod("PScheck", function (value) {
    return (
        /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) && // consists of only these
        /[a-z]/.test(value) && // has a lowercase letter
        /[A-Z]/.test(value) && // has upper case letter
        /\d/.test(value)
    ); // has a digit
});

// property
const ajaxHandler = {
    alertMessage: (msg, type = "success", el_id, auto_hide = true) => {
        var message = document.getElementById(el_id);
        message.innerHTML = ' <p class="' + type + '">' + msg;
        setTimeout(() => {
            const options = {
                behavior: "auto",
                block: "start",
                inline: "start",
            };
            document.getElementById(el_id).scrollIntoView(options);
        }, 1000);
        if (auto_hide) {
            setTimeout(() => {
                message.innerHTML = "";
            }, 5000);
        }
    },

    deletePropert: (id) => {
        loaderGif.show();
        $.ajax({
            url: "deletePropert",
            type: "POST",
            data: { id: id },
            dataType: "JSON",
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            success: function (res) {
                if (res.status == "true") {
                    ajaxHandler.alertMessage(
                        res.msg,
                        "success",
                        "dashboard_alert_message",
                        true
                    );
                    // refresh the page if all work.
                    location.reload();
                } else {
                    ajaxHandler.alertMessage(
                        res.msg,
                        "danger",
                        "dashboard_alert_message",
                        true
                    );
                }
                loaderGif.hide();
            },
        });
    },

    submitAddPropertForm: () => {
        $("#addForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                },
                image: {
                    required: true,
                },
                property_id: {
                    required: true,
                    minlength: 2,
                },
                description: {
                    required: true,
                },
            },
            messages: {
                name: "Please enter property name",
                image: "Please choose image",
                property_id: "Please enter property ID",
                description: "Please enter Description",
            },
            submitHandler: function (form) {
                loaderGif.show();
                var form = $("#addForm");
                var formData = new FormData(form[0]);

                $.ajax({
                    url: "submitAddPropertForm",
                    type: "POST",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (res) {
                        if (res.status == "true") {
                            $("#addModal").modal("hide");
                            form[0].reset();
                            ajaxHandler.alertMessage(
                                res.msg,
                                "success",
                                "dashboard_alert_message",
                                false
                            );
                            location.reload();
                        } else {
                            ajaxHandler.alertMessage(
                                res.msg,
                                "danger",
                                "form_alert_msg",
                                false
                            );
                        }
                        loaderGif.hide();
                    },
                });
            },
        });
    },

    populateEditPropertForm: (id) => {
        loaderGif.show();
        $("#editProperty")[0].reset();
        $.ajax({
            url: "populateEditPropertForm",
            type: "POST",
            data: { id: id },
            dataType: "HTML",
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            success: function (res) {
                var res = JSON.parse(res);
                $("#editForm").html(res["form_html"]);
                $("#editPropertModal").modal("show");
                loaderGif.hide();
            },
        });
    },

    submiteditPropertForm: () => {
        $("#editProperty").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                },
                property_id: {
                    required: true,
                    minlength: 5,
                },
                description: {
                    required: true,
                },
            },
            messages: {
                name: "Please enter property name",
                property_id: "Please enter property ID",
                description: "Please enter Description",
            },
            submitHandler: function (form) {
                loaderGif.show();
                var form = $("#editProperty");
                var formData = new FormData(form[0]);

                $.ajax({
                    url: "submitEditPropertForm",
                    type: "POST",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (res) {
                        if (res.status == "true") {
                            $("#editPropertModal").modal("hide");
                            form[0].reset();
                            ajaxHandler.alertMessage(
                                res.msg,
                                "success",
                                "dashboard_alert_message",
                                false
                            );
                            location.reload();
                        } else {
                            ajaxHandler.alertMessage(
                                res.msg,
                                "danger",
                                "edit_form_alert_msg",
                                false
                            );
                        }
                        loaderGif.hide();
                    },
                });
            },
        });
    },
};
// ##property

// GasStation Manager
const ajaxGasStationManagerHandler = {
    deleteItem: (id) => {
        loaderGif.show();
        $.ajax({
            url: "deleteGasStationManager",
            type: "POST",
            data: { id: id },
            dataType: "JSON",
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            success: function (res) {
                if (res.status == "true") {
                    ajaxHandler.alertMessage(
                        res.msg,
                        "success",
                        "dashboard_alert_message",
                        true
                    );
                    location.reload();
                } else {
                    ajaxHandler.alertMessage(
                        res.msg,
                        "danger",
                        "dashboard_alert_message",
                        true
                    );
                }
                loaderGif.hide();
            },
        });
    },
    submitaddForm: () => {
        $("#addForm").validate({
            rules: {
                national_id: {
                    required: true,
                    minlength: 9,
                },
                f_name: {
                    required: true,
                },
                l_name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                phone: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 6,
                    PScheck: true,
                },
            },
            messages: {
                f_name: "Please enter First name",
                l_name: "Please enter last name",
                national_id:
                    "Please enter National ID (must be atleast 9 numbers)",
                email: "Please enter Email",
                phone: "Please enter phone",
                password:
                    "Please type password (must have UpperCase & LowerCase & Numbers)",
            },
            submitHandler: function (form) {
                loaderGif.show();
                var form = $("#addForm");
                var formData = new FormData(form[0]);

                $.ajax({
                    url: "submitAddGasStationManagerForm",
                    type: "POST",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (res) {
                        if (res.status == "true") {
                            $("#addModal").modal("hide");
                            form[0].reset();
                            ajaxHandler.alertMessage(
                                res.msg,
                                "success",
                                "dashboard_alert_message",
                                false
                            );
                            location.reload();
                        } else {
                            ajaxHandler.alertMessage(
                                res.msg,
                                "danger",
                                "form_alert_msg",
                                false
                            );
                        }
                        loaderGif.hide();
                    },
                });
            },
        });
    },
    populateEditForm: (id) => {
        loaderGif.show();
        $("#editform")[0].reset();
        $.ajax({
            url: "populateEditGasStationManagerForm",
            type: "POST",
            data: { id: id },
            dataType: "HTML",
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            success: function (res) {
                var res = JSON.parse(res);
                $("#editForm").html(res["form_html"]);
                $("#editModal").modal("show");
                loaderGif.hide();
            },
        });
    },
    submitEditForm: () => {
        $("#editform").validate({
            rules: {
                national_id: {
                    required: true,
                    minlength: 3,
                },
                f_name: {
                    required: true,
                },
                l_name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                phone: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 6,
                    PScheck: true,
                },
            },
            messages: {
                f_name: "Please enter First name",
                l_name: "Please enter last name",
                national_id: "Please enter National ID",
                email: "Please enter Email",
                phone: "Please enter phone",
            },
            submitHandler: function (form) {
                loaderGif.show();
                var form = $("#editform");
                var formData = new FormData(form[0]);

                $.ajax({
                    url: "submitAddGasStationManagerForm",
                    type: "POST",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (res) {
                        if (res.status == "true") {
                            $("#editModal").modal("hide");
                            form[0].reset();
                            ajaxHandler.alertMessage(
                                res.msg,
                                "success",
                                "dashboard_alert_message",
                                false
                            );
                            location.reload();
                        } else {
                            ajaxHandler.alertMessage(
                                res.msg,
                                "danger",
                                "edit_form_alert_msg",
                                false
                            );
                        }
                        loaderGif.hide();
                    },
                });
            },
        });
    },
};
// ##GasStation Manager

// leasholder
const ajaxLeaseHolderHandler = {
    deleteItem: (id) => {
        loaderGif.show();
        $.ajax({
            url: "deleteLeaseholder",
            type: "POST",
            data: { id: id },
            dataType: "JSON",
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            success: function (res) {
                if (res.status == "true") {
                    ajaxHandler.alertMessage(
                        res.msg,
                        "success",
                        "dashboard_alert_message",
                        true
                    );
                    location.reload();
                } else {
                    ajaxHandler.alertMessage(
                        res.msg,
                        "danger",
                        "dashboard_alert_message",
                        true
                    );
                }
                loaderGif.hide();
            },
        });
    },

    submitaddForm: () => {
        $("#addForm").validate({
            rules: {
                national_id: {
                    required: true,
                    minlength: 3,
                },
                f_name: {
                    required: true,
                },
                l_name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                phone: {
                    required: true,
                },
                duration_of: {
                    required: true,
                },
            },
            messages: {
                f_name: "Please enter First name",
                l_name: "Please enter last name",
                national_id: "Please enter National ID",
                email: "Please enter Email",
                phone: "Please enter phone",
                duration_of: "Please select durationOf",
            },
            submitHandler: function (form) {
                loaderGif.show();
                var form = $("#addForm");
                var formData = new FormData(form[0]);

                $.ajax({
                    url: "submitAddLeaseholderForm",
                    type: "POST",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (res) {
                        if (res.status == "true") {
                            $("#addModal").modal("hide");
                            form[0].reset();
                            ajaxHandler.alertMessage(
                                res.msg,
                                "success",
                                "dashboard_alert_message",
                                false
                            );
                            location.reload();
                        } else {
                            ajaxHandler.alertMessage(
                                res.msg,
                                "danger",
                                "form_alert_msg",
                                false
                            );
                        }
                        loaderGif.hide();
                    },
                });
            },
        });
    },

    populateEditForm: (id) => {
        loaderGif.show();
        $("#editform")[0].reset();
        $.ajax({
            url: "populateEditLeaseholderForm",
            type: "POST",
            data: { id: id },
            dataType: "HTML",
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            success: function (res) {
                var res = JSON.parse(res);
                $("#editForm").html(res["form_html"]);
                $("#editModal").modal("show");
                loaderGif.hide();
            },
        });
    },

    submitEditForm: () => {
        $("#editform").validate({
            rules: {
                national_id: {
                    required: true,
                    minlength: 3,
                },
                f_name: {
                    required: true,
                },
                l_name: {
                    required: true,
                },
                email: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                duration_of: {
                    required: true,
                },
            },
            messages: {
                f_name: "Please enter First name",
                l_name: "Please enter last name",
                national_id: "Please enter National ID",
                email: "Please enter Email",
                phone: "Please enter phone",
                duration_of: "Please select durationOf",
            },
            submitHandler: function (form) {
                loaderGif.show();
                var form = $("#editform");
                var formData = new FormData(form[0]);

                $.ajax({
                    url: "submitEditLeaseholderForm",
                    type: "POST",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (res) {
                        if (res.status == "true") {
                            $("#editModal").modal("hide");
                            form[0].reset();
                            ajaxHandler.alertMessage(
                                res.msg,
                                "success",
                                "dashboard_alert_message",
                                false
                            );
                            location.reload();
                        } else {
                            ajaxHandler.alertMessage(
                                res.msg,
                                "danger",
                                "edit_form_alert_msg",
                                false
                            );
                        }
                        loaderGif.hide();
                    },
                });
            },
        });
    },
};
// ##leaseholder

// Contracts
const ajaxContractHandler = {
    deleteItem: (id) => {
        loaderGif.show();
        $.ajax({
            url: "deleteContracts",
            type: "POST",
            data: { id: id },
            dataType: "JSON",
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            success: function (res) {
                if (res.status == "true") {
                    ajaxHandler.alertMessage(
                        res.msg,
                        "success",
                        "dashboard_alert_message",
                        true
                    );
                    location.reload();
                } else {
                    ajaxHandler.alertMessage(
                        res.msg,
                        "danger",
                        "dashboard_alert_message",
                        true
                    );
                }
                loaderGif.hide();
            },
        });
    },

    submitaddForm: () => {
        $("#addForm").validate({
            rules: {
                contract_id: {
                    required: true,
                },
                property_id: {
                    required: true,
                },
                leaseholder_id: {
                    required: true,
                },
                from_date: {
                    required: true,
                },
                to_date: {
                    required: true,
                },
            },

            messages: {
                contract_id: "Please enter the contract id",
                property_id: "choose the property",
                leaseholder_id: "choose the leaseholder",
                from_date: "select date",
                to_date: "select  date",
            },

            submitHandler: function (form) {
                loaderGif.show();
                var form = $("#addForm");
                var formData = new FormData(form[0]);

                $.ajax({
                    url: "submitAddContractForm",
                    type: "POST",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },

                    success: function (res) {
                        if (res.status == "true") {
                            $("#addModal").modal("hide");
                            form[0].reset();
                            ajaxHandler.alertMessage(
                                res.msg,
                                "success",
                                "dashboard_alert_message",
                                true
                            );
                            location.reload();
                        } else {
                            ajaxHandler.alertMessage(
                                res.msg,
                                "danger",
                                "dashboard_alert_message",
                                true
                            );
                        }
                        loaderGif.hide();
                    },
                });
            },
        });
    },

    populateEditForm: (id) => {
        loaderGif.show();
        $("#editform")[0].reset();
        $.ajax({
            url: "populateEditContractsForm",
            type: "POST",
            data: { id: id },
            dataType: "HTML",
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            success: function (res) {
                var res = JSON.parse(res);
                $("#editForm").html(res["form_html"]);
                $("#editModal").modal("show");
                loaderGif.hide();
            },
        });
    },

    submitEditForm: () => {
        $("#editform").validate({
            rules: {
                contract_id: {
                    required: true,
                },
                property_id: {
                    required: true,
                },
                leaseholder_id: {
                    required: true,
                },
                from_date: {
                    required: true,
                },
                to_date: {
                    required: true,
                },
            },

            messages: {
                contract_id: "Please enter the contract id",
            },

            submitHandler: function (form) {
                loaderGif.show();
                var form = $("#editform");
                var formData = new FormData(form[0]);

                $.ajax({
                    url: "submitEditContractForm",
                    type: "POST",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (res) {
                        if (res.status == "true") {
                            $("#editModal").modal("hide");
                            form[0].reset();
                            ajaxHandler.alertMessage(
                                res.msg,
                                "success",
                                "dashboard_alert_message",
                                false
                            );
                            location.reload();
                        } else {
                            ajaxHandler.alertMessage(
                                res.msg,
                                "danger",
                                "edit_form_alert_msg",
                                false
                            );
                        }
                        loaderGif.hide();
                    },
                });
            },
        });
    },
};
// ## contracts

//employees
const ajaxEmployeeHandler = {
    deleteItem: (id) => {
        loaderGif.show();
        $.ajax({
            url: "deleteEmployee",
            type: "POST",
            data: { id: id },
            dataType: "JSON",
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            success: function (res) {
                if (res.status == "true") {
                    ajaxHandler.alertMessage(
                        res.msg,
                        "success",
                        "dashboard_alert_message",
                        true
                    );
                    location.reload();
                } else {
                    ajaxHandler.alertMessage(
                        res.msg,
                        "danger",
                        "dashboard_alert_message",
                        true
                    );
                }
                loaderGif.hide();
            },
        });
    },
    submitaddForm: () => {
        $("#addForm").validate({
            rules: {
                national_id: {
                    required: true,
                    minlength: 9,
                },
                f_name: {
                    required: true,
                },
                l_name: {
                    required: true,
                },
                token_id: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                salary: {
                    required: true,
                },
            },
            messages: {
                f_name: "Please enter First name",
                l_name: "Please enter last name",
                national_id: "Please enter National ID",
                token_id: "Please enter Token_id",
                phone: "Please enter phone",
                salary: "Please enter salary",
            },
            submitHandler: function (form) {
                loaderGif.show();
                var form = $("#addForm");
                var formData = new FormData(form[0]);

                $.ajax({
                    url: "submitAddEmployeeForm",
                    type: "POST",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (res) {
                        if (res.status == "true") {
                            $("#addModal").modal("hide");
                            form[0].reset();
                            ajaxHandler.alertMessage(
                                res.msg,
                                "success",
                                "dashboard_alert_message",
                                false
                            );
                            location.reload();
                        } else {
                            ajaxHandler.alertMessage(
                                res.msg,
                                "danger",
                                "form_alert_msg",
                                false
                            );
                        }
                        loaderGif.hide();
                    },
                });
            },
        });
    },
    populateEditForm: (id) => {
        loaderGif.show();
        $("#editform")[0].reset();
        $.ajax({
            url: "populateEditEmployeeForm",
            type: "POST",
            data: { id: id },
            dataType: "HTML",
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            success: function (res) {
                var res = JSON.parse(res);
                $("#editForm").html(res["form_html"]);
                $("#editModal").modal("show");
                loaderGif.hide();
            },
        });
    },
    submitEditForm: () => {
        $("#editform").validate({
            rules: {
                national_id: {
                    required: true,
                    minlength: 9,
                },
                f_name: {
                    required: true,
                },
                l_name: {
                    required: true,
                },
                token_id: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                salary: {
                    required: true,
                },
            },
            messages: {
                f_name: "Please enter First name",
                l_name: "Please enter last name",
                national_id: "Please enter National ID",
                token_id: "Please enter Token_id",
                phone: "Please enter phone",
                salary: "Please enter salary",
            },
            submitHandler: function (form) {
                loaderGif.show();
                var form = $("#editform");
                var formData = new FormData(form[0]);

                $.ajax({
                    url: "submitEditEmployeeForm",
                    type: "POST",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (res) {
                        if (res.status == "true") {
                            $("#editModal").modal("hide");
                            form[0].reset();
                            ajaxHandler.alertMessage(
                                res.msg,
                                "success",
                                "dashboard_alert_message",
                                false
                            );
                            location.reload();
                        } else {
                            ajaxHandler.alertMessage(
                                res.msg,
                                "danger",
                                "edit_form_alert_msg",
                                false
                            );
                        }
                        loaderGif.hide();
                    },
                });
            },
        });
    },
};
// ##employees
