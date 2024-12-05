// Sample users data (as objects)
const users = [
    { username: "John Doe", password: "password123", email: "user1@example.com" },
    { username: "Admin User", password: "admin123", email: "admin@example.com" }
];

// Login form functionality
document.getElementById("logform").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent default form submission

    const username = document.querySelector("#logform input[name='username']").value;
    const password = document.querySelector("#logform input[name='password']").value;

    const user = users.find(user => user.username === username && user.password === password);

    if (user) {
        alert(`Welcome back, ${user.username}!`);
        window.location.href = "index.html"; // Redirect to a dashboard or homepage]
    } else {
        alert("Invalid username or password. Please try again.");
    }
});

// Registration form functionality
document.getElementById("regform").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent default form submission

    const fullname = document.querySelector("#regform input[name='fullname']").value;
    const email = document.querySelector("#regform input[name='email']").value;
    const password = document.querySelector("#regform input[name='password']").value;
    const confirmPassword = document.querySelector("#regform input[name='confirm_password']").value;

    if (password !== confirmPassword) {
        alert("Konfirmoje passwordin duke shkruar passwordin e njejt");
        return;
    }

    const existingUser = users.find(user => user.username === fullname || user.email === email);
    if (existingUser) {
        alert("Nje llogari me ket email eksiston");
        return;
    }

    users.push({ username: fullname, password, email });
    alert(`Jeni regjistruar me sukses , ${fullname}!`);
    document.getElementById("regform").reset(); 
});
