<?php

namespace App\Http\Controllers;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    public function show($id)
    {
        $ticket=DB::table('tickets')
        ->join('users','tickets.user_id','=','users.id')
        ->select('tickets.content','tickets.time','users.name','users.lastname')
        ->where('tickets.id','=',$id)
        ->limit(1)
        ->get();
        $response=DB::table('tickets')
        ->join('users','tickets.user_id','=','users.id')
        ->select('tickets.content','tickets.time','users.name','users.lastname')
        ->where('tickets.parent_id','=',$id)
        ->limit(1)
        ->get();
        return response()->json([$ticket,$response]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ticket=Ticket::find($id);
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
        return response()->json(Ticket::destroy($id));
    }
}
