document.getElementById("form").addEventListener("submit", function (event) {
    let isValid = true;

    const username = document.getElementById("username");
    const email = document.getElementById("email");
    const telefone = document.getElementById("telefone");
    const estado = document.getElementById("estado");

    document.querySelectorAll(".error-message").forEach(msg => msg.innerText = "");

    if (username.value.trim() === "") {
        showError(username, "O nome é obrigatório.");
        isValid = false;
    }

    if (email.value.trim() === "") {
        showError(email, "O e-mail é obrigatório.");
        isValid = false;
    } else if (!validateEmail(email.value)) {
        showError(email, "E-mail inválido.");
        isValid = false;
    }

    if (telefone.value.trim() === "") {
        showError(telefone, "O telefone é obrigatório.");
        isValid = false;
    }

    if (estado.value === "") {
        showError(estado, "Selecione um estado.");
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault();
    }
});

function showError(input, message) {
    const errorMessage = input.nextElementSibling;
    errorMessage.innerText = message;
    errorMessage.style.color = "red";
}

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}
