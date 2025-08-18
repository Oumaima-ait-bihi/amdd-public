<!-- Sidebar -->
<aside class="w-80 max-w-full bg-white fixed top-16 left-0 bottom-0 h-screen z-20 border-r border-[#e5e7eb] text-[#657fa4] duration-300 -translate-x-full lg:translate-x-0 sidebar">
    <div class="h-10 flex items-center px-4 border-b border-gray-200">
        <h2 class="font-semibold uppercase tracking-wide text-[#364a63]">Dashboards</h2>
    </div>
    <nav class="p-6 grid grid-cols-1 gap-2">
        <a href="{{ route('admin.home') }}">
            <div class="flex items-center px-4 py-2 rounded-lg transition-all duration-300 ease-in-out cursor-pointer bg-slate-100 hover:bg-blue-100 hover:text-violet-500 font-medium mb-1">
                <span class="material-symbols-outlined mr-3 text-lg">dashboard</span>
                <span>Dashboard AMDD</span>
            </div>
        </a>


        <div class="menu-item">
            <div class="flex items-center px-4 py-2 rounded-lg transition-all duration-300 ease-in-out cursor-pointer bg-slate-100 hover:bg-blue-100 hover:text-violet-500 font-medium mb-1" onclick="toggleSubmenu(this)">
                <span class="material-symbols-outlined mr-3 text-lg">event</span> Evénements AMDD
                <span class="material-symbols-outlined ml-auto transition-transform duration-300">expand_more</span>
            </div>
            <div class="submenu max-h-0 overflow-hidden transition-all duration-300 pl-8 space-y-2">
                <a href="{{route('admin.evenements.create')}}" class="submenu-item block py-2 px-4 transition-all duration-300 ease-in-out text-sm font-medium hover:bg-blue-100 hover:text-violet-500 rounded-lg bg-slate-100">Ajouter un événement</a>
                <a href="{{route('admin.evenements.index')}}" class="submenu-item block py-2 px-4 transition-all duration-300 ease-in-out text-sm font-medium hover:bg-blue-100 hover:text-violet-500 rounded-lg bg-slate-100">Afficher les événements</a>
            </div>
        </div>

        <div class="menu-item">
            <div class="flex items-center px-4 py-2 rounded-lg tranition-all duration-300 ease-in-out cursor-pointer bg-slate-100 hover:bg-blue-100 hover:text-violet-500 font-medium mb-1" onclick="toggleSubmenu(this)">
                <span class="material-symbols-outlined mr-3 text-lg">local_activity</span> Activités AMDD
                <span class="material-symbols-outlined ml-auto transition-transform duration-300">expand_more</span>
            </div>
            <div class="submenu max-h-0 overflow-hidden transition-all duration-300 pl-8 space-y-2">
                <a href="{{route('admin.activities.create')}}" class="submenu-item block py-2 px-4 transition-all duration-300 ease-in-out text-sm font-medium hover:bg-blue-100 hover:text-violet-500 rounded-lg bg-slate-100">Ajouter une activité</a>
                <a href="{{route('admin.activities.index')}}" class="submenu-item block py-2 px-4 transition-all duration-300 ease-in-out text-sm font-medium hover:bg-blue-100 hover:text-violet-500 rounded-lg bg-slate-100">Afficher les activités</a>
            </div>
        </div>

        <div class="menu-item">
            <div class="flex items-center px-4 py-2 rounded-lg tranition-all duration-300 ease-in-out cursor-pointer bg-slate-100 hover:bg-blue-100 hover:text-violet-500 font-medium mb-1" onclick="toggleSubmenu(this)">
                <span class="material-symbols-outlined mr-3 text-lg">campaign</span> Annonces AMDD
                <span class="material-symbols-outlined ml-auto transition-transform duration-300">expand_more</span>
            </div>
            <div class="submenu max-h-0 overflow-hidden transition-all duration-300 pl-8 space-y-2">
                <a href="{{route('admin.annonces.create')}}" class="submenu-item block py-2 px-4 transition-all duration-300 ease-in-out text-sm font-medium hover:bg-blue-100 hover:text-violet-500 rounded-lg bg-slate-100">Ajouter une annonce</a>
                <a href="{{route('admin.annonces.index')}}" class="submenu-item block py-2 px-4 transition-all duration-300 ease-in-out text-sm font-medium hover:bg-blue-100 hover:text-violet-500 rounded-lg bg-slate-100">Afficher les annonces</a>
            </div>
        </div>

        <div class="menu-item">
            <div class="flex items-center px-4 py-2 rounded-lg tranition-all duration-300 ease-in-out cursor-pointer bg-slate-100 hover:bg-blue-100 hover:text-violet-500 font-medium mb-1" onclick="toggleSubmenu(this)">
                <span class="material-symbols-outlined mr-3 text-lg">group</span> Membres AMDD
                <span class="material-symbols-outlined ml-auto transition-transform duration-300">expand_more</span>
            </div>
            <div class="submenu max-h-0 overflow-hidden transition-all duration-300 pl-8 space-y-2">
                <a href="{{route('admin.members.create')}}" class="submenu-item block py-2 px-4 transition-all duration-300 ease-in-out text-sm font-medium hover:bg-blue-100 hover:text-violet-500 rounded-lg bg-slate-100">Ajouter un membre</a>
                <a href="{{route('admin.members.index')}}" class="submenu-item block py-2 px-4 transition-all duration-300 ease-in-out text-sm font-medium hover:bg-blue-100 hover:text-violet-500 rounded-lg bg-slate-100">Afficher les membres</a>
            </div>
        </div>


        <a href="{{ route('admin.adhesion-inscription') }}">
            <div class="flex items-center px-4 py-2 rounded-lg transition-all duration-300 ease-in-out cursor-pointer bg-slate-100 hover:bg-blue-100 hover:text-violet-500 font-medium mb-1">
                <span class="material-symbols-outlined mr-3 text-lg">person_add</span>
                <span>Adhesion inscription</span>
            </div>
        </a>

        {{-- <a href="{{ route('admin.adhesion-stage') }}">
            <div class="flex items-center px-4 py-2 rounded-lg transition-all duration-300 ease-in-out cursor-pointer bg-slate-100 hover:bg-blue-100 hover:text-violet-500 font-medium mb-1">
                <span class="material-symbols-outlined mr-3 text-lg">person_add</span>
                <span>Adhesion stage</span>
            </div>
        </a>

        <a href="{{ route('admin.adhesion-formations') }}">
            <div class="flex items-center px-4 py-2 rounded-lg transition-all duration-300 ease-in-out cursor-pointer bg-slate-100 hover:bg-blue-100 hover:text-violet-500 font-medium mb-1">
                <span class="material-symbols-outlined mr-3 text-lg">person_add</span>
                <span>Adhesion formation</span>
            </div>
        </a>

        <a href="{{ route('admin.adhesion-paiement') }}">
            <div class="flex items-center px-4 py-2 rounded-lg transition-all duration-300 ease-in-out cursor-pointer bg-slate-100 hover:bg-blue-100 hover:text-violet-500 font-medium mb-1">
                <span class="material-symbols-outlined mr-3 text-lg">person_add</span>
                <span>Adhesion payment</span>
            </div>
        </a> --}}
        <!-- Repeat similar structure for other collapsible sections -->
    </nav>
</aside>

<script>
function toggleSubmenu(element) {
            const menuItem = element.parentElement;
            const submenu = menuItem.querySelector('.submenu');
            const arrow = element.querySelector('.material-symbols-outlined:last-child');
            const isExpanded = submenu.classList.contains('expanded');

            document.querySelectorAll('.menu-item .submenu.expanded').forEach(otherSubmenu => {
                if (otherSubmenu !== submenu) {
                    otherSubmenu.classList.remove('expanded');
                    otherSubmenu.style.maxHeight = '0';
                    const otherArrow = otherSubmenu.parentElement.querySelector('.material-symbols-outlined:last-child');
                    otherArrow.classList.remove('rotate-180');
                }
            });

            submenu.classList.toggle('expanded');
            arrow.classList.toggle('rotate-180');

            if (!isExpanded) {
                submenu.style.maxHeight = submenu.scrollHeight + 'px';
            } else {
                submenu.style.maxHeight = '0';
            }
        }

</script>
