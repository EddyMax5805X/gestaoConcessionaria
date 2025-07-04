// visualizarVeiculo.js
document.addEventListener("DOMContentLoaded", () => {
    const perfil = document.body.getAttribute("data-perfil");

    if (perfil === "cliente") {
        const btnModificar = document.querySelector(".modify-btn");
        if (btnModificar) btnModificar.style.display = "none";

        const btnRemover = document.querySelector(".remove-btn");
        if (btnRemover) btnRemover.style.display = "none";
    }
});
