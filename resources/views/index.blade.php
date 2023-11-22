<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Kos </title>
    <script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-white dark:bg-gray-900">
    @include('partials.navbar')

    <!-- Hero section -->
    <section class="bg-white dark:bg-gray-900 px-20 py-8">
        <div class="flex justify-between gap-8">
            <div class="flex-1 flex flex-col justify-center">
                <h1 class="text-4xl text-gray-900 font-bold mb-6 dark:text-white">Kos Putra Tipayung 2</h1>
                <p class="text-2xl text-gray-500 font-medium mb-8 dark:text-gray-400">Segera rasakan atmosfer nyaman dan aman di kos kami. Ayo, cari kamar Anda sekarang!</p>
                <a href="#daftarKamar" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-xl px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 w-max">Cari kamar sekarang!</a>
            </div>
            <div>
                <img class="rounded-2xl" src="https://placehold.co/600x400" alt="Kos Tipayung 2">
            </div>
        </div>
    </section>

    <!-- Lokasi section -->
    <section id="lokasi" class="bg-white dark:bg-gray-900 px-20 py-8 mt-8">
        <h2 class="text-gray-900 dark:text-white text-3xl font-semibold text-center mb-9">Lokasi</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.4543291479133!2d110.8654164!3d-6.7920706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70dad2c0394f15%3A0xa1da0622ddd76581!2sCristal%20Es!5e0!3m2!1sen!2sid!4v1700620839202!5m2!1sen!2sid" class="w-4/5 h-[500px] rounded-2xl mx-auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    
    <!-- Daftar kamar section -->
    <section id="daftarKamar" class="bg-white dark:bg-gray-900 px-20 py-8 mt-8">
        <h2 class="text-gray-900 dark:text-white text-3xl font-semibold text-center mb-9">Daftar Kamar</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="" />
                </a>
                <div class="p-5">
                    <p class="text-gray-900 dark:text-white text-lg flex justify-between">Status<span class="font-semibold">Tersedia</span></p>
                    <p class="text-gray-900 dark:text-white text-lg flex justify-between">Harga <span class="font-semibold">Rp 300.000/bulan</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, nostrum.</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Lihat Detail
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="" />
                </a>
                <div class="p-5">
                    <p class="text-gray-900 dark:text-white text-lg flex justify-between">Status<span class="font-semibold">Tersedia</span></p>
                    <p class="text-gray-900 dark:text-white text-lg flex justify-between">Harga <span class="font-semibold">Rp 300.000/bulan</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, nostrum.</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Lihat Detail
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="" />
                </a>
                <div class="p-5">
                    <p class="text-gray-900 dark:text-white text-lg flex justify-between">Status<span class="font-semibold">Tersedia</span></p>
                    <p class="text-gray-900 dark:text-white text-lg flex justify-between">Harga <span class="font-semibold">Rp 300.000/bulan</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, nostrum.</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Lihat Detail
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="" />
                </a>
                <div class="p-5">
                    <p class="text-gray-900 dark:text-white text-lg flex justify-between">Status<span class="font-semibold">Tersedia</span></p>
                    <p class="text-gray-900 dark:text-white text-lg flex justify-between">Harga <span class="font-semibold">Rp 300.000/bulan</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, nostrum.</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Lihat Detail
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="" />
                </a>
                <div class="p-5">
                    <p class="text-gray-900 dark:text-white text-lg flex justify-between">Status<span class="font-semibold">Tersedia</span></p>
                    <p class="text-gray-900 dark:text-white text-lg flex justify-between">Harga <span class="font-semibold">Rp 300.000/bulan</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, nostrum.</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Lihat Detail
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="" />
                </a>
                <div class="p-5">
                    <p class="text-gray-900 dark:text-white text-lg flex justify-between">Status<span class="font-semibold">Tersedia</span></p>
                    <p class="text-gray-900 dark:text-white text-lg flex justify-between">Harga <span class="font-semibold">Rp 300.000/bulan</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, nostrum.</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Lihat Detail
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            
        </div>
    </section>

    @include('partials.footer')
</body>
</html>