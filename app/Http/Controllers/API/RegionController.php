<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    public function provinces(Request $request)
    {
        $provinces = $this->getProvinces();
        return [
            "code" => 200,
            "provinces" => $provinces,
        ];
    }

    public function citiesByProvince(Request $request, $province_id)
    {
        $cities = $this->getCities($province_id);
        return [
            "code" => 200,
            "cities" => $cities,
        ];
    }

    public function cities(Request $request)
    {
        $cities = $this->getCities($this->province_id);
        return [
            "code" => 200,
            "cities" => $cities,
        ];
    }

    public function districts(Request $request, $city_id)
    {
        $districts = $this->getDistricts($city_id);
        return [
            "code" => 200,
            "districts" => $districts,
        ];
    }

}
