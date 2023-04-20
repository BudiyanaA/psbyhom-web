<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Slide;
use App\Models\MsFrontpageSlideshow;

class SlideManagementController extends Controller
{
    public function index()
    {
        $data['slides'] = MsFrontpageSlideshow::whereIn('status', ['01', '02'])
            ->orderBy('seq', 'ASC')->get();
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
        'image' => 'required|max:2048',
        'slideshow_no' => 'required',
        'notes' => 'required',
        'status' => 'required',
    ]);
    DB::beginTransaction();
    try {
        $image = $request->file('image');
        $name_image = time()."_".$image->getClientOriginalName();
        $destination = 'assets/images';
        $image->move($destination,$name_image);
        Slide::create([
            'slideshow_name' => $request->slideshow_name,
            'hyperlink' => $request->hyperlink,
            'image' => $name_image,
            'slideshow_no' => $request->slideshow_no,
            'notes' => $request->notes,
            'status' => $request->status,
        ]);
        DB::commit();
        return redirect(route('slideshow_management.index'))
            ->withSuccess("Data berhasil ditambahkan");
            
    } catch(\Exception $e) {
        DB::rollback();
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
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_image = time()."_".$image->getClientOriginalName();
            $destination = 'assets/images';
            $image->move($destination,$name_image);
            $data['image'] = $name_image;
        }

        DB::beginTransaction();
        try {

            $slide = Slide::find($id);
            $slide->update([
                'slideshow_name' => $request->slideshow_name,
                'hyperlink' => $request->hyperlink,
                'image' => $name_image,
                'slideshow_no' => $request->slideshow_no,
                'notes' => $request->notes,
                'status' => $request->status,
            ]);
            DB::commit();
            return redirect(route('slideshow_management.index'))
                ->withSuccess("Data berhasil diubah");
                
        } catch(\Exception $e) {
            DB::rollback();
            return redirect()->back()->withError('Data gagal diubah');
        }
    }
}
