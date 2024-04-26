function openPopup() {
  document.getElementById("login-popup").style.display = "block";
}

function closePopup() {
  document.getElementById("login-popup").style.display = "none";
}

window.onclick = function(event) {
if (event.target == document.getElementById("login-popup")) {
  document.getElementById("login-popup").style.display = "none";
}
}