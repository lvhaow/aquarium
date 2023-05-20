<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Image;
use Illuminate\Support\Carbon;

class GalleryController extends Controller
{
    public function AllGallery()
    {

        $gallery = Gallery::latest()->get();
        return view('admin.gallery.gallery_all', compact('gallery'));
    }

    public function AddGallery()
    {
        return view('admin.gallery.gallery_add');
    }

    public function StoreGallery(Request $request)
    {
        $request->validate([
            'gallery_name' => 'required',
            'gallery_title' => 'required',
            'gallery_image' => 'required',
        ], [
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

    public function EditGallery($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.gallery_edit', compact('gallery'));
    }

    public function UpdateGallery(Request $request)
    {

        $gallery_id = $request->id;

        if ($request->file('gallery_image')) {
            $image = $request->file('gallery_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(1020, 519)->save('upload/gallery/' . $name_gen);
            $save_url = 'upload/gallery/' . $name_gen;

            Gallery::findOrFail($gallery_id)->update([
                'gallery_name' => $request->gallery_name,
                'gallery_title' => $request->gallery_title,
                'gallery_description' => $request->gallery_description,
                'gallery_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Gallery Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.gallery')->with($notification);
        } else {

            Gallery::findOrFail($gallery_id)->update([
                'gallery_name' => $request->gallery_name,
                'gallery_title' => $request->gallery_title,
                'gallery_description' => $request->gallery_description,
       
            ]);
            $notification = array(
                'message' => 'Gallery Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.gallery')->with($notification);
        } // end Else

    } // End Method 

    public function DeleteGallery($id) {
        $gallery = Gallery::findOrFail($id);
        $img =  $gallery->gallery_image;
        unlink($img);
        Gallery::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Gallery Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function GalleryDetails($id) {
        $gallery = Gallery::findOrFail($id);
        return view('frontend.gallery_details', compact('gallery'));
    }

    public function HomeGallery(){

        $gallery = Gallery::latest()->get();
        return view('frontend.gallery',compact('gallery'));
       } // End Method 
}
