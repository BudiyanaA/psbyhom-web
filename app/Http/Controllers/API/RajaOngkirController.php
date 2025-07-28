<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RajaOngkirController extends Controller
{
    // private $api_key = "74065a0591eb15195385f76b6c6251af";
    private $api_key = "d1b46a0efb5560a8ceba6453c764eeea";
    private $base_url = "https://rajaongkir.komerce.id/api/v1";

    public function provinces(Request $request)
    {
      $provinces = [];
      $result = Http::withHeaders([
        'key' => $this->api_key,
      ])->get($this->base_url . '/destination/province')->json();
      // dd($result);
      if ($result["meta"]["code"] == 200) {
        $provinces = $result["data"];
      }

      return [
          "code" => $result["meta"]["code"],
          "message" => $result["meta"]["message"],
          "provinces" => $provinces,
      ];
    }

    public function cities(Request $request, $province_id)
    {
      $cities = [];
      $result = Http::withHeaders([
        'key' => $this->api_key,
      ])->get($this->base_url . '/destination/city/' . $province_id)->json();
      if ($result["meta"]["code"] == 200) {
        $cities = $result["data"];
      }

      return [
          "code" => $result["meta"]["code"],
          "message" => $result["meta"]["message"],
          "cities" => $cities,
      ];
    }

    public function subdistricts(Request $request, $city_id)
    {
      $subdistricts = [];
      $result = Http::withHeaders([
        'key' => $this->api_key,
      ])->get($this->base_url . '/destination/district/' . $city_id)->json();
      if ($result["meta"]["code"] == 200) {
        $subdistricts = $result["data"];
      }

      return [
          "code" => $result["meta"]["code"],
          "message" => $result["meta"]["message"],
          "subdistricts" => $subdistricts,
      ];
    }

    public function costs(Request $request)
    {
      $costs = [];
      $result = Http::withHeaders([
        'key' => $this->api_key,
        'Content-Type' => 'application/x-www-form-urlencoded',
      ])->asForm()->post($this->base_url . '/calculate/district/domestic-cost', [
        'origin' => '5890', //Rungkut, Surabaya
        // 'originType' => 'city',
        'destination' => $request->subdistrict,
        // 'destinationType' => 'subdistrict',
        'weight' => 1000,
        'courier' => $request->courier,
        'price' => 'lowest',
      ])->json();

      if ($result["meta"]["code"] == 200) {
        $costs = $result["data"];
      }

      return [
          "code" => $result["meta"]["code"],
          "message" => $result["meta"]["message"],
          "costs" => $costs,
      ];
    }

    public function couriers(Request $request)
    {
        // $result = Http::withHeaders([
        //     'key' => $this->api_key,
        // ])->get($this->base_url . '/couriers')->json()["rajaongkir"];
    
        $rajaongkir_couriers = [];
    
        // if ($result["status"]["code"] == 200) {
        //     $rajaongkir_couriers = $result["results"];
        // }
    
        $manual_couriers = [
            [
                "code" => "jne",
                "courier" => "JNE",
            ],
//             [
//               "code" => "pos",
//               "courier" => "POS",
//           ],
//           [
//             "code" => "tiki",
//             "courier" => "TIKI",
//         ],
//         [
//           "code" => "rpx",
//           "courier" => "RPX",
//       ],
//       [
//         "code" => "pandu",
//         "courier" => "PANDU",
//     ],
//     [
//       "code" => "wahana",
//       "courier" => "Wahana",
//   ],
//   [
//     "code" => "sicepat",
//     "courier" => "SICEPAT",
// ],
// [
//   "code" => "jnt",
//   "courier" => "JNT",
// ],
// [
//   "code" => "pahala",
//   "courier" => "PAHALA",
// ],
// [
//   "code" => "sap",
//   "courier" => "SAP",
// ],
// [
//   "code" => "jet",
//   "courier" => "JET",
// ],
// [
//   "code" => "indah",
//   "courier" => "INDAH",
// ],
// [
//   "code" => "dse",
//   "courier" => "DSE",
// ],
// [
//   "code" => "slis",
//   "courier" => "SLIS",
// ],
// [
//   "code" => "first",
//   "courier" => "FIRST",
// ],
// [
//   "code" => "ncs",
//   "courier" => "NCS",
// ],
// [
//   "code" => "star",
//   "courier" => "STAR",
// ],
// [
//   "code" => "ninja",
//   "courier" => "NINJA",
// ],
// [
//   "code" => "lion",
//   "courier" => "LION",
// ],
// [
//   "code" => "idl",
//   "courier" => "IDL",
// ],
// [
//   "code" => "rex",
//   "courier" => "REX",
// ],
// [
//   "code" => "ide",
//   "courier" => "IDE",
// ],
// [
//   "code" => "sentral",
//   "courier" => "SENTRAL",
// ],
// [
//   "code" => "anteraja",
//   "courier" => "ANTERAJA",
// ],
// [
//   "code" => "anteraja",
//   "courier" => "ANTERAJA",
// ],
            
            // tambahkan kurir lainnya di sini
        ];
    
        $couriers = array_merge($manual_couriers, $rajaongkir_couriers);
    
        return [
            "code" => 200,
            "message" => "OK",
            "couriers" => $couriers,
        ];
    }
  }