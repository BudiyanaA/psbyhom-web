<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrRequestOrder;
use App\Models\SysParam;
use App\Models\TrRequestOrderDtl;
use App\Models\LogActv;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class ApprovalController extends Controller
{
    public function index()
    {
        
        return view('approval.index');
    }
    public function edit(Request $request, $id)
    {
        $data['order'] = TrRequestOrder::with('customer')->where('RequestOrderUUID', $id)->first();
        $data['forex'] = SysParam::where('sys_id', 'SYS_PARAM_44')->first()->value_1;
        $data['requestorder'] = TrRequestOrderDtl::where('RequestOrderUUID', $id)
            ->orderBy('seq', 'ASC')->get();
        return view('approval.edit',$data);     
    }

    function newid()
		{
			$uuid = sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
			mt_rand( 0, 0x0fff ) | 0x4000,
			mt_rand( 0, 0x3fff ) | 0x8000,
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ) );
			return $uuid;
		}

    public function update(Request $request, $id)
    {
        $AdminUUID = session('admin_id');
        $username = session('admin_name');
        try {

TrRequestOrder::where('RequestOrderUUID', $id)
    // ->firstOrFail()
    ->update([
        'total_price' =>  $request->grand_totals,
        'note' =>  $request->note,
        'status' => '01',
        'ByUserUUID' => $AdminUUID,
        'ByUserIP' => $request->ip(),
        'OnDateTime' => date('Y-m-d H:i:s')
    ]);

            $tr = TrRequestOrderDtl::where('RequestOrderUUID', $id)
            ->orderBy('seq', 'ASC')->get();
            
            TrRequestOrderDtl::where('RequestOrderUUID', $id)->update([
                'product_name' => $request->product_name,
				'qty' => $request->qty,
				'product_url' => $request->product_url,
				'price_customer' => $request->price_customer,
				'size'	=> $request->size,
				'color' => $request->color,
				'disc_percentage' => $request->disc_percentage,
				'additional_fee' => $request->additional_fee,
				'subtotal_final' => $request->subtotal_final,
				'forex_rate' => $request->forex_rate,
				'remarks' => $request->remarks
            ]);

            LogActv::create([
                'id' => $this->newid(),
                'user_id' => $username,
                'UserUUID' => $AdminUUID,
                'menu_nm' => 'Update RequestOrder',
                'log_time' => date('Y-m-d H:i:s'),
                'Description' => '<b>Update RequestOrder : </b>'.$request->input('request_id'),
                'LogType' => 'Update',
                'user_type' => 'Admin',
                'RefUUID' => $AdminUUID,
                'is_financial' => '0',
                'is_error' => '0',
                'ByUserUUID' => $AdminUUID,
                'ByUserIP' => $request->ip(),
                'OnDateTime' => date('Y-m-d H:i:s')
            ]);

            Mail::to("dederizki130102@gmail.com")->send(new SendEmail());
    
            return redirect(route('order.notification'))
                ->withSuccess("Data berhasil diubah");
                
        } catch(\Exception $e) {
            dd($e);
            return redirect()->back()->withError('Data gagal diubah');
        }
    }

    public function show(Request $request, $id)
    {
        return view('approval.detail');
    }

    public function notification()
    {
        return view('approval.notification');
    }

}
