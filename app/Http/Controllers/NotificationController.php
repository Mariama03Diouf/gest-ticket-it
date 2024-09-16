<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    // Créer une nouvelle notification
    public function store(Request $request)
    {
        $notification = new Notification();
        $notification->user_id = $request->input('user_id');
        $notification->message = $request->input('message');
        $notification->save();

        return response()->json($notification);
    }

    // Obtenir toutes les notifications pour un utilisateur spécifique
    public function index($user_id)
    {
        $notifications = Notification::where('user_id', $user_id)->get();
        return response()->json($notifications);
    }

    // Supprimer une notification
    public function destroy($id)
    {
        $notification = Notification::find($id);
        if ($notification) {
            $notification->delete();
            return response()->json(['message' => 'Notification supprimée']);
        } else {
            return response()->json(['message' => 'Notification non trouvée'], 404);
        }
    }
}

