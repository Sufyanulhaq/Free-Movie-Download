<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User,Content};
use App\Models\Order;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
class PaymentController extends Controller
{
    public function coinbaseShow(){
        $data = Auth::user();
        $content = Order::latest()->first();
        if (Auth::check()) {
            return view('dashboard.coinbase')->with(compact('data','content'));
        } else {
            return redirect()->route('user.register');
        }
    }


    public function process()
    {
        $order = Order::latest()->first();
        $coinbaseApi = "d3e4c47a-3a95-44ff-b87b-c470550d7695";
        $url = 'https://api.commerce.coinbase.com/checkouts';
    
        $data = [
            'name' => Auth::user()->name,
            'description' => "Payment to Admin",
            'local_price' => [
                'amount' => $order->amount,
                'currency' => 'USD'
            ],
            'metadata' => [
                'trx' => "ABCDEFGHIJKLMNOPRS123456789"
            ],
            'pricing_type' => "fixed_price",
            'requested_info' => [
                'name',
                'email'
                // Add any other desired customer info fields here
            ],
            'redirect_url' => route('user.success'),
            'cancel_url' => route('user.error')
        ];
    
        $yourjson = json_encode($data);
    
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $yourjson,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json',
                'X-CC-Api-Key: ' . $coinbaseApi,
                'X-CC-Version: 2018-03-22' // Include the desired Coinbase API version
            ),
        ));
    
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpCode === 201) {
            $responseData = json_decode($response, true);
                $checkoutId = $responseData['data']['id'];
                $paymentUrl = 'https://commerce.coinbase.com/checkouts/'.$checkoutId;
                return redirect($paymentUrl);
        }
        
        
    
        // Redirect to the error page
        return redirect()->route('user.error');
    }
       
        

    public function checkoutShow($id){
        if(Auth::check()){

        $content = Content::where('id',$id)->orderBy('id','desc')->with('image')->first();
        $data = Auth::user();
        return view('dashboard.checkout')->with(compact('content','data'));
        }
        else{
            return redirect()->route('user.register');
        }
    }
    public function ordersData(Request $request)
    {
        if (Auth::check()) {
            if($request->payment_method==1){
                $user = Auth::user();
                $dataId = $request->input('PAYMENT_ID');
                $paymentId = $dataId . rand(10, 99);
                $order = Order::create([
                    'user_id' => $user->id,
                    'order_id' => $paymentId,
                    'amount' => $request->input('PAYMENT_AMOUNT'),
                    'payment_method' => 1,
                ]);
            return redirect()->route('user.payment');
            }
            else{
                $user = Auth::user();
                $dataId = $request->input('PAYMENT_ID');
                $paymentId = $dataId . rand(10, 99);
                $order = Order::create([
                    'user_id' => $user->id,
                    'order_id' => $paymentId,
                    'amount' => $request->input('PAYMENT_AMOUNT'),
                    'payment_method' => 2,
                ]);
                return redirect()->route('coinbase.show');
            }

        } else {
            return redirect()->route('user.register');
        }
    }
    public function orders(){
        return view('dashboard.pay');
    }
    public function payment(){
        if(Auth::check()){
            $content = Content::first();
            $data = Auth::user('id');
            return view('dashboard.pay')
            ->with(compact('data','content'));
        }
        else{
            return redirect()->route('user.register');
        }
    }
    public function NoPayment(Request $request)
    {
        $order = Order::latest()->first();
        $order->update(['status' => 1]);
        return view('dashboard.error');
    }
    public function success(Request $request)
    {
        $order = Order::latest()->first();
        $order->update(['status' => 0]);
        return view('dashboard.success');
    }
}
