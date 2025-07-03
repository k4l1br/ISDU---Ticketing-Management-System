<?php

namespace App\Http\Controllers;

use App\Models\ticket;
use Illuminate\Http\Request;

class ticketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticket = ticket::all();
        return view('pages.ticket.index', compact('ticket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'Lastname'  => 'required|string|max:255',
            'refNumber' => 'required|string|max:255',
        ]);

        $ticket = ticket::create($validated);

        return redirect()->route('ticket.index', $ticket)->with('success', 'Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ticket $ticket)
    {
        return view('pages.ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ticket $ticket)
    {
        return view('pages.ticket.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ticket $ticket)
    {
        $validated = $request->validate([
          'firstName' => 'required|string|max:255',
            'Lastname'  => 'required|string|max:255',
            'refNumber' => 'required|string|max:255',
        ]);

        $ticket->update($validated);

        return redirect()->route('ticket.show', $ticket)->with('success', 'Ticket updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('ticket.index')->with('success', 'Ticket deleted successfully.');
    }
}