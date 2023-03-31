<?php

namespace App\Http\Controllers;
use App\Events\MyEvent;
use App\Models\User;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    
    public function show(Request $request)//一つの画面を見る
    {      
        event(new MyEvent($request->id, $request->seatId));
           return response()->json(
        $request,JSON_UNESCAPED_UNICODE
    ); 
    }
     public function destroy(Request $request)//一つの画面を見る
    {      
        event(new MyEvent($request->id, $request->seatId));
           return response()->json(
        $request,JSON_UNESCAPED_UNICODE
    ); 
    
 
    }
 //
}
