<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RajaOngkirController extends Controller
{
    private $api_key = "74065a0591eb15195385f76b6c6251af";
    private $base_url = "https://pro.rajaongkir.com/api";

    public function provinces(Request $request)
    {
      $provinces = [];
      $result = Http::withHeaders([
        'key' => $this->api_key,
      ])->get($this->base_url . '/province')->json()["rajaongkir"];
      if ($result["status"]["code"] == 200) {
        $provinces = $result["results"];
      }

      return [
          "code" => $result["status"]["code"],
          "message" => $result["status"]["description"],
          "provinces" => $provinces,
      ];
    }

    public function cities(Request $request, $province_id)
    {
      $cities = [];
      $result = Http::withHeaders([
        'key' => $this->api_key,
      ])->get($this->base_url . '/city', ['province' => $province_id])->json()["rajaongkir"];
      if ($result["status"]["code"] == 200) {
        $cities = $result["results"];
      }

      return [
          "code" => $result["status"]["code"],
          "message" => $result["status"]["description"],
          "cities" => $cities,
      ];
    }

    public function subdistricts(Request $request, $city_id)
    {
      $subdistricts = [];
      $result = Http::withHeaders([
        'key' => $this->api_key,
      ])->get($this->base_url . '/subdistrict', ['city' => $city_id])->json()["rajaongkir"];
      if ($result["status"]["code"] == 200) {
        $subdistricts = $result["results"];
      }

      return [
          "code" => $result["status"]["code"],
          "message" => $result["status"]["description"],
          "subdistricts" => $subdistricts,
      ];
    }

}
