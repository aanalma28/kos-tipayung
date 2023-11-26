import "./bootstrap";
import "flowbite";

var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
var themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");

// Change the icons inside the button based on previous settings
if (
    localStorage.getItem("color-theme") === "dark" ||
    (!("color-theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    themeToggleLightIcon.classList.remove("hidden");
} else {
    themeToggleDarkIcon.classList.remove("hidden");
}

var themeToggleBtn = document.getElementById("theme-toggle");

themeToggleBtn.addEventListener("click", function () {
    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle("hidden");
    themeToggleLightIcon.classList.toggle("hidden");

    // if set via local storage previously
    if (localStorage.getItem("color-theme")) {
        if (localStorage.getItem("color-theme") === "light") {
            document.documentElement.classList.add("dark");
            localStorage.setItem("color-theme", "dark");
        } else {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("color-theme", "light");
        }

        // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains("dark")) {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("color-theme", "light");
        } else {
            document.documentElement.classList.add("dark");
            localStorage.setItem("color-theme", "dark");
        }
    }
});

       // Update title based on URL path
       document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            updatePageTitle();
        }, 1000); // Delay 1 detik
    });

    // Function to update page title
    function updatePageTitle() {
        var path = window.location.pathname;
        var title = "Dashboard"; // Default title

        // Set title based on the last segment of the URL path
        var pathSegments = path.split('/').filter(function (segment) {
            return segment.trim() !== '';
        });

        if (pathSegments.length > 0) {
            title = pathSegments[pathSegments.length - 1];
        }

        document.getElementById('pageTitle').innerText = title;
    }

    // Listen to changes in the URL (e.g., when navigating between pages)
    window.addEventListener('popstate', function () {
        setTimeout(function () {
            updatePageTitle();
        }, 1000);
    });

