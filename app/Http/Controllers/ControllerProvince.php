<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ControllerProvince extends Controller
{
    public function amphoe(Request $request){
        $amphoe = Province::where('province', $request->province)->select('amphoe')->distinct()->get();
        return  response()->json($amphoe);
    } // End Method

    public function tambon(Request $request){
        $tambon = Province::where('amphoe', $request->amphoe)->select('tambon')->distinct()->get();
        return  response()->json($tambon);
    } // End Method

    public function zipcode(Request $request){
        $tambon = Province::where('tambon', $request->tambon)->select('zipcode')->distinct()->get();
        return  response()->json($tambon);
    } // End Method
}
