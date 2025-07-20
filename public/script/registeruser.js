// === script.js ===

const passwordInput = document.getElementById("password");
const confirmInput = document.getElementById("confirm");
const togglePassword = document.getElementById("togglePassword");
const toggleConfirm = document.getElementById("toggleConfirm");
const strengthBar = document.getElementById("strengthBar");
const strengthText = document.getElementById("strengthText");
const matchError = document.getElementById("matchError");
const dateNaissance = document.getElementById("dateNaissance");
const form = document.getElementById("signupForm");

// Password visibility toggle
function toggleVisibility(input, icon) {
  icon.addEventListener("click", () => {
    const isPassword = input.getAttribute("type") === "password";
    input.setAttribute("type", isPassword ? "text" : "password");
    icon.src = isPassword ? "../image/eyeon-icon.svg" : "../image/eyeoff-icon.svg";
  });
}
toggleVisibility(passwordInput, togglePassword);
toggleVisibility(confirmInput, toggleConfirm);

// Password strength logic
passwordInput.addEventListener("input", () => {

  const value = passwordInput.value;
  let strength = 0;

  if (value.length >= 8) strength++;
  if (/[A-Z]/.test(value)) strength++;
  if (/[a-z]/.test(value)) strength++;
  if (/\d/.test(value)) strength++;

  if (value.length < 8 || strength <= 2) {
    strengthBar.style.width = "33%";
    strengthBar.style.backgroundColor = "red";
    strengthText.textContent = "Faible";
    strengthText.style.color = "red";
  } else if (strength === 3) {
    strengthBar.style.width = "66%";
    strengthBar.style.backgroundColor = "orange";
    strengthText.textContent = "Fort";
    strengthText.style.color = "orange";
  } else {
    strengthBar.style.width = "100%";
    strengthBar.style.backgroundColor = "green";
    strengthText.textContent = "Excellent";
    strengthText.style.color = "green";
  }
});

// Confirm password match
confirmInput.addEventListener("input", () => {
  if (confirmInput.value !== passwordInput.value) {
    matchError.textContent = "Les mots de passe ne sont pas identiques.";
  } else {
    matchError.textContent = "";
  }
});

// Validate date of birth (min 8 years)
form.addEventListener("submit", (e) => {
  const today = new Date();
  const birthDate = new Date(dateNaissance.value);
  const age = today.getFullYear() - birthDate.getFullYear();
  const monthDiff = today.getMonth() - birthDate.getMonth();
  const dayDiff = today.getDate() - birthDate.getDate();

  if (
    birthDate > today ||
    age < 8 ||
    (age === 8 && (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)))
  ) {
    e.preventDefault();
    alert("Vous devez avoir au moins 8 ans.");
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const telInput = document.querySelector("#tel");

  if (telInput) {
    const iti = window.intlTelInput(telInput, {
      initialCountry: "tg",
      preferredCountries: ["tg","bj", "ci", "ml", "bf", "sn"],
      onlyCountries: [
        "dz", "ao", "bj", "bw", "bf", "bi", "cm", "cv", "cf", "td", "km", "cd", "dj",
        "eg", "gq", "er", "et", "ga", "gm", "gh", "gn", "gw", "ci", "ke", "ls", "lr",
        "ly", "mg", "mw", "ml", "mr", "mu", "yt", "ma", "mz", "na", "ne", "ng", "re",
        "rw", "st", "sn", "sc", "sl", "so", "za", "ss", "sd", "sz", "tz", "tg", "tn",
        "ug", "eh", "zm", "zw"
      ],
      separateDialCode: true,
      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js",
    });
  }
});
