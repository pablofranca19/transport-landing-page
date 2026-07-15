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

function scrollToSection(selector) {
  const el = document.querySelector(selector);
  const headerHeight = document.querySelector('header').offsetHeight;
  const top = el.getBoundingClientRect().top + window.scrollY - headerHeight;
  window.scrollTo({ top, behavior: 'smooth' });
}

document.querySelector('#inicio-botao').addEventListener("click", () => scrollToSection('#inicio'));
document.querySelector('#quem-somos-botao').addEventListener("click", () => scrollToSection('#quem-somos'));
document.querySelector('#servicos-botao').addEventListener("click", () => scrollToSection('#nossos-serviços'));
document.querySelector('#contato-botao').addEventListener("click", () => scrollToSection('#fale-conosco'));