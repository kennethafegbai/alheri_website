<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ReserveNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\Mail\reserveSuccess;
use App\Models\Room;
use App\Models\Category;
use App\Models\Reserve;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\user;


class AdminController extends Controller
{
    // dashboard
    public function index(){
        $room_count = Room::count();
        $reserve_count = Reserve::sum('amount');
        $category_count = Category::count();
        return view('admin.index', ['room_count'=>$room_count, 'reserve_count'=>$reserve_count, 'category_count'=>$category_count]);
    }

 // rooms
 public function rooms (){
     $rooms = Room::all();

     foreach($rooms as $room){
         $room['name'] = Category::where('id', $room->category_id)->value('name');
     }

    return view('admin.rooms', ['rooms'=>$rooms]);
}

    public function createRoom (){
        $categories = Category::all();
        return view('admin.createRoom', ['categories'=>$categories]);
    }

    public function editRoom (Room $room){
        $categories = Category::all();
        $room['name'] = Category::where('id', $room->category_id)->value('name');
        return view('admin.editRoom', ['room'=>$room, 'categories'=>$categories]);
    }

    public function storeRoom (Request $request){
        $request->validate([
            'category_id'=>'required',
            'number'=>'required',
         ]);
 
         $input = $request->all();
 
         Room::create($input);
 
         return back()->with('success', 'Room added successfully');
    }

    public function updateRoom (Request $request, Room $room){
        
        $request->validate([
            'category_id'=>'required',
            'number'=>'required',
         ]);
 
         $input = $request->all();
 
         $room->update($input);
 
         return back()->with('success', 'Room updated successfully');
    }

    public function deleteRoom (Room $room){
        
    }

    // category
    public function category (){
       $categories = Category::all();
       foreach($categories as $category){
           $category['total'] = Room::where('category_id', $category->id)->count();
       }
       return view('admin.categories', ['categories'=>$categories]);
    }

    public function createCategory (){
        return view('admin.createCategory');
    }

    public function editCategory (Category $category){
        return view('admin.editCategory', ['category'=>$category]);
    }

    public function storeCategory (Request $request){
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'image'=>'required',
            'desc'=>'required',
        ]);

        $input = $request->all();

        if($request->hasFile('image')){
            $input['image'] = $request->file('image')->store('roomCategory', 'public');
        }

        if($request->service){
            $input['service'] = implode(',',$request->service);
        }

        Category::create($input);

        return back()->with('success', 'Room category added successfully');
    }

    public function updateCategory (Request $request, Category $category){
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            // 'image'=>'required',
            'desc'=>'required',
        ]);

        $input = $request->all();

        if($request->hasFile('image')){
            $input['image'] = $request->file('image')->store('roomCategory', 'public');
            if(File::exists(public_path('storage/'.$category->image)) && $category->image !== 'roomCategory/category.jpg'){
                File::delete(public_path('storage/'. $category->image));
            }
        }

        if($request->service){
            $input['service'] = implode(',',$request->service);
        }

        $category->update($input);

        return back()->with('success', 'Room category updated successfully'); 
    }

    public function deleteCategory (Category $category){
        
    }


