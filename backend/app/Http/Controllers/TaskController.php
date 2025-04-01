<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Task;


class TaskController extends Controller
{
    public function newTask($id)
    {
        $users = User::all();
        
        return response()->json([
            'project_id' => $id,
            'users' => $users
        ]);
    }

    public function taskCreate($id)
    {
        // Vérifie si le projet existe
        $project = Project::findOrFail($id);

        $validatedData = request()->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'priority' => 'required',
            'status' => 'required|string',
            'user_id' => 'nullable'
        ]);

        // Ajoute les valeurs dynamiques qui ne sont pas dans la requête
        $validatedData['project_id'] = $project->id;
        $validatedData['created_by'] = Auth::id();

        // Création de la tâche avec toutes les valeurs nécessaires
        $task = Task::create($validatedData);

        // Vérifie si un utilisateur a été sélectionné avant d'attacher
        if (!empty($validatedData['user_id'])) {
            $task->assignees()->attach($validatedData['user_id']);
        }        

        // Récupère tous les utilisateurs pour la vue
        $users = User::all();

        return response()->json($users, 201);
    }
}
