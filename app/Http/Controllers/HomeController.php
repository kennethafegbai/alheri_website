<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\Room;

class HomeController extends Controller
{
    public function index(){
        $rooms = Category::all()->take(8);

        foreach($rooms as $room){
            $room['total'] = Room::where('category_id', $room->id)->count();
            $room['active'] = Room::where('status', $room->status)->count();
        }
        return view('home', ['rooms'=>$rooms]);
    }
}
