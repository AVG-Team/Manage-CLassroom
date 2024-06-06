import "./bootstrap";
import "./toast";
import "preline";

const navlinks = document.getElementById("navlinks");
const hamburger = document.getElementById("hamburger");
const layer = document.getElementById("navLayer");
const links = [...navlinks.querySelector("ul").children];
let isToggled = false;

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

document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll('[role="tab"]');
    const tabContents = document.querySelectorAll('[role="tabpanel"]');

    tabs.forEach((tab) => {
        tab.addEventListener("click", function () {
            // Remove active classes from all tabs and tab contents
            tabs.forEach((t) =>
                t.classList.remove(
                    "text-blue-600",
                    "bg-gray-100",
                    "active",
                    "hover:bg-gray-100",
                    "hover:text-blue-600",
                    "border-b-2",
                    "border-blue-600"
                )
            );
            tabContents.forEach((tc) => tc.classList.add("hidden"));

            // Add active class to the clicked tab and its associated tab content
            tab.classList.add(
                "text-blue-600",
                "bg-gray-100",
                "active",
                "hover:bg-gray-100",
                "hover:text-blue-600",
                "border-b-2",
                "border-blue-600"
            );
            const target = document.querySelector(
                tab.getAttribute("data-tabs-target")
            );
            target.classList.remove("hidden");
        });
    });

    // Trigger click on the first tab to set the initial state
    tabs[0].click();
});

const notifyBtn = document.getElementById("notifyBtn");
const notify = document.getElementById("notify");
const cancelBtn = document.getElementById("cancelBtn");

notifyBtn.addEventListener("click", () => {
    notifyBtn.classList.toggle("hidden");
    notify.classList.toggle("hidden");
});

cancelBtn.addEventListener("click", () => {
    notifyBtn.classList.toggle("hidden");
    notify.classList.toggle("hidden");
});

const exerciseBtns = document.getElementsByClassName("exerciseBtn");
const descriptions = document.getElementsByClassName("description");

Array.from(exerciseBtns).forEach((exerciseBtn, index) => {
    exerciseBtn.addEventListener("click", () => {
        descriptions[index].classList.toggle("hidden");
        if (descriptions[index].classList.contains("hidden")) {
            exerciseBtn.classList.remove("rounded-t-lg");
            exerciseBtn.classList.remove("bg-gray-200");
            exerciseBtn.classList.add("rounded-xl");
            exerciseBtn.classList.add("bg-white");
        } else {
            exerciseBtn.classList.remove("rounded-xl");
            exerciseBtn.classList.remove("bg-white");
            exerciseBtn.classList.add("rounded-t-lg");
            exerciseBtn.classList.add("bg-gray-200");
            console.log("clicked");
        }
    });
});

