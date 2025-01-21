    // Sample users data (as objects)
    const users = [
        { username: "Ermal", password: "ermal123", email: "ermal@gmail.com" },
        { username: "Admin User", password: "admin123", email: "admin@example.com" }
    ];

    // Login form functionality
    document.getElementById("logform").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission

        const username = document.querySelector("#logform input[name='username']").value.trim();
        const password = document.querySelector("#logform input[name='password']").value.trim();

        const user = users.find(
            user => user.username === username && user.password === password
        );

        if (user) {
            alert(`Mire se erdhe perseri, ${user.username}!`);
            document.getElementById("logform").reset();
            window.location.href = "index.html"; // Redirect to a dashboard or homepage
        } else {
            alert("Emri i përdoruesit ose Fjalkalimi i gabuar.");
        }
    });

    // Registration form functionality
    document.getElementById("regform").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission

        const emri = document.querySelector("#regform input[name='emri']").value.trim();
        const email = document.querySelector("#regform input[name='email']").value.trim();
        const password = document.querySelector("#regform input[name='password']").value.trim();
        const confirmPassword = document.querySelector("#regform input[name='confirm_password']").value.trim();

        if (password !== confirmPassword) {
            alert("Konfirmoje passwordin duke shkruar passwordin e njejt.");
            return;
        }

        // Check for duplicate username
        const usernameExists = users.some(user => user.username === emri);
        if (usernameExists) {
            alert("Ky emer i perdoruesit eksiston ju lutem zgjidhni nje tjeter.");
            return;
        }

        // Check for duplicate email
        const emailExists = users.some(user => user.email === email);
        if (emailExists) {
            alert("Nje llogari ekziston me kete email ju lutem zgjidhni nje tjeter.");
            return;
        }

        // Add new user if no duplicates
        users.push({ username: emri, password, email });
        alert(`Jeni regjistruar me sukses, ${emri}!`);
        document.getElementById("regform").reset();
    });
