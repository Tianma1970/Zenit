<?php

namespace App\Http\Controllers;

use Auth;
use App\Setting;
use Session;
use App\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /* Show the uploadlogo view to the admin user */
    public function index()
    {

        return view('uploadLogo/index');

    }

    /*upload logo by admin user*/
    public function uploadLogo(Request $request)
    {

        //dd('store');

        $tmpImage = $request->file('image');
        $filename = 'site_logo' . '.' . $tmpImage->getClientOriginalExtension();
        $tmpImage->move('uploads', $filename);

        //dd($filename);

        $settings = new Setting;

        $settings->site_logo = $filename;

        $settings->save();

        return redirect('/home')->with('status', 'Site Logo uploaded successfully');

    }
}
