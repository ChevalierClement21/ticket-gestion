<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Priorite;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Silber\Bouncer\BouncerFacade as Bouncer;
use App\Models\User;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(){

        if (auth()->user()->isA('admin')) {
            $tickets = Ticket::all();
        }
        elseif (auth()->user()->isA('client')) {
            $tickets = Ticket::where('user_id', auth()->user()->id)->get();
        }
        elseif (auth()->user()->isA('developer')) {
            $tickets = Ticket::where('developer_id', auth()->user()->id)->whereNotIn('status', ['Annulé', 'Résolu'])->get();
        }

        return view('tickets.index', compact('tickets'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        $priorites = Priorite::all();
        return view('tickets.create', compact('categories', 'priorites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priorite_id' => 'required|exists:priorites,id',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->priorite_id = $request->priorite_id;
        $ticket->status = 'Ouvert';
        $ticket->user_id = auth()->id();
        $ticket->categorie_id = $request->categorie_id;

        $ticket->save();

        return redirect()->route('tickets.index')->with('success', 'Ticket créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $developers = User::whereHas('roles', function($query) {
            $query->where('name', 'developer');
        })->get();
        $comments = $ticket->commentaires()->with('user')->get();


        return view('tickets.show', compact('ticket','developers','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $categories = Categorie::all();
        $priorites = Priorite::all();
        return view('tickets.edit', compact('ticket', 'categories', 'priorites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priorite_id' => 'required|exists:priorites,id',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $ticket->update([
            'title' => $request->title,
            'description' => $request->description,
            'priorite_id' => $request->priorite_id,
            'categorie_id' => $request->categorie_id,
        ]);
        return redirect()->route('tickets.index')->with('success', 'Ticket mis à jour avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket supprimé avec succès.');
    }
    public function assignDeveloper(Request $request, Ticket $ticket)
    {
        // Valider les entrées
        $request->validate([
            'developer_id' => 'required|exists:users,id',
        ]);

        $ticket->developer_id = $request->developer_id;
        $ticket->status = "Affecté";
        $ticket->save();

        return redirect()->route('tickets.index')->with('success', 'Développeur assigné et statut mis à jour.');
    }

    public function cancel(Ticket $ticket)
    {
        if (auth()->user()->id === $ticket->user_id && $ticket->status !== 'Résolu') {
            $ticket->status = 'Annulé';
            $ticket->save();

            return redirect()->route('tickets.index')->with('success', 'Le ticket a été annulé avec succès.');
        }

        return redirect()->back()->with('error', 'Action non autorisée.');
    }

    public function resolve(Ticket $ticket)
    {
        if (auth()->user()->id === $ticket->user_id && $ticket->status === 'Affecté') {
            $ticket->status = 'Résolu';
            $ticket->save();

            return redirect()->route('tickets.index')->with('success', 'Le ticket a été marqué comme résolu.');
        }

        return redirect()->back()->with('error', 'Action non autorisée.');
    }


}
