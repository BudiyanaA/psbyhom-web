<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use View;
use App\Models\Region;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $province_id = '73'; //73 - Sulawesi Selatan
    public $city_id = '73.01';
    public function __construct() {
        $this->middleware(function ($request, $next) {

            $cities = $this->getCities($this->province_id)->pluck('nama', 'kode');
            View::share ('cities', $cities);

            $province = $this->getProvinces()->pluck('nama', 'kode');
            View::share ('province', $province);

            $districts = $this->getDistricts($this->city_id)->pluck('nama', 'kode');
            View::share ('districts', $districts);

            // TODO: remove
            // $profiles= CandidateProfile::get();
            // View::share ('profiles', $profiles);

            return $next($request);
        });
    }

    public function getCities($province_id)
    {
        $cities = Region::whereRaw('LEFT(kode, 2) = ?' , [$province_id])
            ->whereRaw('CHAR_LENGTH(kode) = 5')
            ->get();

        return $cities;
    }
    
    public function getDistricts($city_id)
    {
        $districts = Region::whereRaw('LEFT(kode, 5) = ?' , [$city_id])
            ->whereRaw('CHAR_LENGTH(kode) = 8')
            ->get();

        return $districts;
    }

    public function getProvinces()
    {
        $province = Region::whereRaw('CHAR_LENGTH(kode) = 2')->get();
        return $province;
    }

}
