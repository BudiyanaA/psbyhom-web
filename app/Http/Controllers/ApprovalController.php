<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrRequestOrder;
use App\Models\SysParam;
use App\Models\TrRequestOrderDtl;

class ApprovalController extends Controller
{
    public function index()
    {
        
        return view('approval.index');
    }
    public function edit(Request $request, $id)
    {
        $data['order'] = TrRequestOrder::find($id);
        $data['sysparam'] = SysParam::where('sys_id', 'SYS_PARAM_04')->first();
        $data['requestorder'] = TrRequestOrderDtl::get();

        return view('approval.edit',$data);     
    }

    public function show(Request $request, $id)
    {
        return view('approval.detail');
    }

}
