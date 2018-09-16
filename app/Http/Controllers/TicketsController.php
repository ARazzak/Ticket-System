<?php

namespace App\Http\Controllers;

use App\Tickets;
use Illuminate\Http\Request;

use App\Http\Requests\TicketUpdateRequest;
use App\Status;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Tickets::latest()->paginate(10);
        //dd($tickets);
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $statuses = Status::get();
        return view('tickets.create');
    }

    public function delete(Tickets $tickets)
    {
        return view('tickets.delete', compact('tickets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketUpdateRequest $request)
    {
        Tickets::create([
          'summary' => request('summary'),
          'description' => request('description'),
          'status' => request('status')
        ]);
        return redirect()->route('tickets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function show(Tickets $tickets)
    {
      $statuses = Status::get();
        return view('tickets.show', compact(['tickets', 'statuses']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function edit(Tickets $tickets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function update(TicketUpdateRequest $request, Tickets $tickets)
    {


        $tickets->summary = request('summary');
        $tickets->description = request('description');
        $tickets->status = request('status');
        $tickets->save();
        return redirect()->route('tickets.index')->withSuccess('Ticket has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tickets $tickets)
    {
        $tickets->delete();

        return redirect()->route('tickets.index')->withError('Ticket has been deleted');
    }
}
