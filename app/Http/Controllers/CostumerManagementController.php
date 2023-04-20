<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registercostumer;

class CostumerManagementController extends Controller
{
    public function index(Request $request)
    {
        $data['costumer'] = Registercostumer::orderBy('created_date', 'DESC');
        if ($request->customer_name) {
            $data['costumer'] = $data['costumer']->where('customer_name', 'like', '%' . $request->customer_name . '%');
        }
        $data['costumer'] = $data['costumer']->paginate(10);
        return view('costumer.index',$data);
    }
}
