<?php

namespace Webkul\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Webkul\Admin\Models\CowProfile;

class CowController extends Controller
{
    /**
     * Display a listing of the cow profiles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cows = CowProfile::latest()->paginate(10);
        
        return view('admin::cow.index', compact('cows'));
    }

    /**
     * Display the cow registration form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $cowId = CowProfile::generateUniqueID();
        
        return view('admin::cow.create', compact('cowId'));
    }

    /**
     * Store a newly created cow profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cow_id' => 'required|unique:cow_profiles,cow_id',
            'breed' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'weight' => 'required|numeric|min:0',
            'health_status' => 'required|in:healthy,at-risk,sick',
            'photo' => 'nullable|image|max:5120', // Max 5MB
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('cow_photos', 'public');
            $validated['photo'] = $photoPath;
        }

        CowProfile::create($validated);

        return redirect()
            ->route('admin.cow.index')
            ->with('success', 'Cow profile registered successfully!');
    }

    /**
     * Display the specified cow profile.
     *
     * @param  string  $cow_id
     * @return \Illuminate\View\View
     */
    public function show($cow_id)
    {
        $cow = CowProfile::where('cow_id', $cow_id)->firstOrFail();
        
        return view('admin::cow.show', compact('cow'));
    }

    /**
     * Display the cow edit form.
     *
     * @param  string  $cow_id
     * @return \Illuminate\View\View
     */
    public function edit($cow_id)
    {
        $cow = CowProfile::where('cow_id', $cow_id)->firstOrFail();
        
        return view('admin::cow.edit', compact('cow'));
    }

    /**
     * Update the specified cow profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $cow_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cow_id)
    {
        $cow = CowProfile::where('cow_id', $cow_id)->firstOrFail();

        $validated = $request->validate([
            'breed' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'weight' => 'required|numeric|min:0',
            'health_status' => 'required|in:healthy,at-risk,sick',
            'photo' => 'nullable|image|max:5120', // Max 5MB
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($cow->photo && Storage::disk('public')->exists($cow->photo)) {
                Storage::disk('public')->delete($cow->photo);
            }
            
            $photoPath = $request->file('photo')->store('cow_photos', 'public');
            $validated['photo'] = $photoPath;
        }

        $cow->update($validated);

        return redirect()
            ->route('admin.cow.show', $cow_id)
            ->with('success', 'Cow profile updated successfully!');
    }

    /**
     * Remove the specified cow profile.
     *
     * @param  string  $cow_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($cow_id)
    {
        $cow = CowProfile::where('cow_id', $cow_id)->firstOrFail();

        // Delete photo if exists
        if ($cow->photo && Storage::disk('public')->exists($cow->photo)) {
            Storage::disk('public')->delete($cow->photo);
        }

        $cow->delete();

        return redirect()
            ->route('admin.cow.index')
            ->with('success', 'Cow profile deleted successfully!');
    }

    /**
     * Search and filter cow profiles.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = CowProfile::query();

        // Search by cow ID or breed
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('cow_id', 'like', "%{$searchTerm}%")
                  ->orWhere('breed', 'like', "%{$searchTerm}%");
            });
        }

        // Filter by health status
        if ($request->has('status') && !empty($request->status)) {
            $query->where('health_status', $request->status);
        }

        // Filter by birth date range
        if ($request->has('birth_date_from') && !empty($request->birth_date_from)) {
            $query->where('birth_date', '>=', $request->birth_date_from);
        }

        if ($request->has('birth_date_to') && !empty($request->birth_date_to)) {
            $query->where('birth_date', '<=', $request->birth_date_to);
        }

        $cows = $query->latest()->paginate(10);

        return view('admin::cow.index', compact('cows'));
    }
}
