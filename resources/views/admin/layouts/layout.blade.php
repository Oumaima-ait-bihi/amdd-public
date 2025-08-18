<!DOCTYPE html>
<html lang="zxx" class="js overflow-hidden">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Analytics Dashboard | DashLite Admin Template</title>
    @vite(['resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


</head>

<body class="min-h-screen">
    <!-- Preloader -->
    <div id="preloader"
        class="fixed inset-0 bg-white flex items-center justify-center z-50 transition-opacity duration-500 ease-in-out">
        <div class="relative flex items-center justify-center">
            <!-- Outer Ring with Violet-Blue Gradient -->
            <div
                class="animate-spin rounded-full h-24 w-24 border-4 border-t-transparent border-b-transparent border-l-violet-500 border-r-blue-500 bg-gradient-to-r from-violet-500 via-blue-500 to-violet-500 opacity-20">
            </div>

            <!-- Inner Spinner -->
            <div
                class="absolute animate-spin-slow rounded-full h-16 w-16 border-4 border-t-violet-400 border-b-blue-400 border-l-transparent border-r-transparent shadow-lg">
            </div>

            <!-- Pulsing Dot -->
            <div class="absolute h-4 w-4 bg-violet-600 rounded-full animate-pulse shadow-md"></div>
        </div>
    </div>

    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-10 hidden lg:hidden" data-toggle-sidebar>
    </div>
    <main class="p-4 lg:px-7 lg:pb-7 lg:pl-[340px] pt-20 bg-[#f5f6fa] text-[#657fa4] min-h-screen">
        @yield('content')
    </main>
    @include('admin.components.modal')
    <script>
        const style = document.createElement('style');
        style.textContent = `
                    @keyframes spin-slow {
                        0% { transform: rotate(0deg); }
                        100% { transform: rotate(360deg); }
                    }
                    .animate-spin-slow {
                        animation: spin-slow 2s linear infinite;
                    }
                `;
        document.head.appendChild(style);

        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            const html = document.documentElement; // <html> element
            preloader.classList.add('opacity-0');
            setTimeout(() => {
                preloader.style.display = 'none';
                html.classList.remove('overflow-hidden'); // Restores scrolling
            }, 500);
        });
    </script>

    <!-- Include your JS files -->
    @stack('scripts')
</body>

</html>
