<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tracker extends Model {
    public $timestamps = false;
    protected $fillable = [ 'id', 'ip_address', 'country', 'visit_date', 'visit_time' ];
    protected $table = 'visitors';

    public static function hit() {
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d');
        $id = $ip.'/'.$date;
        if (!DB::table('visitors')->where('id', $id)->first()) {
            $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip="));
            $country = NULL;
            if ($ip_data && $ip_data->geoplugin_countryName != null) {
                $country = $ip_data->geoplugin_countryName;
            }
            static::create([
                'id' => $id,
                'ip_address' => $ip,
                'country' => $country,
                'visit_date' => $date,
                'visit_time' => date('H:i:s'),
            ]);
        }
    }
}
