document
    .querySelector("#copyBillingBtn")
    .addEventListener("click", function () {
        document.querySelector("#shippaddress").value =
            document.querySelector("#billaddress").value;
        document.querySelector("#shippstate").value =
            document.querySelector("#billstate").value;
        document.querySelector("#shippcity").value =
            document.querySelector("#billcity").value;
        document.querySelector("#shipppin").value =
            document.querySelector("#billpin").value;
    });
// alert("check ");
