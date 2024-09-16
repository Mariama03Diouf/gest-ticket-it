<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Créer un nouvel utilisateur
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return response()->json($user);
    }

    // Obtenir tous les utilisateurs
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Obtenir un utilisateur par ID
    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }
    }

    // Mettre à jour un utilisateur
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if ($request->input('password')) {
                $user->password = bcrypt($request->input('password'));
            }
            $user->save();

            return response()->json($user);
        } else {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }
    }

    // Supprimer un utilisateur
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'Utilisateur supprimé']);
        } else {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }
    }
}

