document.addEventListener("DOMContentLoaded", () => {
    const perfil = document.body.getAttribute("data-perfil");

    if (perfil === "cliente") {
        // Seleciona todos os botões com a classe 'btn-atualizar'
        const cliente = document.getElementById("btnClientes");
        const venda = document.getElementById("btnVendas");

        cliente.style.display = "none";
        venda.style.display = "none";
    }
});