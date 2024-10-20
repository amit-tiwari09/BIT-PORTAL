<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value'];

    private static $settings = null;

    // Singleton pattern to get the settings once and reuse them
    public static function getSettings()
    {
        if (self::$settings === null) {
            self::$settings = self::pluck('value', 'key')->all();
        }
        return self::$settings;
    }

    // Method to update a specific setting
    public static function updateSetting($key, $value)
    {
        self::updateOrCreate(['key' => $key], ['value' => $value]);
        // Clear cache so next time it fetches the updated value
        self::$settings = null;
    }
}

