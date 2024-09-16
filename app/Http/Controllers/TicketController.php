<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    // Créer un nouveau ticket
    public function create(Request $request)
    {
        $ticket = new Ticket();
        $ticket->title = $request->input('title');
        $ticket->description = $request->input('description');
        $ticket->status = 'open';
        $ticket->save();

        return response()->json($ticket);
    }

    // Obtenir tous les tickets
    public function index()
    {
        $tickets = Ticket::all();
        return response()->json($tickets);
    }

    // Obtenir un ticket par ID
    public function show($id)
    {
        $ticket = Ticket::find($id);
        if ($ticket) {
            return response()->json($ticket);
        } else {
            return response()->json(['message' => 'Ticket not found'], 404);
        }
    }

    // Mettre à jour un ticket
    public function update(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        if ($ticket) {
            $ticket->title = $request->input('title');
            $ticket->description = $request->input('description');
            $ticket->status = $request->input('status');
            $ticket->save();

            return response()->json($ticket);
        } else {
            return response()->json(['message' => 'Ticket not found'], 404);
        }
    }

    // Supprimer un ticket
    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        if ($ticket) {
            $ticket->delete();
            return response()->json(['message' => 'Ticket deleted']);
        } else {
            return response()->json(['message' => 'Ticket not found'], 404);
        }
    }
}