<?php
namespace App\Http\Controllers;

use App\Models\Adhesion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdhesionInscriptionController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin')->except(['store']); // Protect all actions with this middleware
    }
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        $query  = Adhesion::query();

        if ($filter === 'day') {
            $query->whereDate('created_at', today());
        } elseif ($filter === 'week') {
            $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
        }

        $adhesionInscriptions = $query->latest()->paginate(10);

        return view('admin.adhesion-inscription.index', compact('adhesionInscriptions'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'                => 'required|string|max:255',
            'prenom'             => 'required|string|max:255',
            'cin'                => 'required|string|max:255',
            'email'              => 'required|string|max:255|email',
            'genre'              => 'required|string|max:10',
            'tele'               => 'required|string|max:20',
            'region'             => 'required|string|max:255',
            'ville'              => 'required|string|max:255',
            'cv_path'            => 'required|file|mimes:pdf|max:5120',
            'profession_options' => 'required|string|max:255',
            'autrePRO'           => 'nullable|string|max:255',
            'specialite'         => 'required|string|max:255',
            'niveau_etude'       => 'required|string|max:255',
            'membre_options'     => 'required|string|max:255',
            'paiement_options'   => 'required|string|max:255',
            'comite_options'     => 'required|string|max:255',
            'recu_path'          => 'nullable|file|mimes:pdf|max:5120',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Profession with fallback
            $profession = $request->input('profession_options') === 'Autre'
            ? $request->input('autrePRO')
            : $request->input('profession_options');

            // Save to DB
            $adhesion                     = new Adhesion();
            $adhesion->nom                = $request->input('nom');
            $adhesion->prenom             = $request->input('prenom');
            $adhesion->cin                = $request->input('cin');
            $adhesion->email              = $request->input('email');
            $adhesion->genre              = $request->input('genre');
            $adhesion->tele               = $request->input('tele');
            $adhesion->region             = $request->input('region');
            $adhesion->ville              = $request->input('ville');
            $adhesion->profession_options = $profession;
            $adhesion->specialite         = $request->input('specialite');
            $adhesion->niveau_etude       = $request->input('niveau_etude');
            $adhesion->membre_options     = $request->input('membre_options');
            $adhesion->comite_options     = $request->input('comite_options');
            $adhesion->paiement_options   = $request->input('paiement_options');
            $adhesion->autrePRO           = $request->input('autrePRO');
            if ($request->hasFile('cv_path')) {
                $file = $request->file('cv_path');
                // slug both first name and lastname into one safe string
                $baseName   = Str::slug($adhesion->nom . ' ' . $adhesion->prenom, '-');
                $extension  = $file->getClientOriginalExtension();
                $filenameCV = "{$baseName}_" . time() . ".{$extension}";

                $directory = public_path('assets/upload/CVs');
                if (! File::isDirectory($directory)) {
                    File::makeDirectory($directory, 0755, true);
                }

                $file->move($directory, $filenameCV);
                $adhesion->cv_path = $filenameCV;
            }

            if ($request->hasFile('recu_path')) {
                $file = $request->file('recu_path');
                // slug both first name and lastname into one safe string
                $baseName      = Str::slug($adhesion->nom . ' ' . $adhesion->prenom, '-');
                $extension     = $file->getClientOriginalExtension();
                $filenameReçu = "{$baseName}_" . time() . ".{$extension}";

                $directory = public_path('assets/upload/reçus');
                if (! File::isDirectory($directory)) {
                    File::makeDirectory($directory, 0755, true);
                }

                $file->move($directory, $filenameReçu);
                $adhesion->recu_path = $filenameReçu;
            }
            if ($adhesion->save()) {
                return redirect()->back()->with('success', "Vous avez bien adhéré à notre association AMDD. Nous vous contacterons bientôt pour l'activation de votre inscription.");
            } else {
                return redirect()->back()->with('error', "Échec de l\'enregistrement.");
            }
        } catch (\Throwable $th) {
            Log::error('Adhesion Save Error: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $th->getMessage());
        }
    }
}
