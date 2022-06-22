const menu = document.getElementsByClassName('menu')[0]
const navLinks = document.getElementsByClassName('nav-links')[0]

menu.addEventListener('click', () => {
    navLinks.classList.toggle('active')
})