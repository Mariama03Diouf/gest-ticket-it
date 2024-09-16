<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    // Créer un nouveau commentaire
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->ticket_id = $request->input('ticket_id');
        $comment->content = $request->input('content');
        $comment->user_id = $request->input('user_id');
        $comment->save();

        return response()->json($comment);
    }

    // Obtenir tous les commentaires pour un ticket spécifique
    public function index($ticket_id)
    {
        $comments = Comment::where('ticket_id', $ticket_id)->get();
        return response()->json($comments);
    }

    // Supprimer un commentaire
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            $comment->delete();
            return response()->json(['message' => 'Commentaire supprimé']);
        } else {
            return response()->json(['message' => 'Commentaire non trouvé'], 404);
        }
    }
}

