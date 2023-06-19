<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Room;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
        $categories = Category::all();
        foreach($categories as $category){
            $category['total'] = Room::where('category_id', $category->id)->count();
            $category['active'] = Room::where('status', $category->status)->count();
        }
        return view('room', ['categories'=>$categories]);
    }

    public function roomDetails(Category $category){
        $available_rooms = Room::where([['category_id', $category->id], ['status', 0]])->get();
        return view('roomDetails', ['roomDetail'=>$category, 'available_rooms'=>$available_rooms]);
    }
}
