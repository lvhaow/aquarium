<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    public function BookingCreate(){
        return view('frontend.home_booking', compact('bookings'));
    }

    public function BookingStore(Request $request) {
        Booking::insert([
            'event_id' => $request->event_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'number_of_tickets' => $request->number_of_tickets,
            'description' => $request->description,
            
        ]);
        $notification = array(
            'message' => 'Booking Sent Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function BookingMessage(){
        $bookings = Booking::latest()->get();
        $events = Event::latest()->get();
        return view('admin.booking.allbooking', compact('bookings','events'));
    }

    public function DeleteBooking($id){
        Booking::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Your Booking Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
