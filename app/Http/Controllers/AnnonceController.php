<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnnonceRequest;
use App\Http\Requests\UpdateAnnonceRequest;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin'); // Protect all actions with this middleware
    }
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        $query = Annonce::query();

        if ($filter === 'day') {
            $query->whereDate('date_annonce', today());
        } elseif ($filter === 'week') {
            $query->whereBetween('date_annonce', [now()->startOfWeek(), now()->endOfWeek()]);
        }

        $annonces = $query->latest()->paginate(10);

        return view('admin.annonces.index', compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.annonces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnnonceRequest $request)
    {
        $validated = $request->validated();

        try {
            $imagePath = $request->hasFile('image_annonce')
                ? $request->file('image_annonce')->store('annonces/images', 'public')
                : null;

            Annonce::create([
                'titre_annonce_fr' => $validated['titre_annonce_fr'],
                'titre_annonce_ar' => $validated['titre_annonce_ar'],
                'date_annonce' => $validated['date_annonce'],
                'description_annonce_fr' => $validated['description_annonce_fr'] ?? null,
                'description_annonce_ar' => $validated['description_annonce_ar'] ?? null,
                'image_annonce' => $imagePath,
            ]);

            return redirect()->route('admin.annonces.index')
                            ->with('success', 'Annonce créée avec succès.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Annonce $annonce)
    {
        return view('admin.annonces.edit', compact('annonce'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnnonceRequest $request, Annonce $annonce)
    {
        $validated = $request->validated();

        try {
            // Handle image upload and deletion
            if ($request->hasFile('image_annonce')) {
                // Delete old image if it exists
                if ($annonce->image_annonce && Storage::disk('public')->exists($annonce->image_annonce)) {
                    Storage::disk('public')->delete($annonce->image_annonce);
                }
                $imagePath = $request->file('image_annonce')->store('annonces/images', 'public');
            } else {
                $imagePath = $annonce->image_annonce; // Keep existing image
            }

            $annonce->update([
                'titre_annonce_fr' => $validated['titre_annonce_fr'],
                'titre_annonce_ar' => $validated['titre_annonce_ar'],
                'date_annonce' => $validated['date_annonce'],
                'description_annonce_fr' => $validated['description_annonce_fr'] ?? null,
                'description_annonce_ar' => $validated['description_annonce_ar'] ?? null,
                'image_annonce' => $imagePath,
            ]);

            return redirect()->route('admin.annonces.index')
                            ->with('success', 'Annonce mise à jour avec succès.');
        } catch (\Exception $e) {
            // Cleanup if update fails after new image upload
            if (isset($imagePath) && $imagePath !== $annonce->image_annonce && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            return back()->withInput()->with('error', 'Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annonce $annonce)
    {
        try {
            // Delete the associated image if it exists
            if ($annonce->image_annonce && Storage::disk('public')->exists($annonce->image_annonce)) {
                Storage::disk('public')->delete($annonce->image_annonce);
            }

            // Delete the annonce record
            $annonce->delete();

            return redirect()->route('admin.annonces.index')
                            ->with('success', 'Annonce supprimée avec succès.');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }
}
