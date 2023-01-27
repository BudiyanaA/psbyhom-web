<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Slide;

class SlideManagementController extends Controller
{
    public function index()
    {
        $data['slides'] = DB::table('slides')->get();
        return view('slideshow.index', $data);
    }

    public function create()
    {
        return view('slideshow.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'slideshow_name' => 'required',
            'hyperlink' => 'required',
            'image' => 'required',
            'slideshow_no' => 'required',
            'notes' => 'required',
        ]);

        try {

            Slide::create([
                'slideshow_name' => $request->slideshow_name,
                'hyperlink' => $request->hyperlink,
                'image' => $request->image,
                'slideshow_no' => $request->slideshow_no,
                'notes' => $request->notes,
            ]);
    
            return redirect(route('slideshow_management.index'))
                ->withSuccess("Data berhasil ditambahkan");
                
        } catch(\Exception $e) {
            return redirect()->back()->withError('Data gagal ditambahkan');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $data['slide'] = Slide::find($id);

        return view('slideshow.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'slideshow_name' => 'required',
            'hyperlink' => 'required',
            'image' => 'required',
            'slideshow_no' => 'required',
            'notes' => 'required',
        ]);

        try {

            $slide = Slide::find($id);
            $slide->update([
                'slideshow_name' => $request->slideshow_name,
                'hyperlink' => $request->hyperlink,
                'image' => $request->image,
                'slideshow_no' => $request->slideshow_no,
                'notes' => $request->notes,
            ]);
    
            return redirect(route('slideshow_management.index'))
                ->withSuccess("Data berhasil diubah");
                
        } catch(\Exception $e) {
            return redirect()->back()->withError('Data gagal diubah');
        }
    }

    public function destroy($id)
    {
        try {
            $slide = Slide::find($id);
            $slide->delete();
            return 'success';

        } catch (\Exception $e) {
            return 'failed';
        }
    }

}
