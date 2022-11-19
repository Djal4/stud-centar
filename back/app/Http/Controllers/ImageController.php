<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Auth,
    Storage
};
use App\Models\User;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $user = User::find(Auth::id());
        
        $user->photo = Storage::put('/public/', $request->file('image'));
        $user->save();
    }

    public function show()
    {
        $user=User::find(Auth::id());

        if(!empty($user->photo) && Storage::exists($user->photo))
            return Storage::download($user->photo);
    }   
}