// gallery
    public function createGallery (){
        return view('admin.createGallery');
    }

    public function galleries (){
        $galleries = Gallery::all();
        return view('admin.galleries', ['galleries'=>$galleries]);
    }

    public function editGallery (Gallery $gallery){
        return view('admin.editGallery', ['gallery'=>$gallery]);
    }

    public function storeGallery (Request $request){
        $request->validate([
            'image'=>'required',
            'eventName'=>'required'
        ]);

        $input = $request->all();

        if($request->hasFile('image')){
            $input['image'] = $request->file('image')->store('galleries', 'public');
        }
        
        Gallery::create($input);

        return back()->with('success', 'Gallery added successfully');
    }

    public function updateGallery (Request $request, Gallery $gallery){
        $request->validate([
            //'image'=>'required',
            'eventName'=>'required'
        ]);

        $input = $request->all();

        if($request->hasFile('image')){
            $input['image'] = $request->file('image')->store('galleries', 'public');

            if(File::exists(public_path('storage/'.$gallery->image)) && $gallery->image !== 'galleries/gallery.jpg'){
                File::delete(public_path('storage/'. $gallery->image));
            }
        }

        $gallery->update($input);

        return back()->with('success', 'Gallery updated successfully');
    }

    public function deleteGallery (Request $request){
        
    }

    // reservations
    public function reserves (){
        $reserves = Reserve::latest()->get();
        foreach($reserves as $reserve){
            $reserve['category'] = Category::where('id', $reserve->category_id)->value('name');
            $reserve['room'] = Room::where('id', $reserve->room_id)->value('number');

        }
        return view('admin.reserves', ['reserves'=>$reserves]);
    }

    public function createReserve (){
        $categories = Category::all();
        return view('admin.createReserve', ['categories'=>$categories]);
    }

    public function editReserve (Reserve $reserve){
        $categories = Category::all();

        $reserve['room_number'] = Room::where('id', $reserve->room_id)->value('number');
        
        return view('admin.editReserve', ['reserve'=>$reserve, 'categories'=>$categories]);
    }

    public function storeReserve (Request $request){
        $request->validate([
            'invoice'=>'required',
            'amount'=>'required',
            'customer_name'=>'required',
            'customer_tel'=>'required',
            'customer_email'=>'required',
            'customer_address'=>'required',
            'persons'=>'required',
            'category_id'=>'required',
            'room_id'=>'required',
         ]);
 
         $input = $request->all();
 
         $reserve = ['name'=>$request->customer_name];

         $admins = User::all();

         $details = [
             'greeting' => 'Hello Admin',
             'body' => $request->customer_name . ' booked a reservation',
             'thanks' => "Regards",
             'actionText' => 'View reservation',
             'actionURL' => url('/admin/reservations'),
             'customer' => $request->customer_name,
         ];

        try{
            Mail::to($request->customer_email)->send(new reserveSuccess($reserve));
            Notification::send($admins, new ReserveNotification($details));
            Reserve::create($input);
            return back()->with('success', 'Reservation booked successfully, Check mail for confirmation');
        }catch(Exception $e){
            return back()->with('error', 'ERROR: Check your internet connection or mail settings');
        }
        return back()->with('error', 'Something went wrong!!!');
    }

    public function updateReserve (Request $request, Reserve $reserve){
        $request->validate([
            'customer_name'=>'required',
            'customer_tel'=>'required',
            'customer_email'=>'required',
            'customer_address'=>'required',
            'category_id'=>'required',
            'room_id'=>'required',
         ]);
 
         $input = $request->all();
 
         $reserve->update($input);

         return back()->with('success', 'Reservation updated successfully');
    }

    public function settings(){
        
        $setting = Setting::find(1);

        return view('admin.settings', ['setting'=>$setting]); 
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'twitter'=>'required',
            'facebook'=>'required',
            'instagram'=>'required',
            'linkedin'=>'required'
        ]);

        $input = $request->all();

        $setting = Setting::find(1);

        if($request->hasFile('logo')){

            $file = $request->file('logo');

            $fileName = $file->getClientOriginalName();
    
            $path = 'admin/assets/img';
    
            $file->move($path, $fileName);

            $input['logo'] = $fileName;
        }else{
            $input['logo']=$setting->logo;
        }

        $setting->update($input);

        return back()->with('success', 'Changes updated successfully');
    }

    public function checkinOut(Request $request){
        $reserve = Reserve::where('id', $request->id)->first();
        $reserve->status = $request->status;
        $reserve->save();
        session()->flash('success', 'Room status updated');
        return response()->json(["message"=>"status changed"]);

    }

    public function categoryRooms(Request $request){
        $rooms = Room::where([['category_id', $request->category_id], ['status', 0]])->get();
        return response()->json($rooms);
    }


    public function updateConfigSettings(Request $request)
    {
        $this->validate($request, [
            'host' => 'required',
            'port' => 'required',
            'encryption' => 'required',
            'from_name' => 'required',
            'from_address' => 'required',
            'username' => 'required',
            'password' => 'required',
            'paystack_public_key'=>'required',
            'paystack_secret_key'=>'required',
            'paystack_username'=>'required',
        ]);

        if ($request->has('host') && $request->host != config('mail.mailers.smtp.host')) {
            setEnv('MAIL_HOST', $request->host);
        }

        if ($request->has('port') && $request->port != config('mail.mailers.smtp.port')) {
            setEnv('MAIL_PORT', $request->port);
        }

        if ($request->has('username') && $request->username != config('mail.mailers.smtp.username')) {
            setEnv('MAIL_USERNAME', $request->username);
        }

        if ($request->has('password') && $request->password != config('mail.mailers.smtp.password')) {
           setEnv('MAIL_PASSWORD', $request->password);
        }

        if ($request->has('encryption') && $request->encryption != config('mail.mailers.smtp.encryption')) {
           setEnv('MAIL_ENCRYPTION', $request->encryption);
        }

        if ($request->has('from_name') && $request->from_name != config('mail.from.name')) {
            setEnv('MAIL_FROM_NAME', $request->from_name);
        }

        if ($request->has('from_address') && $request->from_address != config('mail.from.address')) {
             setEnv('MAIL_FROM_ADDRESS', $request->from_address);
        }

        if ($request->has('paystack_public_key') && $request->paystack_public_key != config('app.paystack_public_key')) {
            setEnv('PAYSTACK_PUBLIC_KEY', $request->paystack_public_key);
        }

        if ($request->has('paystack_secret_key') && $request->paystack_secret_key != config('app.paystack_secret_key')) {
            setEnv('PAYSTACK_SECRET_KEY', $request->paystack_secret_key);
        }

        if ($request->has('paystack_username') && $request->paystack_username != config('app.paystack_username')) {
           setEnv('MERCHANT_EMAIL', $request->paystack_username);
        }

        \Artisan::call('config:clear');

        return back()->with('success', 'Config settings updated successfully');
    }


    public function updatePassword(Request $request)
    {
     $this->validate($request, [  
            "password" => "required|confirmed",
            "current_password" => "required",
        ]);

        $userId = Auth::user()->id;

         $user = User::find($userId);

        if (Hash::check($request->current_password, $user->password)) {

            $user->password = Hash::make($request->password);

            $user->save();

            Auth::login($user);

           return back()->with('success', 'Password changed successfully');
        }

            return back()->with('error', 'Error, please try again');
    }

    public function customerInquiry(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:11|numeric',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $input = $request->all();

        //  Send mail to admin
        if(env('MAIL_USERNAME')){

            try{
                Mail::send('emails.contact', array(
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'phone' => $input['phone'],
                    'subject' => $input['subject'],
                    'message' => $input['message'],
                ), function($message) use ($request){
                    $message->from($request->email);
                    $message->to(env('MAIL_USERNAME'), 'hello')->subject($request->get('subject'));
                });
                return redirect()->back()->with(['success' => 'Your message have been received. we will get in touch shortly.']);
            }catch(Exception $e){
                return redirect()->back()->with(['error' => 'Something went wrong, try again']);
            }

        }
        
        return redirect()->back()->with(['error' => 'Something went wrong, try again']);
    }

}
