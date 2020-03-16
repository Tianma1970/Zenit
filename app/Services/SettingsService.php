<?php


namespace App\Services;

use App\Setting;

class SettingsService {
    public function get()
    {
        return Setting::find(1);
    }
}
