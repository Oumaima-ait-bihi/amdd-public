@extends('admin.layouts.layout')
@section('content')
    <!-- content @s -->
    <div class="mb-6">
        <h3 class="text-3xl font-semibold text-[#364a63]">Analyse du AMDD</h3>
        <div class="nk-block-des text-soft">
            <p>Bienvenue sur le tableau de bord des analyses.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mb-6">
        <div class="border bg-white border-[#e5e7eb] rounded-lg p-4">
            <div class="card-title card-title-sm">
                <h6 class="mb-4 pb-4 border-b border-[#e5e7eb] font-medium">Evenements</h6>
                <h3 class="text-2xl text-[#364a63] font-medium">{{ $totalEvents }}</h3>
            </div>
        </div>
        {{-- <div class="border bg-white border-[#e5e7eb] rounded-lg p-4">
            <div class="card-title card-title-sm">
                <h6 class="mb-4 pb-4 border-b border-[#e5e7eb] font-medium">Activités</h6>
                <h3 class="text-2xl text-[#364a63] font-medium">{{ $totalActivities }}</h3>
            </div>
        </div> --}}
        <div class="border bg-white border-[#e5e7eb] rounded-lg p-4">
            <div class="card-title card-title-sm">
                <h6 class="mb-4 pb-4 border-b border-[#e5e7eb] font-medium">Annonces</h6>
                <h3 class="text-2xl text-[#364a63] font-medium">{{ $totalAnnonces }}</h3>
            </div>
        </div>
        <div class="border bg-white border-[#e5e7eb] rounded-lg p-4">
            <div class="card-title card-title-sm">
                <h6 class="mb-4 pb-4 border-b border-[#e5e7eb] font-medium">Adhésion preinscription</h6>
                <h3 class="text-2xl text-[#364a63] font-medium">{{ $totalAdhesionPreinscription }}</h3>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">
        <div class="bg-white border-[#e5e7eb] rounded-lg p-4">
            <h2 class="text-3xl font-semibold text-[#364a63] mb-4 text-center">Nombre d'événements par jour</h2>
            <div class="w-full h-64">
                <canvas id="dailyChartforEvents"></canvas>
            </div>
        </div>

        <div class="bg-white border-[#e5e7eb] rounded-lg p-4">
            <h2 class="text-3xl font-semibold text-[#364a63] mb-4 text-center">Nombre des activités par jour</h2>
            <div class="w-full h-64">
                <canvas id="dailyChartforActivities"></canvas>
            </div>
        </div>

        <div class="bg-white border-[#e5e7eb] rounded-lg p-4">
            <h2 class="text-3xl font-semibold text-[#364a63] mb-4 text-center">Nombre des annonces par jour</h2>
            <div class="w-full h-64">
                <canvas id="dailyChartforAnnonces"></canvas>
            </div>
        </div>

        <div class="bg-white border-[#e5e7eb] rounded-lg p-4">
            <h2 class="text-3xl font-semibold text-[#364a63] mb-4 text-center">Nombre des adhésions préinscription par jour</h2>
            <div class="w-full h-64">
                <canvas id="dailyChartforAdhesionPreinscription"></canvas>
            </div>
        </div>
    </div>

    <!-- Single Script Block to Initialize All Charts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Events Chart
            createLineChart({
                canvasId: 'dailyChartforEvents',
                labels: @json(array_keys($dailyStats['events'])),
                data: @json(array_values($dailyStats['events'])),
                labelText: "Nombre d'événements par jour",
                yAxisTitle: "Nombre d'événements",
                borderColor: 'blue'
            });

            // Activities Chart
            createLineChart({
                canvasId: 'dailyChartforActivities',
                labels: @json(array_keys($dailyStats['activities'])),
                data: @json(array_values($dailyStats['activities'])),
                labelText: "Nombre des activités par jour",
                yAxisTitle: "Nombre des activités",
                borderColor: 'green'
            });

            // Annonces Chart
            createLineChart({
                canvasId: 'dailyChartforAnnonces',
                labels: @json(array_keys($dailyStats['annonces'])),
                data: @json(array_values($dailyStats['annonces'])),
                labelText: "Nombre des annonces par jour",
                yAxisTitle: "Nombre des annonces",
                borderColor: 'red'
            });

            // Adhesion Preinscription Chart
            createLineChart({
                canvasId: 'dailyChartforAdhesionPreinscription',
                labels: @json(array_keys($dailyStats['adhesionPreinscription'])),
                data: @json(array_values($dailyStats['adhesionPreinscription'])),
                labelText: "Nombre des adhésions préinscription par jour",
                yAxisTitle: "Nombre des adhésions préinscription",
                borderColor: 'purple'
            });
        });
    </script>
    <!-- content @e -->
@endsection