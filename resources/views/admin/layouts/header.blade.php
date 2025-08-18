<header class="h-16 bg-white fixed top-0 left-0 w-full z-20 border-b border-[#e5e7eb]">
    <div class="container mx-auto px-4 md:px-6 h-[inherit] flex items-center justify-between">
        <button class="lg:hidden" data-toggle-sidebar>
            <span class="material-symbols-outlined">menu</span>
        </button>
        <a href="{{ route('admin.home') }}">
            <img src="{{ asset('frontend/img/logo-amdd.png') }}" alt="logo" class="h-10">
        </a>
        
        <form action="{{ route('admin.logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 flex items-center gap-x-1" >
                <span class="material-symbols-outlined text-base">logout</span>
                Déconnexion
            </button>
        </form>
    </div>
</header>