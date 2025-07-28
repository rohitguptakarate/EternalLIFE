document.addEventListener("DOMContentLoaded", function () {
    const gsttreatment = document.querySelector("#gsttreatment");
    const gstinBox = document.querySelector("#gstinbox");
    const panbox = document.querySelector("#panbox");

    function toggleGstFields(value) {
        gstinBox.style.display = "none";
        panbox.style.display = "none";

        if (
            value === "Registered-Regular" ||
            value === "Registered-Composition" ||
            value === "SZE"
        ) {
            gstinBox.style.display = "block";
        } else if (value === "Unregistered" || value === "Cunsumer") {
            panbox.style.display = "block";
        }
    }

    // Run once on load
    toggleGstFields(gsttreatment.value);

    // Run on change
    gsttreatment.addEventListener("change", function () {
        toggleGstFields(this.value);
    });
});
