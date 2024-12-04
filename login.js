document.addEventListener("DOMContentLoaded", function() {
    
    const regForm = document.getElementById("regform");
    const passwordField = document.querySelector("input[name='password']");
    const confirmPasswordField = document.querySelector("input[name='confirm_password']");
    
   
    regForm.addEventListener("submit", function(event) {

        if (passwordField.value !== confirmPasswordField.value) {
            event.preventDefault(); 
            alert("Passwords do not match! Please try again.");
        }
    });
});
