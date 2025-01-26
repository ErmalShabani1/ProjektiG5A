const users = [];

document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("regform")
    .addEventListener("submit", function (event) {
      event.preventDefault(); 

      const emri = document
        .querySelector("#regform input[name='emri']")
        .value.trim();
      const email = document
        .querySelector("#regform input[name='email']")
        .value.trim();
      const password = document
        .querySelector("#regform input[name='password']")
        .value.trim();
      const confirmPassword = document
        .querySelector("#regform input[name='confirm_password']")
        .value.trim();

      if (password !== confirmPassword) {
        alert("Konfirmoje passwordin duke shkruar passwordin e njejt.");
        return;
      }

      const usernameExists = users.some((user) => user.username === emri);
      if (usernameExists) {
        alert("Ky emer i perdoruesit eksiston ju lutem zgjidhni nje tjeter.");
        return;
      }

      const emailExists = users.some((user) => user.email === email);
      if (emailExists) {
        alert(
          "Nje llogari ekziston me kete email ju lutem zgjidhni nje tjeter."
        );
        return;
      }

      if (!emri || !email || !password || !confirmPassword) {
        alert("Ju lutem plotësoni të gjitha fushat.");
        return;
      }

      users.push({ username: emri, email });

      const formData = new FormData();
      formData.append("emri", emri);
      formData.append("email", email);
      formData.append("password", password);

      const xhr = new XMLHttpRequest();
      xhr.open("POST", "register.php", true);
      xhr.onload = function () {
        if (xhr.status === 200) {
          alert(`Jeni regjistruar me sukses, ${emri}!`);
          document.getElementById("regform").reset();
        } else {
          alert(`Error: ${xhr.responseText}`);
        }
      };
      xhr.send(formData);
    });
});
