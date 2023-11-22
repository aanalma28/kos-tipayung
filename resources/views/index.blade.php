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

    <section class="bg-white dark:bg-gray-900 px-20 py-8">
        <div class="flex justify-between gap-8">
            <div class="flex-1 flex flex-col justify-center">
                <h2 class="text-4xl text-gray-900 font-bold mb-6 dark:text-white">Kos Putra Tipayung 2</h2>
                <p class="text-2xl text-gray-500 font-medium mb-8 dark:text-gray-400">Segera rasakan atmosfer nyaman dan aman di kos kami. Ayo, cari kamar Anda sekarang!</p>
                <a class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 w-max">Cari kamar sekarang!</a>
            </div>
            <div>
                <img class="rounded-2xl" src="https://placehold.co/600x400" alt="Kos Tipayung 2">
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>