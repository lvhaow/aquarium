<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;


class EventController extends Controller
{
    public function AllEvent()
    {
        $event = Event::latest()->get();
        return view('admin.event.event_all', compact('event'));
    }

    public function AddEvent()
    {
        return view('admin.event.event_add');
    }

    public function StoreEvent(Request $request)
    {
        $image = $request->file('event_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(56, 56)->save('upload/event/' . $name_gen);
        $save_url = 'upload/event/' . $name_gen;

        Event::insert([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'event_image' => $save_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Event Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.event')->with($notification);
    }

    public function EditEvent($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.event_edit', compact('event'));
    }

    public function UpdateEvent(Request $request)
    {
        $event_id = $request->id;

        if ($request->file('event_image')) {
            $image = $request->file('event_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(56, 56)->save('upload/event/' . $name_gen);
            $save_url = 'upload/event/' . $name_gen;

            Event::findOrFail($event_id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'location' => $request->location,
                'event_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Event Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.event')->with($notification);
        } else {

            Event::findOrFail($event_id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'location' => $request->location,

            ]);
            $notification = array(
                'message' => 'Event Updated without Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.event')->with($notification);
        } // end Else
    }

    public function DeleteEvent($id)
    {
        $event = Event::findOrFail($id);
        $img =  $event->event_image;
        unlink($img);
        Event::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Event Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
