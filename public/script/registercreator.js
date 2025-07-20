// script.js pour page d'inscription OgunBook

// === 1. Validation de la date de naissance ===
const dateNaissance = document.getElementById("dateNaissance");
const signupForm = document.getElementById("signupForm");

function getAge(birthDate) {
  const today = new Date();
  let age = today.getFullYear() - birthDate.getFullYear();
  const m = today.getMonth() - birthDate.getMonth();
  if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
    age--;
  }
  return age;
}

// === 2. intl-tel-input pour numéro de téléphone ===
document.addEventListener("DOMContentLoaded", function () {
  const phoneInputField = document.querySelector("#telephone");
  if (phoneInputField) {
    window.intlTelInput(phoneInputField, {
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
      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.min.js",
    });
  }
});

// === 3. Toggle œil mot de passe ===
function togglePasswordVisibility(inputId, iconId) {
  const input = document.getElementById(inputId);
  const icon = document.getElementById(iconId);

  icon.addEventListener("click", () => {
    if (input.type === "password") {
      input.type = "text";
      icon.src = "../image/eyeon-icon.svg";
    } else {
      input.type = "password";
      icon.src = "../image/eyeoff-icon.svg";
    }
  });
}

togglePasswordVisibility("motdepasse", "togglePassword");
togglePasswordVisibility("confirmPassword", "toggleConfirm");

// === 4. Évaluation force mot de passe ===
const passwordInput = document.getElementById("motdepasse");
const strengthBar = document.getElementById("strengthBar");
const strengthText = document.getElementById("strengthText");

passwordInput.addEventListener("input", () => {
  const val = passwordInput.value;
  let strength = 0;
  let color = "red";
  let text = "Faible";

  if (val.length >= 8) strength++;
  if (/[a-z]/.test(val)) strength++;
  if (/[A-Z]/.test(val)) strength++;
  if (/\d/.test(val)) strength++;

  switch (strength) {
    case 1:
      color = "red";
      text = "Très faible";
      strengthBar.style.width = "20%";
      break;
    case 2:
      color = "orange";
      text = "Moyen";
      strengthBar.style.width = "50%";
      break;
    case 3:
      color = "#9ACD32";
      text = "Bon";
      strengthBar.style.width = "75%";
      break;
    case 4:
      color = "green";
      text = "Excellent";
      strengthBar.style.width = "100%";
      break;
    default:
      strengthBar.style.width = "0%";
  }
  strengthBar.style.backgroundColor = color;
  strengthText.textContent = text;
  strengthText.style.color = color;
});

// === 5. Vérification confirmation mot de passe ===
const confirmPassword = document.getElementById("confirmPassword");
const matchError = document.getElementById("matchError");

function validatePasswordMatch() {
  if (confirmPassword.value !== passwordInput.value) {
    matchError.textContent = "Les mots de passe ne correspondent pas.";
    return false;
  } else {
    matchError.textContent = "";
    return true;
  }
}

confirmPassword.addEventListener("input", validatePasswordMatch);
passwordInput.addEventListener("input", validatePasswordMatch);

// === 6 & 7. Validation complète du formulaire ===
signupForm.addEventListener("submit", function (e) {
  const birthDate = new Date(dateNaissance.value);
  const age = getAge(birthDate);

  const isPasswordMatch = validatePasswordMatch();
  const checkbox = document.getElementById("conditions");

  let passwordValue = passwordInput.value;
  const hasMinLength = passwordValue.length >= 8;
  const hasLower = /[a-z]/.test(passwordValue);
  const hasUpper = /[A-Z]/.test(passwordValue);
  const hasDigit = /\d/.test(passwordValue);
  const passwordStrong = hasMinLength && hasLower && hasUpper && hasDigit;

  if (!dateNaissance.value || isNaN(birthDate.getTime())) {
    alert("Veuillez entrer une date de naissance valide.");
    return e.preventDefault();
  }

  if (birthDate >= new Date()) {
    alert("La date de naissance ne peut pas être dans le futur ou aujourd’hui.");
    return e.preventDefault();
  }

  if (age < 12) {
    alert("Vous devez avoir au moins 12 ans pour vous inscrire.");
    return e.preventDefault();
  }

  if (!passwordStrong) {
    alert("Mot de passe trop faible. Il doit contenir au moins 8 caractères, une minuscule, une majuscule et un chiffre.");
    return e.preventDefault();
  }

  if (!isPasswordMatch) {
    alert("Les mots de passe ne correspondent pas.");
    return e.preventDefault();
  }

  if (!checkbox.checked) {
    alert("Vous devez accepter les conditions d'utilisation pour continuer.");
    return e.preventDefault();
  }
});
