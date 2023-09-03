var signup = document.getElementById('signup')
var login = document.getElementById('login')
 
signup.onclick = function(e){
  e.target.className = e.target.className.replace('levelDown','levelUp')
  login.className = login.className.replace('levelUp','levelDown')
}
 
login.onclick = function(e){
  e.target.className = e.target.className.replace('levelDown','levelUp')
  signup.className = signup.className.replace('levelUp','levelDown')
}

function togglePasswordField() {
  var passwordField = document.getElementById("inputPassword");
  var toggleButton = document.getElementById("togglePassword");

  if (passwordField.type === "password") {
    passwordField.type = "text";
    toggleButton.textContent = "Ocultar";
  } else {
    passwordField.type = "password";
    toggleButton.textContent = "Mostrar";
  }
}


