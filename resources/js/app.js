import "./bootstrap";
import AOS from "aos";
import "aos/dist/aos.css";

AOS.init();
// document.addEventListener("DOMContentLoaded", function () {
//     var hamburger = document.getElementById("hamburger");
//     var openIcon = document.getElementById("open-icon");
//     var closeIcon = document.getElementById("close-icon");

//     hamburger.addEventListener("click", function () {
//         openIcon.classList.toggle("hidden");
//         closeIcon.classList.toggle("hidden");
//     });
// });

// navbar
let isToggled = false;
const navlinks = document.getElementById("navlinks");
const sidebarLinks = document.getElementById("sidebarLinks");
const hamburger = document.getElementById("hamburger");
const layer = document.getElementById("navLayer");
const links = [...navlinks.querySelector("ul").children];

function toggleNavlinks() {
    if (isToggled) {
        navlinks.classList.add(
            "!visible",
            "!scale-100",
            "!opacity-100",
            "!lg:translate-y-0"
        );
        hamburger.classList.add("toggled");
        layer.classList.add("origin-top", "scale-y-100");
    } else {
        navlinks.classList.remove(
            "!visible",
            "!scale-100",
            "!opacity-100",
            "!lg:translate-y-0"
        );

        hamburger.classList.remove("toggled");
        layer.classList.remove("origin-top", "scale-y-100");
    }
}
hamburger.addEventListener("click", () => {
    isToggled = !isToggled;
    toggleNavlinks();
});

links.forEach((link) => {
    link.addEventListener("click", () => {
        isToggled = !isToggled;
        toggleNavlinks();
    });
});
// end navbar

// sidebar
const sidebar = document.getElementById("subSidebar");
const subItem = document.getElementById("subItem");
const iconOpen = document.getElementById("iconOpen");
const iconClose = document.getElementById("iconClose");

function toggleSidebar() {
    if (isToggled) {
        subItem.classList.add("hidden");
        iconClose.classList.add("hidden");
        iconOpen.classList.remove("hidden");
    } else {
        subItem.classList.remove("hidden");
        iconClose.classList.remove("hidden");
        iconOpen.classList.add("hidden");
    }
}

sidebar.addEventListener("click", () => {
    isToggled = !isToggled;
    toggleSidebar();
});
