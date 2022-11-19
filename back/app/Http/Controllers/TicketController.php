<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketStoreRequest;
use App\Http\Requests\TicketUpdateRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',Ticket::class);
        return response()->json([Ticket::select('time')->orderByDesc('time')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ticketResponse(Request $request,$id)
    {
        $this->authorize('response',Ticket::class);
        return response()->json(Ticket::create([
            "content"=>$request->input('content'),
            "time"=>$request->input('time'),
            "user_id"=>$request->input('user_id'),
            "parent_id"=>$id
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\TicketStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketStoreRequest $request)
    {
        $this->authorize('create',Ticket::class);
        return response()->json(Ticket::create([
            "content"=>$request->input('content'),
            "time"=>$request->input('time'),
            "user_id"=>$request->input('user_id')
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $this->authorize('view',$ticket);
        $tckt=DB::table('tickets')
        ->join('users','tickets.user_id','=','users.id')
        ->select('tickets.content','tickets.time','users.name','users.lastname')
        ->where('tickets.id','=',$ticket->id)
        ->limit(1)
        ->get();
        $response=DB::table('tickets')
        ->join('users','tickets.user_id','=','users.id')
        ->select('tickets.content','tickets.time','users.name','users.lastname')
        ->where('tickets.parent_id','=',$ticket->id)
        ->limit(1)
        ->get();
        return response()->json([$tckt,$response]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\TicketUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketUpdateRequest $request, Ticket $ticket)
    {
        $this->authorize('update',$ticket);
        return response()->json($ticket->update($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete',Ticket::class);
        return response()->json(Ticket::destroy($id));
    }
}
