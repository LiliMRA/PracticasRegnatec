const sideMenu = document.getElementById('side-menu');
const mainMenu = document.getElementById('menu');

sideMenu.addEventListener('click', () => {
    mainMenu.classList.toggle('menu--show');
})