function check() {
    var input = document.getElementById('fname');
    if (input.value !== "") {
        generateCertificate();
    } else {
        alert("Input field is empty.");
    }
}

function generateCertificate() {
    var x = document.getElementById("main");
    x.style.display = "block";
    var name = document.getElementById('fname').value;
    var details = document.getElementById('fdetails').value;
    var oname = document.getElementById('forganisername').value;

    document.getElementById('name').innerText = name;
    document.querySelector('.details').innerText = details;
    document.querySelector('.organisername').innerText = oname;
}




