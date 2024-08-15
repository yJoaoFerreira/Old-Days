let senha = document.getElementById('password');
let senhaC = document.getElementById('confirm-password');

function verificarSenhas() {
  if (senha.value != senhaC.value) {
    senhaC.setCustomValidity("Senhas diferentes!");
    senhaC.reportValidity();
    return false;
  } else {
    senhaC.setCustomValidity("");
    return true;
  }
}

senhaC.addEventListener('input', verificarSenhas);