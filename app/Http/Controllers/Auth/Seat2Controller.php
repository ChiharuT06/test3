<?php

namespace App\Http\Controllers;
use App\Events\MyEvent2;
use App\Models\User;
use Illuminate\Http\Request;

class Seat2Controller extends Controller
{
    
     public function delete($id)//一つの画面を見る
    {      
        event(new MyEvent2(delete($id)));
         
    ); 
    
 
    }
 //
}
