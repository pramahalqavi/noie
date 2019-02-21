<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Visitor extends Model {
    public $timestamps = false;
    protected $fillable = [ 'id', 'ip_address', 'country', 'country_code', 'visit_date', 'visit_time' ];
    protected $table = 'visitors';

    public static function hit() {
        $ip = 'Unknown';
        if ($_SERVER['REMOTE_ADDR'] != NULL) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $date = date('Y-m-d');
        $id = $ip.'/'.$date;
        if (!DB::table('visitors')->where('id', $id)->first()) {
            $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip="));
            $country = 'Unknown';
            $countryCode = 'Unknown';
            if ($ip_data && $ip_data->geoplugin_countryName != NULL && $ip_data->geoplugin_countryCode != NULL) {
                $country = $ip_data->geoplugin_countryName;
                $countryCode = $ip_data->geoplugin_countryCode;
            }
            static::create([
                'id' => $id,
                'ip_address' => $ip,
                'country' => $country,
                'country_code' => $countryCode,
                'visit_date' => $date,
                'visit_time' => date('H:i:s'),
            ]);
        }
    }
}
