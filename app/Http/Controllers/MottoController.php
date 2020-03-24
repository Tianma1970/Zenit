<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class MottoController extends Controller
{
    public function create()
    {
        $user = Auth::user();

        return view('/motto/create', [
            'user'  => $user
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $user->motto = $request->input('content');
        $user->save();

        return redirect('/home')->with('status', 'Motto added successfully');
    }
}
