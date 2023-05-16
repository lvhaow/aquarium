<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function MapSetup() {
        $allmap = Map::find(1);
        return view('admin.map.map_all', compact('allmap'));
    }

    public function UpdateMap(Request $request) {
        $map_id = $request->id;

        Map::findOrFail($map_id)->update([
            'map' => $request->map,
        ]);
        $notification = array(
            'message' => 'Map Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    
}
