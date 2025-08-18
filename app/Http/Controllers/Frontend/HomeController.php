<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Equipe;
use App\Models\Evenement;
use App\Models\Testemonial;
use App\Models\Adhesion;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    public function index(Request $request)
    {

        $visitors = Visitor::select('visit_time', DB::raw('count(*) as total'))->where('visit_time', '>', today()->subMonth())->groupBy('visit_time')->get();
        // $profileId = $request->input('profile_id');
        $activities   = Activity::count();
        $members      = Adhesion::count();
        $evenements   = Evenement::count();
        $testemonials = Testemonial::all();
        $equipes      = Equipe::all();
        if ($request->lang != null) {
            app()->setLocale($request->lang);
            session()->put('lang', $request->lang);
        } else {
            app()->setLocale('fr');
            session()->put('lang', 'fr');
        }
        return view('frontend.index', compact('testemonials', 'equipes', 'members', 'evenements', 'activities', 'visitors'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

}
