const btnReset = document.getElementById("btnReset");
const btnSend = document.getElementById("btnSend");
const inputCode = document.getElementById("code");
const inputLibelle = document.querySelector("input[name=libelle]");
const inputDesc = document.querySelector("textarea[name=description]");

btnSend.addEventListener("click", (e) => {
  e.preventDefault();

  // Check code value
  if (inputCode.value === "") {
    alert("Champs Code vide");
    inputCode.style.borderColor = "red";
    inputCode.focus();
    return;
  }

  //Check Libelle value
  if (inputLibelle.value === "") {
    alert("Champs Libelle vide");
    inputLibelle.style.borderColor = "red";
    inputLibelle.focus();
    return;
  }

  //Check Description value
  if (inputDesc.value === "") {
    alert("Champs Description vide");
    inputDesc.style.borderColor = "red";
    inputDesc.focus();
    // Needn't add return if it's the end game
    return;
  }

  document.querySelector("form").submit();
});
