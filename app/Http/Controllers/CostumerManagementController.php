<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registercostumer;

class CostumerManagementController extends Controller
{
    public function index()
    {
        $data['costumer'] = Registercostumer::get();
        return view('costumer.index',$data);
    }
}
