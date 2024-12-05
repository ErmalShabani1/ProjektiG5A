document.addEventListener("DOMContentLoaded", function() {
   
    const loginButton = document.getElementById("pjesalogin");

    
    loginButton.addEventListener("click", function(event) {
       
        event.preventDefault();


        alert("You clicked the LogIn/SignUp button!");
    });
});
