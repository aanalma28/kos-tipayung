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

//-- javascript add-keuangan

document.getElementById("btn-pm").addEventListener("click", function() {
    const pm = document.getElementById("pm");
    const pl = document.getElementById("pl");

    pm.classList.add('hidden');
    pm.classList.remove('flex');
    pl.classList.add('flex');
    pl.classList.remove('hidden');
});

document.getElementById("btn-pl").addEventListener("click", function() {
    const pm = document.getElementById("pm");
    const pl = document.getElementById("pl");

    pl.classList.add('hidden');
    pl.classList.remove('flex');
    pm.classList.add('flex');
    pm.classList.remove('hidden');
});

// Calculate Total Pemasukan
document.getElementById("uang_rental").addEventListener("input", calculateTotalPemasukan);
document.getElementById("lain_lain_pemasukan").addEventListener("input", calculateTotalPemasukan);

function calculateTotalPemasukan() {
    const uangRental = parseFloat(document.getElementById("uang_rental").value) || 0;
    const lainLain = parseFloat(document.getElementById("lain_lain_pemasukan").value) || 0;
    
    const totalPemasukan = uangRental + lainLain;
    document.getElementById("total_pemasukan").value = totalPemasukan;
}

// Calculate Total Pengeluaran
document.getElementById("biaya_utilitas").addEventListener("input", calculateTotalPengeluaran);
document.getElementById("biaya_operasional").addEventListener("input", calculateTotalPengeluaran);
document.getElementById("biaya_lain_lain").addEventListener("input", calculateTotalPengeluaran);

function calculateTotalPengeluaran() {
    const biayaUtilitas = parseFloat(document.getElementById("biaya_utilitas").value) || 0;
    const biayaOperasional = parseFloat(document.getElementById("biaya_operasional").value) || 0;
    const biayaLainLain = parseFloat(document.getElementById("biaya_lain_lain").value) || 0;

    const totalPengeluaran = biayaUtilitas + biayaOperasional + biayaLainLain;
    document.getElementById("total_pengeluaran").value = totalPengeluaran;
}

// Script penyebutan
const bllpl = document.getElementById("biaya_lain_lain");
const bo = document.getElementById("biaya_operasional");
const bu = document.getElementById("biaya_utilitas");
const bllpm = document.getElementById("lain_lain_pemasukan");
const ur = document.getElementById("uang_rental");
const bllText = document.getElementById("bll-text");
const boText = document.getElementById("bo-text");
const buText = document.getElementById("bu-text");
const bllpmText = document.getElementById("bllpm-text");
const urText = document.getElementById("ur-text");

bllpl.addEventListener("input", function () {
    let angka = this.value;
    bllText.innerHTML = terbilang(angka) + " rupiah";
});
bllpm.addEventListener("input", function () {
    let angka = this.value;
    bllpmText.innerHTML = terbilang(angka) + " rupiah";
});
bo.addEventListener("input", function () {
    let angka = this.value;
    boText.innerHTML = terbilang(angka) + " rupiah";
});
bu.addEventListener("input", function () {
    let angka = this.value;
    buText.innerHTML = terbilang(angka) + " rupiah";
});
ur.addEventListener("input", function () {
    let angka = this.value;
    urText.innerHTML = terbilang(angka) + " rupiah";
});

function terbilang(angka) {
    if (angka < 0) return "minus " + terbilang(-angka);
    if (angka < 10) return satuan[angka];
    if (angka < 20) return belasan[angka - 10];
    if (angka < 100) return puluhan[Math.floor(angka / 10)] + (angka % 10 ? " " + satuan[angka % 10] : "");
    if (angka < 1000) return satuan[Math.floor(angka / 100)] + " ratus" + (angka % 100 ? " " + terbilang(angka % 100) : "");
    if (angka < 1000000) return terbilang(Math.floor(angka / 1000)) + " ribu" + (angka % 1000 ? " " + terbilang(angka % 1000) : "");
    return terbilang(Math.floor(angka / 1000000)) + " juta" + (angka % 1000000 ? " " + terbilang(angka % 1000000) : "");
}

const satuan = ["nol", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan"];
const belasan = ["sepuluh", "sebelas", "dua belas", "tiga belas", "empat belas", "lima belas", "enam belas", "tujuh belas", "delapan belas", "sembilan belas"];
const puluhan = ["", "", "dua puluh", "tiga puluh", "empat puluh", "lima puluh", "enam puluh", "tujuh puluh", "delapan puluh", "sembilan puluh"];