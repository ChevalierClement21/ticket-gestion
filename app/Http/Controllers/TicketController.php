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
        //$user = auth()->user();

        if (auth()->user()->isA('admin')) {
            $tickets = Ticket::all();
        }
        elseif (auth()->user()->isA('client')) {
            $tickets = Ticket::where('user_id', auth()->user()->id)->get();
        }
        // Si l'utilisateur est un développeur
        elseif (auth()->user()->isA('developer')) {
            $tickets = Ticket::where('developer_id', auth()->user()->id)->get();
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
        return view('tickets.show', compact('ticket'));
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
}
