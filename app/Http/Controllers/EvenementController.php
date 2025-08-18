<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvenementRequest;
use App\Http\Requests\UpdateEvenementRequest;
use App\Models\Evenement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EvenementController extends Controller
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

        $query = Evenement::query();

        if ($request->has('filter')) {
            $filter = $request->input('filter');
            $today = Carbon::today();

            if ($filter === 'day') {
                $query->whereDate('date_debut', $today);
            } elseif ($filter === 'week') {
                $query->whereBetween('date_debut', [
                    $today->copy()->startOfWeek()->toDateString(),
                    $today->copy()->endOfWeek()->toDateString()
                ]);
            }
        }

        // Paginate with filter preservation
        $evenements = $query->latest()->paginate(10)->appends(['filter' => $request->input('filter')]);

        return view('admin.evenements.index', compact('evenements'));
    }

    //

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.evenements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvenementRequest $request)
    {
        $validated = $request->validated();

        $imagePath = $request->file('image')->store('evenements/images', 'public');


        $galleryPaths = $request->hasFile('gallery')
            ? collect($request->file('gallery'))->map(fn($file) => $file->store('evenements/gallery', 'public'))->all()
            : [];

        $videoPath = $request->hasFile('video') ? $request->file('video')->store('evenements/videos', 'public') : null;

        $evenement = Evenement::create([
            'titre_fr' => $validated['titre_fr'],
            'titre_ar' => $validated['titre_ar'],
            'type_fr' => $validated['type_fr'],
            'type_ar' => $validated['type_ar'],
            'date_debut' => $validated['date_debut'],
            'date_fin' => $validated['date_fin'],
            'status' => $validated['status'],
            'image' => $imagePath,
            'gallery' => $galleryPaths,
            'video' => $videoPath,
            'description_fr' => $validated['description_fr'],
            'description_ar' => $validated['description_ar'] ?? null,
            'links' => $validated['links'] ?? [],
        ]);

        return redirect()->route('admin.evenements.index')
            ->with('success', 'Événement créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evenement = Evenement::find($id);
        return view('admin.evenements.show', compact('evenement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evenement = Evenement::find($id);
        return view('admin.evenements.edit', compact('evenement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvenementRequest $request, $id)
    {
        $evenement = Evenement::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($evenement->image) {
                Storage::delete($evenement->image);
            }
            $imagePath = $request->file('image')->store('evenements/images', 'public');
            $evenement->image = $imagePath;
        }

        if ($request->hasFile('gallery')) {
            if ($evenement->gallery) {
                $oldGalleryPaths = is_array($evenement->gallery)
                    ? $evenement->gallery
                    : json_decode($evenement->gallery, true);

                foreach ($oldGalleryPaths as $oldImagePath) {
                    Storage::delete($oldImagePath);
                }
            }

            $galleryPaths = collect($request->file('gallery'))->map(function ($galleryImage) {
                return $galleryImage->store('evenements/gallery', 'public');
            })->all();
            $evenement->gallery = $galleryPaths;
        }

        if ($request->hasFile('video')) {
            if ($evenement->video) {
                Storage::delete($evenement->video);
            }
            $videoPath = $request->file('video')->store('evenements/videos', 'public');
            $evenement->video = $videoPath;
        }

        $evenement->update([
            'titre_fr' => $request->titre_fr,
            'titre_ar' => $request->titre_ar,
            'type_fr' => $request->type_fr,
            'type_ar' => $request->type_ar,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'status' => $request->status,
            'description_fr' => $request->description_fr,
            'description_ar' => $request->description_ar ?? null,
            'links' => $request->links ?? [],
        ]);

        return redirect()->route('admin.evenements.index')->with('success', 'Événement mis à jour avec succès!');
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Find the evenement by ID
            $evenement = Evenement::findOrFail($id);

            // Delete the main image if it exists
            if ($evenement->image && !is_array($evenement->image) && Storage::disk('public')->exists($evenement->image)) {
                Storage::disk('public')->delete($evenement->image);
            }

            // Delete gallery images if they exist
            if (is_array($evenement->gallery) && !empty($evenement->gallery)) {
                foreach ($evenement->gallery as $galleryImage) {
                    if (Storage::disk('public')->exists($galleryImage)) {
                        Storage::disk('public')->delete($galleryImage);
                    }
                }
            }

            // Delete the evenement record
            $evenement->delete();

            return redirect()->route('admin.evenements.index')
                ->with('success', 'Événement supprimé avec succès.');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }
}
