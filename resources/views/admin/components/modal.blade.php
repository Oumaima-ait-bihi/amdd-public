<!-- resources/views/components/modal.blade.php -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden transition-opacity duration-300 ease-in-out">
    <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md transform transition-all duration-300 scale-95">
        <h3 class="text-lg font-semibold text-gray-900 mb-2">Confirmer la suppression</h3>
        <p class="text-sm text-gray-600 mb-6">Êtes-vous sûr de vouloir supprimer cet élément ? Cette action est irréversible.</p>
        <div class="flex justify-end gap-4">
            <button id="cancelDelete" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">Annuler</button>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">Supprimer</button>
            </form>
        </div>
    </div>
</div>
