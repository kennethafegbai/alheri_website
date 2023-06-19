<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\PaymentTrait;
use App\Mail\reserveSuccess;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ReserveNotification;

class paymentController extends Controller
{
    use PaymentTrait;

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'customer_name' => 'required',
            'customer_tel' => 'required',
            'customer_email' => 'required',
            'customer_address' => 'required',
            'arrival' => 'required',
            'departure' => 'required',
            'persons' => 'required',
            'room_id' => 'required',
            'category_id' => 'required',
        ]);

        //$secret_key = env('PAYSTACK_PUBLIC_KEY');
        $secret_key = env('PAYSTACK_SECRET_KEY');

        $curl = curl_init();
        $callback_url = route('paystack.success'); // url to go to after payment
        $amount = $request->amount * 100;

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'amount' => $amount,
                'email' => $request->customer_email,
                'callback_url' => $callback_url
            ]),
            CURLOPT_HTTPHEADER => [
                "authorization: Bearer " . $secret_key, //replace this with your own test key
                "content-type: application/json",
                "cache-control: no-cache"
            ],
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        if ($err) {
            return redirect()->back()->with('error', $err);
        }

        $tranx = json_decode($response, true);
        session(['paystack_request' => $request->all()]);
        if (!$tranx['status']) {
            return redirect()->back()->with("error", $tranx['message']);
        }
        return redirect($tranx['data']['authorization_url']);
    }


    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function successPaystack(Request $request)
    {
        $paystack_request = session('paystack_request');

        if ($request['trxref'] === $request['reference']) {

            $this->createReserve(
                $request['reference'],
                $paystack_request['amount'],
                $paystack_request['customer_name'],
                $paystack_request['customer_tel'],
                $paystack_request['customer_email'],
                $paystack_request['customer_address'],
                $paystack_request['arrival'],
                $paystack_request['departure'],
                $paystack_request['persons'],
                $paystack_request['room_id'],
                $paystack_request['category_id'],
                0
            );

            $reserve = ['name'=>$paystack_request['customer_name']];

            $admins = User::all();

            $details = [
                'greeting' => 'Hello Admin',
                'body' => $paystack_request['customer_name'] . 'booked a reservation',
                'thanks' => "Regards",
                'actionText' => 'View reservation',
                'actionURL' => url('/admin/reservations'),
                'customer' => $paystack_request['customer_name'],
            ];
            try{
                Mail::to($paystack_request['customer_email'])->send(new reserveSuccess($reserve));

                Notification::send($admins, new ReserveNotification($details));

                return redirect()->route('payment.successfull');

            }catch(exception $e){
                return redirect()->route('payment.successfull');
            }

        }  
        session()->flash('error', 'Something went wrong.');

        return back();

        }
    

    public function paymentSuccess(){
            return redirect('/')->with('success', 'Your reservation was successful, Thanks for the patronage');
     
    }
}
