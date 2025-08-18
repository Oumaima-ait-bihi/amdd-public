<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\StatsService;

class HomeController extends Controller
{
    protected $statsService;

    // Inject StatsService in the constructor
    public function __construct(StatsService $statsService)
    {
        $this->middleware('admin.auth:admin');
        $this->statsService = $statsService;
    }

    public function index()
    {
        // Get the total events count and daily stats
        $totalEvents = $this->statsService->getTotalEvents();
        $eventCounts = $this->statsService->getDailyStatsForEvents();

        // Get the total activities count and daily stats
        // $totalActivities = $this->statsService->getTotalActivities();
        // $activityCounts = $this->statsService->getDailyStatsForActivities();

        // Get the total activities count and daily stats
        $totalAdhesionPreinscription = $this->statsService->getTotaladhesionPreinscription();
        $adhesionPreinscriptionCounts = $this->statsService->getDailyStatsAdhesionPreinscription();

        // Get the total Adhésion payement count and daily stats
        // $totalAdhesionPayement = $this->statsService->getTotalAdhesionPayement();
        // $adhesionPayementCounts = $this->statsService->getDailyStatsAdhesionPayement();


        // Get the total Adhésion stage count and daily stats
        // $totalAdhesionFormation = $this->statsService->getTotalAdhesionFormation();
        // $adhesionFormationCounts = $this->statsService->getDailyStatsAdhesionFormation();

        // Get the total Adhésion stage count and daily stats
        // $totalAdhesionStage = $this->statsService->getTotalAdhesionStage();
        // $adhesionStageCounts = $this->statsService->getDailyStatsAdhesionStage();

        // Get the total Annonces count and daily stats
        $totalAnnonces = $this->statsService->getTotalAnnonces();
        $annoncesCounts = $this->statsService->getDailyStatsAnnonces();

        // Initialize the dailyStats array
        $dailyStats = [
            'events' => [],
            'activities' => [],
            'adhesionPreinscription' => [],
            'adhesionPayement' => [],
            'adhesionFormation' => [],
            'adhesionStage' => [],
            'annonces' => []
        ];

        // Prepare event daily stats (from eventCounts)
        foreach ($eventCounts as $event) {
            $dailyStats['events'][$event->date] = $event->count;
        }

        // Prepare activity daily stats (from activityCounts)
        // foreach ($activityCounts as $activity) {
        //     $dailyStats['activities'][$activity->date] = $activity->count;
        // }

        // Prepare adhesion preinscription daily stats (from AdhesionPreinscriptionCounts)
        foreach ($adhesionPreinscriptionCounts as $adhesionPreinscription) {
            $dailyStats['adhesionPreinscription'][$adhesionPreinscription->date] = $adhesionPreinscription->count;
        }

        // Prepare adhesion paiement daily stats (from AdhesionPreinscriptionCounts)
        // foreach ($adhesionPayementCounts as $adhesionPayement) {
        //     $dailyStats['adhesionPayement'][$adhesionPayement->date] = $adhesionPayement->count;
        // }

        // Prepare adhesion formation daily stats (from AdhesionPreinscriptionCounts)
        // foreach ($adhesionFormationCounts as $adhesionFormation) {
        //     $dailyStats['adhesionFormation'][$adhesionFormation->date] = $adhesionFormation->count;
        // }

        // Prepare adhesion formation daily stats (from AdhesionPreinscriptionCounts)
        // foreach ($adhesionStageCounts as $adhesionStage) {
        //     $dailyStats['adhesionStage'][$adhesionStage->date] = $adhesionStage->count;
        // }

        // Prepare Annonces daily stats (from AdhesionPreinscriptionCounts)
        foreach ($annoncesCounts as $annonce) {
            $dailyStats['annonces'][$annonce->date] = $annonce->count;
        }

        // Pass the stats to the view
        return view('admin.home', [
            'dailyStats' => $dailyStats,
            'totalEvents' => $totalEvents,
            // 'totalActivities' => $totalActivities,
            'totalAdhesionPreinscription' => $totalAdhesionPreinscription,
            // 'totalAdhesionPayement' => $totalAdhesionPayement,
            // 'totalAdhesionFormation' => $totalAdhesionFormation,
            // 'totalAdhesionStage' => $totalAdhesionStage,
            'totalAnnonces' => $totalAnnonces
        ]);
    }
}
