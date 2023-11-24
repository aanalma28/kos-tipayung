<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Kos | Form Tambah Kamar</title>
    <style>
        input[type="number"] {
            -moz-appearance: textfield;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
        
        function toggleVisibility(elementToShow, elementToHide) {
            elementToHide.classList.add('hidden');
            elementToHide.classList.remove('flex');
            elementToShow.classList.add('flex');
            elementToShow.classList.remove('hidden');
        }

        function toPengeluaran() {
            const pm = document.getElementById("pm");
            const pl = document.getElementById("pl");
            toggleVisibility(pl, pm);
        }

        function toPemasukan() {
            const pm = document.getElementById("pm");
            const pl = document.getElementById("pl");
            toggleVisibility(pm, pl);
        }
    </script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-white dark:bg-gray-900">
    @include('partials.navbar')
<div id="top"></div>
<form action="">
    <!-- Section input data pemasukan -->
    <section id="pm" class="px-4 md:px-20 py-4 flex items-center justify-center">
        <div class="py-8 px-4 border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 rounded shadow-md w-fit">
            <div class="px-4 py-4 min-h-fit border-solid border-slate-700 rounded-lg">
                <h1 class="w-full md:w-[450px] text-4xl font-semibold text-gray-700 dark:text-white">Input Data Pemasukan</h1>
                <p class="text-lg w-full text-gray-600 dark:text-gray-300">Isi Formulir berikut untuk input data pemasukan...</p>
                <div class="py-8">
                    <div title="Form Untuk Input Data Pemasukan" class="mt-8 max-w-sm mx-auto">
                        <!-- Input Bulan -->
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-200 mb-2" for="bulan_pemasukan">
                                Bulan *
                            </label>
                            <input required name="bulan_pemasukan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="bulan_pemasukan" type="text" placeholder="Bulan">
                        </div>

                        <!-- Input Tahun -->
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-200 mb-2" for="tahun_pemasukan">
                                Tahun *
                            </label>
                            <input required name="tahun_pemasukan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="tahun_pemasukan" type="text" placeholder="Tahun">
                        </div>

                        <!-- Input Uang Rental -->
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-200 mb-2" for="uang_rental">
                                Uang Rental *
                            </label>
                            <input required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="uang_rental" name="uang_rental" type="number" placeholder="Uang Rental">
                            <p href="#" title="Penyebutan Harga" id="ur-text" class="text-gray-600 text-sm italic"></p>
                        </div>

                        <!-- Input Lain-Lain -->
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-200 mb-2" for="lain_lain_pemasukan">
                                Lain-Lain *
                            </label>
                            <input required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="lain_lain_pemasukan" name="lain_lain_pemasukan" type="number" placeholder="Lain-Lain">
                            <p href="#" title="Penyebutan Harga" id="bllpm-text" class="text-gray-600 text-sm italic"></p>
                        </div>

                        <!-- Total Pemasukan -->
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-200 mb-2">
                                Total Pemasukan
                            </label>
                            <span class="text-gray-900 w-[20px] dark:text-gray-200 text-sm">Rp.</span><input id="total_pemasukan" name="total_pemasukan" type="number" class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ml-1" readonly>
                        </div>
                        <div class="grid grid-cols-2 gap-8">
                            <button
                                class="w-full px-4 py-2 mt-4 text-white bg-green-500 rounded hover:bg-green-700 opacity-0"> </button>
                            <a id="btn-pl" onclick="toPengeluaran()" href="#top"
                                class="cursor-pointer w-full px-4 py-2 mt-4 text-white bg-green-500 rounded hover:bg-green-700">Input Pengeluaran</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Calculate Total Pemasukan
        document.getElementById("uang_rental").addEventListener("input", calculateTotalPemasukan);
        document.getElementById("lain_lain_pemasukan").addEventListener("input", calculateTotalPemasukan);

        function calculateTotalPemasukan() {
            const uangRental = parseFloat(document.getElementById("uang_rental").value) || 0;
            const lainLain = parseFloat(document.getElementById("lain_lain_pemasukan").value) || 0;

            const totalPemasukan = uangRental + lainLain;
            document.getElementById("total_pemasukan").value = formatCurrency(totalPemasukan);
        }

        function formatCurrency(amount) {
            return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
    <!-- Section input data pengeluaran -->
    <section id="pl" class="px-4 md:px-20 py-4 hidden items-center justify-center">
    <div class="py-8 px-4 border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 rounded shadow-md w-fit">
        <div class="px-4 py-4 min-h-fit border-solid border-slate-700 rounded-lg">
            <h1 class="w-full md:w-[450px] text-4xl font-semibold text-gray-700 dark:text-white">Input Data Pengeluaran</h1>
            <p class="text-lg w-full text-gray-600 dark:text-gray-300">Isi Formulir berikut untuk input data pengeluaran...</p>
            <div class="py-8">
                <div title="Form Untuk Input Data Pengeluaran" class="mt-8 max-w-sm mx-auto">
                    <!-- Input Bulan -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 mb-2" for="bulan_pengeluaran">
                            Bulan *
                        </label>
                        <input required name="bulan_pengeluaran"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            id="bulan_pengeluaran" type="text" placeholder="Bulan">
                    </div>

                    <!-- Input Tahun -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 mb-2" for="tahun_pengeluaran">
                            Tahun *
                        </label>
                        <input required name="tahun_pengeluaran"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            id="tahun_pengeluaran" type="text" placeholder="Tahun">
                    </div>

                    <!-- Input Biaya Utilitas -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 mb-2" for="biaya_utilitas">
                            Biaya Utilitas *
                        </label>
                        <input required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            id="biaya_utilitas" name="biaya_utilitas" type="number" placeholder="Biaya Utilitas">
                        <p href="#" title="Penyebutan Harga" id="bu-text" class="text-gray-600 text-sm italic"></p>
                    </div>

                    <!-- Input Biaya Operasional -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 mb-2" for="biaya_operasional">
                            Biaya Operasional *
                        </label>
                        <input required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            id="biaya_operasional" name="biaya_operasional" type="number" placeholder="Biaya Operasional">
                        <p href="#" title="Penyebutan Harga" id="bo-text" class="text-gray-600 text-sm italic"></p>
                    </div>

                    <!-- Input Biaya Lain-Lain -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 mb-2" for="biaya_lain_lain">
                            Lain-Lain
                        </label>
                        <input required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            id="biaya_lain_lain" name="biaya_lain_lain" type="number" placeholder="Lain-Lain">
                        <p href="#" title="Penyebutan Harga" id="bll-text" class="text-gray-600 text-sm italic"></p>
                    </div>

                    <!-- Total Pengeluaran -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 mb-2">
                            Total Pengeluaran
                        </label>
                        <span class="text-gray-900 w-[20px] dark:text-gray-200 text-sm">Rp.</span><input id="total_pengeluaran" name="total_pengeluaran" type="number" class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ml-1" readonly>
                    </div>
                    <div class="grid grid-cols-2 gap-8">
                        <a id="btn-pm" onclick="toPemasukan()" href="#top" 
                                class="cursor-pointer w-full px-4 py-2 mt-4 text-white bg-green-500 rounded hover:bg-green-700">Input Pemasukan</a>
                        <button type="submit" 
                            class="cursor-pointer w-full px-4 py-2 mt-4 text-white bg-green-500 rounded hover:bg-green-700">Save Data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
<script>
    // Calculate Total Pengeluaran
    document.getElementById("biaya_utilitas").addEventListener("input", calculateTotalPengeluaran);
    document.getElementById("biaya_operasional").addEventListener("input", calculateTotalPengeluaran);
    document.getElementById("biaya_lain_lain").addEventListener("input", calculateTotalPengeluaran);

    function calculateTotalPengeluaran() {
        const biayaUtilitas = parseFloat(document.getElementById("biaya_utilitas").value) || 0;
        const biayaOperasional = parseFloat(document.getElementById("biaya_operasional").value) || 0;
        const biayaLainLain = parseFloat(document.getElementById("biaya_lain_lain").value) || 0;

        const totalPengeluaran = biayaUtilitas + biayaOperasional + biayaLainLain;
        document.getElementById("total_pengeluaran").value = formatCurrency(totalPengeluaran);
    }
</script>
    @include('partials.footer')
    <!-- script penyebutan -->
    <script>
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

    </script>
</body>
</html>
