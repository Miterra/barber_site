document.addEventListener("DOMContentLoaded", function () {
    const select = document.getElementById("choix");

    if (select) {
        select.addEventListener("change", function () {
            if (this.value !== "") {
                window.location.href = this.value;
            }
        });
    }
});