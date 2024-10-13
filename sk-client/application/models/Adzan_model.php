<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adzan_model extends CI_Model {

    public function get_adzan_schedule()
    {
        $latitude = '-7.265425'; // Koordinat latitude Surabaya
        $longitude = '112.734192'; // Koordinat longitude Surabaya

        $url = "https://api.aladhan.com/v1/calendar?latitude={$latitude}&longitude={$longitude}&method=2";
        $data = json_decode(file_get_contents($url));

        if (isset($data->data)) {
            return $data->data;
        } else {
            return false;
        }
    }
}
