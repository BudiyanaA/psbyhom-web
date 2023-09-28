<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Page;

class PageManagementController extends Controller
{
    public function index()
    {
        $data['pages'] = DB::table('ms_page')->get();
        return view('pagemanagement.index', $data);
    }

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['page'] = DB::table('pages')->find($id);
        // $data['page'] = Page::find($id);

        return view('pagemanagement.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'page_name' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);
        DB::beginTransaction();
        try {

            $page = DB::table('pages')
            ->where('id', $id)
            ->update([
                'page_name' => $request->page_name,
                'image' => $request->image,
                'status' => $request->status,
            ]);
            DB::commit();
            return redirect(route('page_management.index'))
                ->withSuccess("Data berhasil diubah");
                
        } catch(\Exception $e) {
            DB::rollback();
            return redirect()->back()->withError('Data gagal diubah');
        }
    }
}
