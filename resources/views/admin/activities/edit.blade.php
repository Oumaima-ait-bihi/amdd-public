@extends('admin.layouts.layout')
@section('content')

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <!-- Page Title -->
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Modifier l'Activité</h2>
                    <p class="text-gray-600">Mettez à jour les détails de l'activité ci-dessous.</p>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg shadow-sm">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('admin.activities.update', $activity->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-12">
                        <!-- Title and Description Section -->
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <!-- Title -->
                                <div class="sm:col-span-3">
                                    <label for="title" class="block text-sm/6 font-medium text-gray-900">Titre</label>
                                    <div class="mt-2">
                                        <input type="text" name="title" id="title" value="{{ old('title', $activity->title) }}"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            required placeholder="Entrez le titre de l'activité">
                                    </div>
                                </div>

                                <!-- Location -->
                                <div class="sm:col-span-3">
                                    <label for="location" class="block text-sm/6 font-medium text-gray-900">Lieu</label>
                                    <div class="mt-2">
                                        <input type="text" name="location" id="location" value="{{ old('location', $activity->location) }}"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            required placeholder="Entrez le lieu (ex. Paris)">
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="col-span-full">
                                    <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                                    <div class="mt-2">
                                        <textarea name="description" id="description" rows="3"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            placeholder="Entrez une description de l'activité">{{ old('description', $activity->description) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Date and Link Section -->
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base/7 font-semibold text-gray-900">Dates et Lien</h2>
                            <p class="mt-1 text-sm/6 text-gray-600">Mettez à jour les dates et le lien de l'activité.</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <!-- Start Date -->
                                <div class="sm:col-span-3">
                                    <label for="start_date" class="block text-sm/6 font-medium text-gray-900">Date Début</label>
                                    <div class="mt-2">
                                        <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $activity->start_date->format('Y-m-d')) }}"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            required>
                                    </div>
                                </div>

                                <!-- End Date -->
                                <div class="sm:col-span-3">
                                    <label for="end_date" class="block text-sm/6 font-medium text-gray-900">Date Fin</label>
                                    <div class="mt-2">
                                        <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $activity->end_date->format('Y-m-d')) }}"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            required>
                                    </div>
                                </div>

                                <!-- Link -->
                                <div class="col-span-full">
                                    <label for="link" class="block text-sm/6 font-medium text-gray-900">Lien (URL)</label>
                                    <div class="mt-2">
                                        <input type="url" name="link" id="link" value="{{ old('link', $activity->link) }}"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            placeholder="https://example.com">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Image and Video Upload Section -->
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base/7 font-semibold text-gray-900">Média</h2>
                            <p class="mt-1 text-sm/6 text-gray-600">Mettez à jour l'image principale et la vidéo de l'activité.</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <!-- Image Upload -->
                                <div class="col-span-full">
                                    <label for="image" class="block text-sm/6 font-medium text-gray-900">Image</label>
                                    @if ($activity->image)
                                        <div class="mt-2">
                                            <img src="{{ Storage::url($activity->image) }}" alt="Current Image" class="w-32 h-32 object-cover rounded mb-2">
                                            <p class="text-sm/6 text-gray-600">Image actuelle. Uploadez une nouvelle pour la remplacer.</p>
                                        </div>
                                    @endif
                                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10 image-drop-area" id="image-drop-area">
                                        <div class="text-center">
                                            <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                                            </svg>
                                            <div class="mt-4 flex text-sm/6 text-gray-600">
                                                <label for="image" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                    <span>Upload a file</span>
                                                    <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 2MB</p>
                                        </div>
                                    </div>
                                    <p id="image-file-name" class="mt-2 text-sm/6 text-gray-600"></p>
                                </div>

                                <!-- Video Upload -->
                                <div class="col-span-full">
                                    <label for="video" class="block text-sm/6 font-medium text-gray-900">Vidéo</label>
                                    @if ($activity->video)
                                        <div class="mt-2">
                                            <video controls class="w-32 h-32 object-cover rounded mb-2">
                                                <source src="{{ Storage::url($activity->video) }}" type="video/mp4">
                                                Votre navigateur ne supporte pas la balise vidéo.
                                            </video>
                                            <p class="text-sm/6 text-gray-600">Vidéo actuelle. Uploadez une nouvelle pour la remplacer.</p>
                                        </div>
                                    @endif
                                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10 video-drop-area" id="video-drop-area">
                                        <div class="text-center">
                                            <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z" clip-rule="evenodd" />
                                            </svg>
                                            <div class="mt-4 flex text-sm/6 text-gray-600">
                                                <label for="video" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                    <span>Upload a video</span>
                                                    <input id="video" name="video" type="file" class="sr-only" accept="video/*">
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs/5 text-gray-600">MP4, AVI, MOV up to 50MB</p>
                                        </div>
                                    </div>
                                    <p id="video-file-name" class="mt-2 text-sm/6 text-gray-600"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('admin.activities.index') }}" class="text-sm/6 font-semibold text-gray-900">Annuler</a>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for File Input Display and Drag-and-Drop -->
<script>
    // Prevent default drag behaviors
    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    // Highlight drop area
    function highlight(area) {
        area.classList.add('border-indigo-600', 'bg-indigo-50');
    }

    // Unhighlight drop area
    function unhighlight(area) {
        area.classList.remove('border-indigo-600', 'bg-indigo-50');
    }

    // Image Drag and Drop
    const imageInput = document.getElementById('image');
    const imageDropArea = document.getElementById('image-drop-area');

    imageInput.addEventListener('change', function(event) {
        const fileName = event.target.files[0] ? event.target.files[0].name : 'Aucun fichier sélectionné';
        document.getElementById('image-file-name').textContent = fileName;
    });

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        imageDropArea.addEventListener(eventName, preventDefaults, false);
    });

    ['dragenter', 'dragover'].forEach(eventName => {
        imageDropArea.addEventListener(eventName, () => highlight(imageDropArea), false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        imageDropArea.addEventListener(eventName, () => unhighlight(imageDropArea), false);
    });

    imageDropArea.addEventListener('drop', function(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        imageInput.files = files;
        const fileName = files[0] ? files[0].name : 'Aucun fichier sélectionné';
        document.getElementById('image-file-name').textContent = fileName;
    }, false);

    // Video Drag and Drop
    const videoInput = document.getElementById('video');
    const videoDropArea = document.getElementById('video-drop-area');

    videoInput.addEventListener('change', function(event) {
        const fileName = event.target.files[0] ? event.target.files[0].name : 'Aucun fichier sélectionné';
        document.getElementById('video-file-name').textContent = fileName;
    });

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        videoDropArea.addEventListener(eventName, preventDefaults, false);
    });

    ['dragenter', 'dragover'].forEach(eventName => {
        videoDropArea.addEventListener(eventName, () => highlight(videoDropArea), false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        videoDropArea.addEventListener(eventName, () => unhighlight(videoDropArea), false);
    });

    videoDropArea.addEventListener('drop', function(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        videoInput.files = files;
        const fileName = files[0] ? files[0].name : 'Aucun fichier sélectionné';
        document.getElementById('video-file-name').textContent = fileName;
    }, false);
</script>

@endsection
