window.onresize = function() {
    // Collapse Navbar
    var navbar = document.getElementById("navbar");
    navbar.classList.remove("nav-expand");

    // Change nav control to hamburger
    var navicon = document.getElementById("nav-control-icon");
    navicon.classList.add("fa-bars");
    navicon.classList.remove("fa-chevron-up");
}

function toggleNav() {
    // Toggle Navbar
    var navbar = document.getElementById("navbar");
    navbar.classList.toggle("nav-expand");

    // Toggle nav control b/w hamburger and x
    var navicon = document.getElementById("nav-control-icon");
    navicon.classList.toggle("fa-bars");
    navicon.classList.toggle("fa-chevron-up"); 
}

function toggleNavMenu(el) {
    el.parentElement.classList.toggle("nav-menu-expand");
    el.childNodes[1].classList.toggle("fa-chevron-down");
    el.childNodes[1].classList.toggle("fa-chevron-up");
}