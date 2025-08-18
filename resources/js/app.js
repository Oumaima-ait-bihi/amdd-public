import './bootstrap';
import '../css/app.css';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();





document.addEventListener('DOMContentLoaded', () => {
    const sidebarToggler = document.querySelector('[data-toggle-sidebar]');
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.querySelector('#sidebar-overlay');
    const body = document.body;

    // Toggle Sidebar Function
    const toggleSidebar = () => {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
        body.classList.toggle('overflow-hidden'); // Prevent body scroll
    };

    // Submenu Toggle Function
    window.toggleSubmenu = function(element) {
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
    };

    // Event Listeners
    if (sidebarToggler) {
        sidebarToggler.addEventListener('click', toggleSidebar);
    }

    if (overlay) {
        overlay.addEventListener('click', toggleSidebar); // Close sidebar when clicking overlay
    }

    // Close submenus when clicking outside
    document.addEventListener('click', (event) => {
        if (!event.target.closest('.menu-item') && !event.target.closest('[data-toggle-sidebar]')) {
            document.querySelectorAll('.menu-item .submenu.expanded').forEach(submenu => {
                submenu.classList.remove('expanded');
                submenu.style.maxHeight = '0';
                const arrow = submenu.parentElement.querySelector('.material-symbols-outlined:last-child');
                arrow.classList.remove('rotate-180');
            });
        }
    });
});

window.createLineChart = function({
    canvasId,
    labels,
    data,
    labelText,
    yAxisTitle,
    borderColor = 'blue'
}) {
    const ctx = document.getElementById(canvasId);
    if (ctx) {
        new Chart(ctx.getContext('2d'), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: labelText,
                    data: data,
                    borderColor: borderColor,
                    borderWidth: 2,
                    fill: false,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        title: { display: true, text: 'La date' }
                    },
                    y: {
                        title: { display: true, text: yAxisTitle },
                        beginAtZero: true
                    }
                }
            }
        });
    }
};



// resources/js/app.js
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-btn');
    const deleteModal = document.getElementById('deleteModal');
    const cancelDelete = document.getElementById('cancelDelete');
    const deleteForm = document.getElementById('deleteForm');
    const html = document.documentElement;

    // Function to show the modal
    function showModal() {
        deleteModal.classList.remove('hidden');
        deleteModal.classList.remove('opacity-0');
        deleteModal.classList.add('opacity-100');
        const modalContent = deleteModal.querySelector('.scale-95');
        modalContent.classList.remove('scale-95');
        modalContent.classList.add('scale-100');
        html.classList.add('overflow-hidden');
    }

    // Function to hide the modal
    function hideModal() {
        deleteModal.classList.remove('opacity-100');
        deleteModal.classList.add('opacity-0');
        const modalContent = deleteModal.querySelector('.scale-100');
        modalContent.classList.remove('scale-100');
        modalContent.classList.add('scale-95');

        // Use transitionend event instead of setTimeout for reliability
        deleteModal.addEventListener('transitionend', function handler(e) {
            if (e.propertyName === 'opacity' && deleteModal.classList.contains('opacity-0')) {
                deleteModal.classList.add('hidden');
                html.classList.remove('overflow-hidden');
                deleteModal.removeEventListener('transitionend', handler); // Clean up
            }
        }, { once: true });
    }

    // Handle delete button clicks
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.getAttribute('data-url');
            deleteForm.action = url;
            showModal();
        });
    });

    // Close modal on cancel
    cancelDelete.addEventListener('click', function() {
        hideModal();
    });

    // Close modal when clicking outside
    deleteModal.addEventListener('click', function(e) {
        if (e.target === deleteModal) {
            hideModal();
        }
    });
});
