var el = document.getElementById("wrapper");
var toggleButton = document.getElementById("menu-toggle");

toggleButton.onclick = function () {
    el.classList.toggle("toggled");
};

$("#AddUserModel").on("shown.bs.modal", function () {
    document.body.classList.add("modal-open");
});
$("#viewDataModel").on("shown.bs.modal", function () {
    document.body.classList.add("modal-open");
});

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

// ---------------property--------------------------

// reseting the adding property form everytime we click it
$("addpropertybtn").on("click", function () {
    $("addProperty")[0].reset();
});
// ##reseting the adding property form everytime we click it

const ajaxHandler = {
    alertMessage: (msg, type = "success", el_id, auto_hide = true) => {
        var message = document.getElementById(el_id);
        message.innerHTML =
            ' <p class="' +
            type +
            '">' +
            msg +
            '<button class="border-bg-unset" id="alert-message-close"><i class="bi bi-x-circle-fill orange alert-close-btn"></i></button></p>';
        setTimeout(() => {
            const options = {
                behavior: "auto",
                block: "start",
                inline: "start",
            };
            document.getElementById(el_id).scrollIntoView(options);
        }, 100);
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
        $("#addProperty").validate({
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
                var form = $("#addProperty");
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
                            $("#addPropertModal").modal("hide");
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
