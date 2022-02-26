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
