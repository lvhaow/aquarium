<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Image;
use Illuminate\Support\Carbon;

class GalleryController extends Controller
{
    public function AllGallery() {

        $gallery = Gallery::latest()->get();
        return view('admin.gallery.gallery_all', compact('gallery'));
    }

    public function AddGallery(){
        return view('admin.gallery.gallery_add');
    }

    public function StoreGallery(Request $request) {
        $request->validate([
            'gallery_name' => 'required',
            'gallery_title' => 'required',
            'gallery_image' => 'required',
        ],[
            'gallery_name.required' => 'Gallery Name is Required',
            'gallery_title.required' => 'Gallery Title is Required',
        ]);

        $image = $request->file('gallery_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  
        
        Image::make($image)->resize(1020, 519)->save('upload/gallery/' . $name_gen);
        $save_url = 'upload/gallery/' . $name_gen;

        Gallery::insert([
            'gallery_name' => $request->gallery_name,
            'gallery_title' => $request->gallery_title,
            'gallery_description' => $request->gallery_description,
            'gallery_image' => $save_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Gallery Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.gallery')->with($notification);
    }

    public function EditGallery($id){
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.gallery_edit', compact('gallery'));
    }
}
