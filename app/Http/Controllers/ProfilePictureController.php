<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;

class ProfilePictureController extends Controller
{
    public function index()
    {
        return view('upload/index');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $tmpImage = $request->file('image');
        $filename = 'user_image' . $user->id . '.' . $tmpImage->getClientOriginalExtension();
        $tmpImage->move('images', $filename);

        $user->user_image = $filename;

        $user->save();

        return redirect('/home');
    }
}
