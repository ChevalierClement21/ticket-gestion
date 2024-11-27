<?php

namespace App\Http\Controllers;

use App\Mail\CommentaireEnvoyeAuClient;
use App\Mail\CommentaireEnvoyeAuDev;
use App\Models\Commentaire;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Ticket $ticket)
    {
       $request->validate([
        'content' => 'required|string',
        ]);


        $commentaire = new Commentaire();
        $commentaire->content = $request->content ;
        $commentaire->user_id = auth()->user()->id;
        $commentaire->ticket_id = $ticket->id;
        $commentaire->save();

        if (auth()->user()->isA('developer')) {
            if ($ticket->user_id) {
                $client = User::find($ticket->user_id);
                Mail::to($client->email)->send(new CommentaireEnvoyeAuClient($ticket, $commentaire));
            }
        }

        if ($ticket->developer_id) {
            $developer = User::find($ticket->developer_id);
            if ($developer->id !== auth()->user()->id) {
                Mail::to($developer->email)->send(new CommentaireEnvoyeAuDev($ticket, $commentaire));
            }
        }
        return redirect()->route('tickets.show', $ticket)->with('success', 'Commentaire ajouté avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Commentaire $commentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commentaire $commentaire)
    {
        //
    }
}
