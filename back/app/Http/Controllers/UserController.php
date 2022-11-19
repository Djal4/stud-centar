<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json(User::create([
            'name'=>$request->input('name'),
            'lastname'=>$request->input('lastname'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
            'year_of_birth'=>$request->input('year_of_birth'),
            'role_id'=>$request->input('role_id')
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
        return response()->json(User::find($id));
    }

    public function showLoggedUser()
    {
        return response()->json(Auth::user());
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
        $user=User::find($id);
        if(empty($request->input('password')))    
            $user->update($request->all());
        else{
            $user->update($request->except('password'));
        }
        return response()->json($user);
    }

    public function changePassword(Request $request,$id)
    {
        $user=User::find($id);
        return response()->json($user->update(["password"=>bcrypt($request->input('password'))]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(User::destroy($id));
    }
}
