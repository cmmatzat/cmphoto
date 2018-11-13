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
    adjustNavHeight();

    // Toggle nav control b/w hamburger and x
    var navicon = document.getElementById("nav-control-icon");
    navicon.classList.toggle("fa-bars");
    navicon.classList.toggle("fa-chevron-up");
}

function toggleNavMenu(el) {
    var nav_menu = parentWithClass(el, "nav-menu");
    nav_menu.classList.toggle("nav-menu-expand");
    adjustNavMenuHeight(nav_menu);

    var icon = el.querySelectorAll("i")[0];
    icon.classList.toggle("fa-chevron-down");
    icon.classList.toggle("fa-chevron-up");
}

function parentWithClass(el, classname) {
    while (el != document.getRootNode && !el.classList.contains(classname)) {
        el = el.parentElement;
    }
    return el;
}

function adjustNavHeight() {
    var navbar = document.getElementById("navbar");
    if (navbar.classList.contains("nav-expand")) {
        var nav_link_count = document.getElementsByClassName("nav-link").length;
        var open_nav_menu_link_count = document.querySelectorAll(".nav-menu-expand .nav-menu-link").length;
        var nav_height = (40 + (nav_link_count * 40) + (open_nav_menu_link_count * 32)).toString() + "px";
        navbar.style.height = nav_height;
    } else {
        navbar.style.height = "40px";
    }
}

function adjustNavMenuHeight(menu) {
    if (menu.classList.contains("nav-menu-expand")) {
        var menu_link_count = menu.querySelectorAll(".nav-menu-link").length;
        var menu_height = (40 + (menu_link_count * 32)).toString() + "px";
        menu.style.height = menu_height;
    } else {
        menu.style.height = "40px";
    }
    adjustNavHeight();
}