<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProcesOrderController extends Controller
{
    public function index()
    {
        
        $latest_id = DB::table('preorders')->max('id');
        $data['preorders'] = DB::table('preorders')
            ->where('id', $latest_id)
            ->get();
        return view('processorder.index',$data);
    }

    public function create()
    {
    //    
    }

    public function store(Request $request)
    {
// 
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
// 
    }
    public function update(Request $request, $id)
    {
        // 
    }
}
