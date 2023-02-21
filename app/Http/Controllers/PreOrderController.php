<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TrRequestOrderDtl;
use App\Models\TrRequestOrder;
use App\Models\LogActv;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Auth;

class PreOrderController extends Controller
{
    public function index()
    {
        return view('preorder.notification');
    }

    public function create()
    {
 
        return view('preorder.create');
    }

    function generateRandomString($length = 2) 
		{
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

    public function generate_ro_id()
    {
        $id = date('Y');
        $date = str_replace("-", "", $id);
        $query = DB::select('SELECT RIGHT(request_id,4) as request_id FROM tr_request_order 
                            WHERE YEAR(created_date) = "' . date('Y') . '"
                            ORDER BY RIGHT(request_id,4) DESC');

        if (!isset($query[0]->request_id)) {
            $po_id = '0001';
        } else {
            $latest_id = $query[0]->request_id;
            $po_id = $latest_id + 1;
            if (strlen($po_id) == 1) {
                $po_id = '000' . $po_id;
            } else if (strlen($po_id) == 2) {
                $po_id = '00' . $po_id;
            } else if (strlen($po_id) == 3) {
                $po_id = '0' . $po_id;
            }
        }
        return $po_id;
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


    public function store(Request $request)
    {
        $validated = $request->validate([
            'qty' => 'required|numeric|min:1',
            'product_url' => 'required|url',
            'product_name' => 'required',
            'color' => 'required',
            'size' => 'required',
            'price_customer' => 'required|numeric|min:1',
            'status' => 'required',
        ]);
        
        try {
            $qty = (int)$validated['qty'];
            $info = "some info"; 
            $seq = 1;
            $sys = 1.07 ;
            $uuid = Str::uuid()->toString();
            $total_items = 0;
           
            for ($i = 0; $i < $qty; $i++) {
                TrRequestOrderDtl::create([
                    'RequestOrderUUID' => $uuid,
                    'qty' => $validated['qty'],
                    'remarks' => $info,
                    'product_url' => $validated['product_url'],
                    'product_name' => $validated['product_name'],
                    'color' => $validated['color'],
                    'size' => $validated['size'],
                    'price_customer' => $validated['price_customer'],
                    'forex_rate' => $sys,
                    'subtotal_original' => ($qty * $validated['price_customer']) * $sys,
                    'status' => '00',
                    'seq' => $seq++,
                ]);
                $total_items += $validated['qty'];
                $total_price = $validated['price_customer'] * $qty;
                $CustomerUUID = $this->newid();
            }
            
            TrRequestOrder::create([
                'CustomerUUID' => $CustomerUUID,
                'RequestOrderUUID' => $uuid,
                'request_id' => $this->generateRandomString().date('y').date('m').$this->generate_ro_id(),
                'created_date' => date('Y-m-d H:i:s'),
                'status' => '00',
                'forex' => $sys,
                'factor' => '1.07',
                'total_items' => $total_items,
                'total_price' => $total_price,
                'ByUserUUID' => $CustomerUUID,
                'ByUserIP' => $request->ip(),
                'OnDateTime' => date('Y-m-d H:i:s')
            ]);

            $customer_name = Auth::user()->name;
            $request_id = $this->generateRandomString().date('y').date('m').$this->generate_ro_id();
            LogActv::create([
                'user_id' => $customer_name,
                'UserUUID' => $CustomerUUID,
                'menu_nm' => 'Submit Request Order',
                'log_time' => date('Y-m-d H:i:s'),
                'Description' => 'Submit Request Order : '.$request_id,
                'LogType' => 'Create',
                'user_type' => 'Customer',
                'RefUUID' => $CustomerUUID,
                'is_financial' => '1',
                'is_error' => '0',
                'ByUserUUID' => $CustomerUUID,
                'ByUserIP' => $request->ip(),
                'OnDateTime' => date('Y-m-d H:i:s')
            ]);
        
            Mail::to("dederizki130102@gmail.com")->send(new SendEmail());
        
            return redirect(route('preorder.notification'))
                ->withSuccess("Data berhasil ditambahkan");
                
        
        } catch(\Exception $e) {
            dd($e);;
            return redirect()->back()->withError('Data gagal ditambahkan');
        }
}
public function show($id)
{
    //
}

public function list()
    {
        return view('preorder.list');
    }

}
