<?php

namespace App\Services;

use App\Models\Evenement;
use App\Models\Activity;
use App\Models\Adhesion;
use App\Models\AdhesionPaiement;
use App\Models\AdhesionFormation;
use App\Models\AdhesionStage;
use App\Models\Annonce;
use Carbon\Carbon;

class StatsService
{
    // Get the total count of events using the Evenement model
    public function getTotalEvents()
    {
        return Evenement::count();
    }

    // Get daily stats for events from the last 7 days using the Evenement model
    public function getDailyStatsForEvents()
    {
        return Evenement::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', Carbon::today()->subDays(7))
            ->groupByRaw('DATE(created_at)')
            ->orderByRaw('DATE(created_at)')
            ->get();
    }

    // Get the total count of activities using the Activity model
    public function getTotalActivities()
    {
        return Activity::count();
    }

    // Get daily stats for activities from the last 7 days using the Activity model
    public function getDailyStatsForActivities()
    {
        return Activity::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', Carbon::today()->subDays(7))
            ->groupByRaw('DATE(created_at)')
            ->orderByRaw('DATE(created_at)')
            ->get();
    }

    // Get the total count of adhesion_preinscription using the Activity model
    public function getTotaladhesionPreinscription()
    {
        return Adhesion::count();
    }

    // Get daily stats for dhesion preinscription from the last 7 days using the Activity model
    public function getDailyStatsAdhesionPreinscription()
    {
        return Adhesion::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', Carbon::today()->subDays(7))
            ->groupByRaw('DATE(created_at)')
            ->orderByRaw('DATE(created_at)')
            ->get();
    }

    // Get the total count of Adhesion payement using the Activity model
    // public function getTotalAdhesionPayement()
    // {
    //     return AdhesionPaiement::count();
    // }

    // Get daily stats for Adhesion payement from the last 7 days using the Activity model
    public function getDailyStatsAdhesionPayement()
    {
        return AdhesionPaiement::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', Carbon::today()->subDays(7))
            ->groupByRaw('DATE(created_at)')
            ->orderByRaw('DATE(created_at)')
            ->get();
    }

    // Get the total count of Adhésion formation using the Activity model
    public function getTotalAdhesionFormation()
    {
        return AdhesionFormation::count();
    }

    // Get daily stats for Adhésion formation from the last 7 days using the Activity model
    public function getDailyStatsAdhesionFormation()
    {
        return AdhesionFormation::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', Carbon::today()->subDays(7))
            ->groupByRaw('DATE(created_at)')
            ->orderByRaw('DATE(created_at)')
            ->get();
    }

    // Get the total count of Adhésion stage using the Activity model
    public function getTotalAdhesionStage()
    {
        return AdhesionStage::count();
    }

    // Get daily stats for Adhésion stage from the last 7 days using the Activity model
    public function getDailyStatsAdhesionStage()
    {
        return AdhesionStage::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', Carbon::today()->subDays(7))
            ->groupByRaw('DATE(created_at)')
            ->orderByRaw('DATE(created_at)')
            ->get();
    }

        // Get the total count of Annonces using the Activity model
        public function getTotalAnnonces()
        {
            return Annonce::count();
        }

        // Get daily stats for Annonces from the last 7 days using the Activity model
        public function getDailyStatsAnnonces()
        {
            return Annonce::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                ->where('created_at', '>=', Carbon::today()->subDays(7))
                ->groupByRaw('DATE(created_at)')
                ->orderByRaw('DATE(created_at)')
                ->get();
        }
}
