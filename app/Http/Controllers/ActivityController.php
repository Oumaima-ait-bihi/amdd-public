<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
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
        $query = Activity::query();

        if ($request->has('filter')) {
            $filter = $request->input('filter');
            $today = Carbon::today();

            if ($filter === 'day') {
                $query->whereDate('start_date', $today);
            } elseif ($filter === 'week') {
                $query->whereBetween('end_date', [
                    $today->copy()->startOfWeek()->toDateString(),
                    $today->copy()->endOfWeek()->toDateString()
                ]);
            }
        }

        $activities = $query->latest()->paginate(10)->appends(['filter' => $request->input('filter')]);
        return view('admin.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActivityRequest $request)
    {
        $validated = $request->validated();



            $imagePath = $request->hasFile('image')
                ? $request->file('image')->store('activities/images', 'public')
                : null;

            $videoPath = $request->hasFile('video') ? $request->file('video')->store('activities/videos', 'public') : null;

            // Create the activity
            Activity::create([
                'title' => $validated['title'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'location' => $validated['location'],
                'image' => $imagePath,
                'video' => $videoPath,
                'description' => $validated['description'] ?? null,
                'link' => $validated['link'] ?? null,
            ]);

            return redirect()->route('admin.activities.index')
                ->with('success', 'Activité créée avec succès.');
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
    public function edit(Activity $activity)
    {
        return view('admin.activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $validated = $request->validated();

            // Handle image upload and deletion
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($activity->image && Storage::disk('public')->exists($activity->image)) {
                    Storage::disk('public')->delete($activity->image);
                }
                // Store the new image
                $imagePath = $request->file('image')->store('activities/images', 'public');
            } else {
                // Keep the existing image if no new one is uploaded
                $imagePath = $activity->image;
            }

            if ($request->hasFile('video')) {
                if ($activity->video) {
                    Storage::delete($activity->video);
                }
                $videoPath = $request->file('video')->store('activities/videos', 'public');
                $activity->video = $videoPath;
            }

            // Update the activity with validated data
            $activity->update([
                'title' => $validated['title'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'location' => $validated['location'],
                'image' => $imagePath,
                'description' => $validated['description'] ?? null,
                'link' => $validated['link'] ?? null,
            ]);

            return redirect()->route('admin.activities.index')
                            ->with('success', 'Activité mise à jour avec succès.');
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
            // Find the activity by ID
            $activity = Activity::findOrFail($id);

            // Delete the associated image if it exists
            if ($activity->image && Storage::disk('public')->exists($activity->image)) {
                Storage::disk('public')->delete($activity->image);
            }

            // Delete the activity record
            $activity->delete();

            return redirect()->route('admin.activities.index')
                            ->with('success', 'Activité supprimée avec succès.');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }
}
