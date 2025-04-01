<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;


class ProjectController extends Controller
{
    public function showAll()
    {
        $user = Auth::user();
        $projects = $user->projects;

        return response()->json($projects);
    }

    public function show($id)
    {
        $user = Auth::user();
        $project = Project::with('users')->findOrFail($id);

        if (!$project->users()->where('id', $user->id)->exists()) {
            return response()->json(['error' => 'You are not authorized to view this project.'], 403);
        }

        return response()->json($project);
    }

    public function create()
    {
        $validatedData = request()->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [
            'name.required' => 'The project name is required.',
            'start_date.required' => 'The start date is required.',
            'end_date.after_or_equal' => 'The end date must be after or equal to the start date.',
        ]);

        $validatedData['name'] = strip_tags($validatedData['name']);
        $validatedData['description'] = isset($validatedData['description']) ? strip_tags($validatedData['description']) : null;

        $user = Auth::user();

        $project = Project::create($validatedData);
        $project->users()->attach($user->id);

        return response()->json($project, 201);
    }

    public function update($id)
    {
        $user = Auth::user();

        $project = Project::findOrFail($id);
        if (!$project->users()->where('id', $user->id)->exists()) {
            return response()->json(['error' => 'You are not authorized to update this project.'], 403);
        }

        $validatedData = request()->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|nullable|string|max:1000',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date|after_or_equal:start_date',
        ], [
            'name.string' => 'The project name must be a string.',
            'start_date.date' => 'The start date must be a valid date.',
            'end_date.after_or_equal' => 'The end date must be after or equal to the start date.',
        ]);

        if (isset($validatedData['name'])) {
            $validatedData['name'] = strip_tags($validatedData['name']);
        }
        if (isset($validatedData['description'])) {
            $validatedData['description'] = strip_tags($validatedData['description']);
        }
        $project->update($validatedData);

        return response()->json($project, 200);
    }

    public function delete($id)
    {
        $user = Auth::user();

        $project = Project::findOrFail($id);
        if (!$project->users()->where('id', $user->id)->exists()) {
            return response()->json(['error' => 'You are not authorized to delete this project.'], 403);
        }

        $project->delete();

        return response()->json(['message' => 'Project deleted successfully.'], 200);
    }
}
