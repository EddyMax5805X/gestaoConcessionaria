// listarVeiculos.js
document.addEventListener("DOMContentLoaded", () => {
    const perfil = document.body.getAttribute("data-perfil");

    if (perfil === "usuario") {
        // Seleciona todos os botões com a classe 'btn-atualizar'
        const botoesModificar = document.querySelectorAll(".btn-atualizar");

        botoesModificar.forEach(botao => {
            botao.style.display = "none";
        });
    }
});
