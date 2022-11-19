<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\UserStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $this->authorize('create',User::class);

        return response()->json(User::create([
            'name'=> $request->input('name'),
            'lastname'=> $request->input('lastname'),
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
    public function show(User $user)
    {
        $this->authorize('view',$user);
        return response()->json($user);
    }

    public function showLoggedUser()
    {
        return response()->json(Auth::user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UserUpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $this->authorize('update',User::class);
        $user=User::find($id);
        if(empty($request->input('password')))    
            $user->update($request->all());
        else {
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
        $this->authorize('destroy',User::class);
        return response()->json(User::destroy($id));
    }
}
