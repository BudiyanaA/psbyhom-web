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
        $AdminUUID = session('admin_id');
        $image = $request->file('image');
        $name_image = time()."_".$image->getClientOriginalName();
        $destination = 'assets/img/slide';
        $image->move($destination,$name_image);
        MsFrontpageSlideshow::create([
            'SlideUUID' => $this->newid(),
            'slide_name' => $request->slideshow_name,
            'ArticleUUID' => $request->hyperlink,
            'image_slide' => 'img/slide/' . $name_image,
            'seq' => $request->slideshow_no,
            'remarks' => $request->notes,
            'status' => $request->status,
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => $AdminUUID,
            'ByUserUUID' => $AdminUUID,
            'ByUserIP' =>  $request->ip(),
            'OnDateTime' =>  date('Y-m-d H:i:s')
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

        $data['slide'] = MsFrontpageSlideshow::where('SlideUUID', $id)->first();
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
            $destination = 'assets/img/slide';
            $image->move($destination,$name_image);
            $data['image'] = $name_image;
        }

        DB::beginTransaction();
        try {
            $AdminUUID = session('admin_id');
            $slide = MsFrontpageSlideshow::where('SlideUUID', $id)->first();
            $slide->update([
            'slide_name' => $request->slideshow_name,
            'ArticleUUID' => $request->hyperlink,
            'image_slide' => 'img/slide/' . $name_image,
            'seq' => $request->slideshow_no,
            'remarks' => $request->notes,
            'status' => $request->status,
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => $AdminUUID,
            'ByUserUUID' => $AdminUUID,
            'ByUserIP' =>  $request->ip(),
            'OnDateTime' =>  date('Y-m-d H:i:s')
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
