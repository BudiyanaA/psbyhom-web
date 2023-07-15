<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SysParam;

class SystemController extends Controller
{
    public function index()
    {
        $runing_text = SysParam::where('sys_id', 'SYS_PARAM_100')->first(); 
        $email_notif = SysParam::where('sys_id', 'SYS_PARAM_16')->first();
        $footer_notif = SysParam::where('sys_id', 'SYS_PARAM_43')->first();
        $exhange_rate = SysParam::where('sys_id', 'SYS_PARAM_44')->first();
        $exchange_rate_sgd = SysParam::where('sys_id', 'SYS_PARAM_99')->first();
        return view('system.index', ['runing_text' => $runing_text,'email_notif' => $email_notif,'footer_notif' => $footer_notif,'exhange_rate' => $exhange_rate,'exchange_rate_sgd' => $exchange_rate_sgd]);
    }

    public function create()
    {
        return view('system.create');
    }

    public function store(Request $request)
    {
        // 
    }

    public function edit($id)
    {  
        return view('system.edit');
    }

    public function update(Request $request)
    {
        try {

            $runningText = $request->input('running_text');
            $adminEmailNotif = $request->input('admin_email_notif');
            $footer_notif = $request->input('footer_notif_email');
            $exhange_rate = $request->input('exchange_rate');
            $exchange_rate_sgd = $request->input('exchange_rate_sgd');
    
            SysParam::updateOrCreate(
                ['sys_id' => 'sys_param_100'],
                ['value_1' => $runningText]
            );
    
            SysParam::updateOrCreate(
                ['sys_id' => 'sys_param_16'],
                ['value_1' => $adminEmailNotif]
            );
    
            SysParam::updateOrCreate(
                ['sys_id' => 'sys_param_43'],
                ['value_1' => $footer_notif]
            );
    
            SysParam::updateOrCreate(
                ['sys_id' => 'sys_param_44'],
                ['value_1' => $exhange_rate]
            );

            SysParam::updateOrCreate(
                ['sys_id' => 'sys_param_99'],
                ['value_1' => $exchange_rate_sgd]
            );
        
            return redirect(route('system_params'))
            ->withSuccess("Data berhasil diubah");
        } catch(\Exception $e) {
            dd($e);
            return redirect()->back()->withError('Data gagal diubah');
        } 
    }

    public function destroy($id)
    {
    //    
    }
}
