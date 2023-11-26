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

// currency

document.addEventListener("DOMContentLoaded", function () {
    formatCurrency();
});

function formatCurrency() {
    // Mendapatkan semua elemen dengan class "currency"
    var currencyElements = document.querySelectorAll(".currency");

    // Mengubah setiap elemen dengan class "currency"
    currencyElements.forEach(function (element) {
        var value = parseFloat(element.textContent.replace(/[^0-9.-]+/g, "")); // Mengambil nilai numerik
        var formattedValue = formatRupiah(value); // Mengubah nilai menjadi format Rupiah

        // Menetapkan teks yang sudah diformat ke dalam elemen
        element.textContent = formattedValue;
    });
}

function formatRupiah(value) {
    var formatter = new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    });

    return formatter.format(value);
}

// Function to navigate back
function goBack() {
    window.history.back();
}

// Add event listener when DOM content is loaded
document.addEventListener("DOMContentLoaded", function () {
    // Find the "Batal" button
    var cancelButton = document.getElementById("cancelButton");

    // Add click event listener
    cancelButton.addEventListener("click", function () {
        goBack();
    });
});
