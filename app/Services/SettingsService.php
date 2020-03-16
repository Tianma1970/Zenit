<?php


namespace App\Services;

use App\Setting;

class SettingsService {
    public function get()
    {
        return Setting::first();
        /*Ett annat sätt att skriva vilket har samma funktionalitet
        return Setting::first()*/

    }
}
