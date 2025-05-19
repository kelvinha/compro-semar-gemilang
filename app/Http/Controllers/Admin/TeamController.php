<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::orderBy('order')->paginate(10);
        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('teams', 'public');
            $validated['photo'] = $photoPath;
        }

        Team::create($validated);

        Alert::success('Success', 'Team member created successfully.');
        return redirect()->route('admin.teams.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('admin.teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($team->photo) {
                Storage::disk('public')->delete($team->photo);
            }

            $photoPath = $request->file('photo')->store('teams', 'public');
            $validated['photo'] = $photoPath;
        }

        $team->update($validated);

        Alert::success('Success', 'Team member updated successfully.');
        return redirect()->route('admin.teams.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        // Delete photo if exists
        if ($team->photo) {
            Storage::disk('public')->delete($team->photo);
        }

        $team->delete();

        Alert::success('Success', 'Team member deleted successfully.');
        return redirect()->route('admin.teams.index');
    }
}
