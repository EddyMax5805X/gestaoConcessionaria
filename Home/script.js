document.addEventListener("DOMContentLoaded", () => {
    const perfil = document.body.getAttribute("data-perfil");

    if (perfil === "usuario") {
        // Seleciona todos os botões com a classe 'btn-atualizar'
        const cliente = document.getElementById("btnClientes");
        const venda = document.getElementById("btnVendas");

        cliente.style.display = "none";
        venda.style.display = "none";
    }
});
document.addEventListener("DOMContentLoaded", function() {
    const sidebar = document.querySelector('#mySidebar');
    const content = document.querySelector('.main-content');
    const menuItems = document.querySelectorAll('#menuItem');
    const initialWidth = '5vw';
    const expandedWidth = '18vw';
    
    const link1 = document.querySelector('.link1');
    const link2 = document.querySelector('.link2');
    const link3 = document.querySelector('.link3');
    const link4 = document.querySelector('.link4');
    const link5 = document.querySelector('.link5');

    const linkHome = document.querySelector('#linkHome');
    const perfilInfo = document.querySelector('.perfil-info');

    sidebar.addEventListener('mouseenter', function() {
        sidebar.style.width = expandedWidth;
        content.style.marginLeft = '21vw';
        linkHome.style.fontSize = '2.5rem';
        perfilInfo.style.display = 'block';
        link1.querySelector('.links-text').style.display = 'inline';
        link2.querySelector('.links-text').style.display = 'inline';
        link3.querySelector('.links-text').style.display = 'inline';
        link4.querySelector('.links-text').style.display = 'inline';
        link5.querySelector('.links-text').style.display = 'inline';
    });
    sidebar.addEventListener('mouseleave', function() {
        sidebar.style.width = initialWidth;
        content.style.marginLeft = '8vw';
        linkHome.style.fontSize = '1.5rem';
        perfilInfo.style.display = 'none';
        link1.querySelector('.links-text').style.display = 'none';
        link2.querySelector('.links-text').style.display = 'none';
        link3.querySelector('.links-text').style.display = 'none';
        link4.querySelector('.links-text').style.display = 'none';
        link5.querySelector('.links-text').style.display = 'none';
        closeAllSubmenus();
    });
    menuItems.forEach(element => {
        element.addEventListener('click', function(event) {
            event.preventDefault();
            const targetId = this.dataset.target;
            const submenu = document.getElementById(targetId);
            if (submenu) {
                closeOtherSubmenus(submenu);
                if (submenu.classList.contains('open')) {
                    submenu.classList.remove('open');
                    submenu.style.maxHeight = '0';
                } else {
                    submenu.classList.add('open');
                    submenu.style.maxHeight = '200px';
                }
            }
        })
    });
    function closeOtherSubmenus(openedSubmenu) {
        const submenus = document.querySelectorAll('.submenu');
        submenus.forEach(submenu => {
            if (submenu !== openedSubmenu && submenu.classList.contains('open')) {
                submenu.classList.remove('open');
                submenu.style.maxHeight = '0';
            }
        });
    }
    function closeAllSubmenus() {
        const submenus = document.querySelectorAll('.submenu');
        submenus.forEach(submenu => {
            submenu.classList.remove('open');
            submenu.style.maxHeight = '0';
        });
    }
});