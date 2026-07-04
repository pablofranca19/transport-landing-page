function verifyFields() {
    let name = document.getElementById("nome").value.trim();
    let email = document.getElementById("email").value.trim();
    let blankName = document.getElementById("blank-name");
    let blankEmail = document.getElementById("blank-email");

    let isValid = true;

    if (name === "") {
        blankName.textContent = "O campo 'nome' está em branco!";
        isValid = false;
    } else {
        blankName.textContent = "";
    }

    if (email === "") {
        blankEmail.textContent = "O campo 'email' está em branco!";
        isValid = false;
    } else {
        blankEmail.textContent = "";
    }

    if (isValid) {
        document.querySelector("form").submit();
    }
}