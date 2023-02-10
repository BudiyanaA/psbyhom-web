<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Preorder;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

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

    public function store(Request $request)
    {
    $validated = $request->validate([
        'qty' => 'required',
        'link' => 'required|url',
        'name' => 'required',
        'color' => 'required',
        'sizeweight' => 'required',
        'price' => 'required',
        'info' => 'required',
    ]);

    try {

        Preorder::create([
            'qty' => $request->qty,
            'link' => $request->link,
            'name' => $request->name,
            'color' => $request->color,
            'sizeweight' => $request->sizeweight,
            'price' => $request->price,
            'info' => $request->info,
        ]);

        Mail::to("dederizki130102@gmail.com")->send(new SendEmail());

        return redirect(route('pre_order.index'))
            ->withSuccess("Data berhasil ditambahkan");

    } catch(\Exception $e) {
        dd($e);
        return redirect()->back()->withError('Data gagal ditambahkan');
    }
}
public function show($id)
{
    //
}
}
