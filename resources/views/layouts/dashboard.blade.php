<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    @if(Request::is('dashboard'))
            Dashboard |
        @elseif(Request::is('akun'))
            Akun |
        @elseif(Request::is('room'))
            Kamar |
        @elseif(Request::is('user'))
            Akun Penyewa |
        @elseif(Request::is('reports'))
            Laporan Keuangan |
        @elseif(Request::is('calculate'))
            Perhitungan Keuangan |
        @else

        @endif {{ auth()->user()->role === 'owner' ? 'Owner' : 'Penyewa' }} | Sistem manajemen kos</title>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
        window.imgurClientId = atob("{{ base64_encode(env('IMGUR_CLIENT_ID')) }}");
    </script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class=" bg-white dark:bg-gray-900">
    @includeWhen(auth()->user()->role === 'penyewa', 'partials.sidebarPenyewa')
    @includeWhen(auth()->user()->role === 'owner', 'partials.sidebarOwner')
    <div class="p-4 sm:ml-64 ">
        <div class="p-4 mt-14">
            @yield('content')
        </div>
    </div>
    @include('partials.footer')
</body>

</html>
