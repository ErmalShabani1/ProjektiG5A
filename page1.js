// Toggle menu visibility for mobile view
function showMenu() {
    var navLinks = document.getElementById("navLinks");
    navLinks.style.right = "0";
}

function hideMenu() {
    var navLinks = document.getElementById("navLinks");
    navLinks.style.right = "-250px";
}

// Validate form submission
function validateForm() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    if (name == "" || email == "" || message == "") {
        document.getElementById("error-message").innerHTML = "All fields are required.";
        return false;
    }
    return true;
}
