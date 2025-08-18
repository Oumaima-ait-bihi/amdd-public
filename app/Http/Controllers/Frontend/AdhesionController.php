<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Adhesion;
use App\Models\AdhesionFormation;
use App\Models\AdhesionPaiement;
use App\Models\AdhesionStage;
use App\Models\Formation;
use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdhesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.adhesion2');
    }

    public function getSpecialiteByComiteID($id)
    {
        $specialite = Specialite::where('comite_id', $id)->get();
        return $specialite;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'genre' => 'required|string|max:10',
            'tele' => 'required|string|max:20',
            'region' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'speciality' => 'required|string|max:255',
            'experience_years' => 'required|integer|min:0',
            'education_level' => 'required|string|max:255',
            'tech_level' => 'required|string|max:255',
            'association_goal' => 'required|string|max:255',
            'activity_options' => 'required|array',
            'competence_options' => 'required|array',
            'autreACT' => 'nullable|string|max:255',
            'courses' => 'required|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $adhesion = new Adhesion();
            $adhesion->nom = $request->input('fname');
            $adhesion->prenom = $request->input('lname');
            $adhesion->genre = $request->input('genre');
            $adhesion->tele = $request->input('tele');
            $adhesion->region = $request->input('region');
            $adhesion->ville = $request->input('city');
            $adhesion->profession = $request->input('profession');
            $adhesion->specialite = $request->input('speciality');
            $adhesion->annee_exp = $request->input('experience_years');
            $adhesion->niveau_etude = $request->input('education_level');
            $adhesion->tech_level = $request->input('tech_level');
            $adhesion->goal_association = $request->input('association_goal');
            $adhesion->activite_option = implode(',', $request->input('activity_options'));
            $adhesion->competence_option = implode(',', $request->input('competence_options'));
            $adhesion->autreACT = $request->input('autreACT');
            $adhesion->courses = implode(',', $request->input('courses'));
            if ($adhesion->save()) {
                return redirect()->back()->with('success', 'Vous avez bien adhéré à notre association');
            } else {
                return redirect()->back()->with('error', 'Échec de l\'enregistrement dans la base de données.');
            }
        } catch (\Throwable $th) {
            \Log::error('Adhesion Save Error: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $th->getMessage());
        }
    }
    public function store_formation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'genre' => 'required|string|max:10',
            'tele' => 'required|string|max:20',
            'region' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'formation_souhaitable' => 'required|string|max:255',
            'reseau_sociaux' => 'nullable|array',
            'autre' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $adhesionFormation = new AdhesionFormation();
            $adhesionFormation->nom = $request->input('fname');
            $adhesionFormation->prenom = $request->input('lname');
            $adhesionFormation->genre = $request->input('genre');
            $adhesionFormation->tele = $request->input('tele');
            $adhesionFormation->region = $request->input('region');
            $adhesionFormation->ville = $request->input('city');
            $adhesionFormation->formation = $request->input('formation_souhaitable');
            $adhesionFormation->reseaux_sociaux = implode(',', $request->input('reseau_sociaux'));
            $adhesionFormation->autre = $request->input('autre');
            if ($adhesionFormation->save()) {
                return redirect()->back()->with('success', 'Vous avez bien adhéré à notre association.');
            } else {
                return redirect()->back()->with('error', 'Échec de l\'enregistrement dans la base de données.');
            }
        } catch (\Throwable $th) {
            \Log::error('Adhesion Save Error: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }

    public function store_paiement(Request $request)
    {
        try {
            Log::info('Incoming request: ', $request->all());

            // Validate incoming data
            $request->validate([
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'genre' => 'required|string',
                'tele' => 'required|string',
                'region' => 'required|string',
                'city' => 'required|string',
                'cin' => 'required|string',
                'photo' => 'required|file|mimes:jpeg,png,jpg|max:2048',
                'face1' => 'required|file|mimes:pdf,jpeg,png,jpg|max:2048',
                'face2' => 'required|file|mimes:pdf,jpeg,png,jpg|max:2048',
                'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
                'recu' => 'required|file|mimes:pdf,jpeg,png,jpg|max:2048',
            ]);

            // Initialize the model
            $adhesionPaiement = new AdhesionPaiement();
            $adhesionPaiement->nom = $request->input('fname');
            $adhesionPaiement->prenom = $request->input('lname');
            $adhesionPaiement->genre = $request->input('genre');
            $adhesionPaiement->tele = $request->input('tele');
            $adhesionPaiement->region = $request->input('region');
            $adhesionPaiement->ville = $request->input('city');
            $adhesionPaiement->cin = $request->input('cin');

            // Handle file uploads
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo');
                $pdf = $photoPath->getClientOriginalName();
                $photoPath->move(public_path('uploads/Photo'), $pdf);
                $adhesionPaiement->photo = $pdf;
            }
            if ($request->hasFile('face1')) {
                $face1Path = $request->file('face1');
                $pdf = $face1Path->getClientOriginalName();
                $face1Path->move(public_path('uploads/CIN_Passport_Face_recto'), $pdf);
                $adhesionPaiement->cin_face_1 = $pdf;
            }
            if ($request->hasFile('face2')) {
                $face2Path = $request->file('face2');
                $pdf = $face2Path->getClientOriginalName();
                $face2Path->move(public_path('uploads/CIN_Passport_Face_verso'), $pdf);
                $adhesionPaiement->cin_face_2 = $pdf; // Store the file path in the database
            }
            if ($request->hasFile('cv')) {
                $cvPath = $request->file('cv');
                $pdf = $cvPath->getClientOriginalName();
                $cvPath->move(public_path('uploads/CV'), $pdf);
                $adhesionPaiement->cv = $pdf; // Store the file path in the database
            }
            if ($request->hasFile('recu')) {
                $recuPath = $request->file('recu');
                $pdf = $recuPath->getClientOriginalName();
                $recuPath->move(public_path('uploads/Recu_paiement'), $pdf);
                $adhesionPaiement->recu_paiement = $pdf; // Store the file path in the database
            }

            // Save the data
            if ($adhesionPaiement->save()) {
                Log::info('Record saved successfully');
                return redirect()->back()->with('success', 'Vous avez bien adhéré à notre association.');
            } else {
                Log::error('Failed to save record in the database.');
                return redirect()->back()->with('error', 'Échec de l\'enregistrement dans la base de données.');
            }
        } catch (\Throwable $th) {
            Log::error('Adhesion Save Error: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }
    public function store_stage(Request $request)
    {
        try {
            Log::info('Incoming request: ', $request->all());

            // Validate incoming data
            $request->validate([
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'genre' => 'required|string',
                'tele' => 'required|string|max:10', // Optional: Add max length for phone numbers
                'region' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'age' => 'required|integer|min:18', // Assuming age is an integer
                'type_diplome' => 'required|string|max:255',
                'diplome_autre' => 'nullable|string|max:255',
                'specialite' => 'required|string|max:255',
                'type_stage' => 'required|string|max:255',
                'duree_stage' => 'required|string|max:255',
                'date_debut' => 'required|date',
                'date_fin' => 'required|date',
                'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            ]);

            // Initialize the model
            $adhesionStage = new AdhesionStage();
            $adhesionStage->nom = $request->input('fname');
            $adhesionStage->prenom = $request->input('lname');
            $adhesionStage->genre = $request->input('genre');
            $adhesionStage->tele = $request->input('tele');
            $adhesionStage->region = $request->input('region');
            $adhesionStage->ville = $request->input('city');
            $adhesionStage->age = $request->input('age');
            $adhesionStage->niveau_diplome = $request->input('niveau_diplome');
            $adhesionStage->type_diplome = $request->input('type_diplome');
            $adhesionStage->diplome_autre = $request->input('diplome_autre');
            $adhesionStage->specialite = $request->input('specialite');
            $adhesionStage->type_stage = $request->input('type_stage');
            $adhesionStage->dure_stage = $request->input('duree_stage');
            $adhesionStage->date_debut = $request->input('date_debut');
            $adhesionStage->date_fin = $request->input('date_fin');
            if ($request->hasFile('cv')) {
                $cvPath = $request->file('cv');
                $pdf = $cvPath->getClientOriginalName();
                $cvPath->move(public_path('uploads/CV_de_stage'), $pdf);
                $adhesionStage->cv = $pdf; // Store the file path in the database
            }

            // Save the data
            if ($adhesionStage->save()) {
                Log::info('Record saved successfully');
                return redirect()->back()->with('success', 'Vous avez bien adhéré à notre association.');
            } else {
                Log::error('Failed to save record in the database.');
                return redirect()->back()->with('error', 'Échec de l\'enregistrement dans la base de données.');
            }
        } catch (\Throwable $th) {
            Log::error('Adhesion Save Error: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }

    // Helper method to get the form-specific data based on the form type
    private function getFormSpecificData($formType, $request)
    {
        // Implement the logic to retrieve the form-specific data based on the form type
        // This can include conditionals or switch statements depending on your specific requirements

        $formSpecificData = [];

        switch ($formType) {
            case 'stage':

                $formSpecificData['type_stage'] = $request->input('type_stage');
                $formSpecificData['duree'] = $request->input('duree');
                break;
            case 'preinscription':
                $formSpecificData['profession'] = $request->input('profession');
                $formSpecificData['specialite'] = $request->input('specialite');
                break;
            case 'formation':
                $formSpecificData['formation_options'] = $request->input('formation_options') ?? [];
                $formSpecificData['custom_formation_option'] = $request->input('custom_formation_option') ?? '';
                break;

            case 'avecPaiment':
                $formSpecificData['formationData'] = $request->input('formation_data');
                // Set other formation-specific data as needed
                break;
            // Add more cases for other form types
            default:
                // Handle default case or throw an error if necessary
                break;
        }

        return json_encode($formSpecificData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Implementation for showing the form for editing a specified resource
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Implementation for updating a specified resource
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Implementation for removing a specified resource
    }
}
