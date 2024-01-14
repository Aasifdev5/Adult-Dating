<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Payment;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Purchase;
use App\Models\Balance;
use App\Models\Withdraw;
class PaypalController extends Controller
{
    public function payment_option(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $purchase_session = $request->session();

            return view('payment_option', compact('user_session', 'purchase_session'));
        }
    }
    public function purchase(Request $request)
    {
        
        $request->validate([
             'project_type' => ['required'],
            'project_subject' => ['required'],
            'project_details' => ['required'],
            ]);
        if (!empty($request->bamount)) {
            $amount = $request->bamount;
        }
       
       
        if (!empty($request->samount)) {
            $amount = $request->samount;
        }

        if (!empty($request->pamount)) {
            $amount = $request->pamount;
        }

        if (empty($request->bamount) && empty($request->samount) && empty($request->pamount)) {
            $amount = $request->mbamount;
        }
        if (empty($request->bamount) && empty($request->samount) && empty($request->pamount) && empty($request->mbamount)) {
            $amount = $request->msamount;
        }
        if (empty($request->bamount) && empty($request->samount) && empty($request->pamount) && empty($request->mbamount) && empty($request->msamount)) {
            $amount = $request->mpamount;
        }
        if (!empty($request->Examount)) {
            $amount = $request->Examount;
        }
        if (!empty($request->MExamount)) {
            $amount = $request->MExamount;
        }
        if (!empty($request->amount) && empty($request->bamount) && empty($request->samount) && empty($request->pamount)) {
            $amount = $request->amount;
        }
        if (!empty($request->Mamount) && empty($request->mbamount) && empty($request->msamount) && empty($request->mpamount) ) {
            $amount = $request->Mamount;
        }
        // dd($request->all());
        // $amount = $request->amount;

        // if ($amount === null) {
        //     // Handle the case when $amount is still null after all conditions
        //     return redirect()->route('cancel');
        // }
       
        session()->put('product_id', $request->product_id);
        session()->put('user_id', $request->user_id);
        session()->put('project_type', $request->project_type);
        session()->put('project_subject', $request->project_subject);
        session()->put('project_details', $request->project_details);
        session()->put('bfirstmodel', $request->bfirstmodel);
        session()->put('sfirstmodel', $request->sfirstmodel);
        session()->put('pfirstmodel', $request->pfirstmodel);
        session()->put('bsecondmodel', $request->bsecondmodel);
        session()->put('ssecondmodel', $request->ssecondmodel);
        session()->put('psecondmodel', $request->psecondmodel);
        session()->put('bthirdmodel', $request->bthirdmodel);
        session()->put('sthirdmodel', $request->sthirdmodel);
        session()->put('pthirdmodel', $request->pthirdmodel);
        session()->put('bdashboard', $request->bdashboard);
        session()->put('sdashboard', $request->sdashboard);
        session()->put('pdashboard', $request->pdashboard);
        session()->put('amount', $amount);

        // Insert data into database
        $purchase = new Purchase();
 if (!empty($request->material_file)) {

            $image = $request->file('material_file')->getClientOriginalName();
            $final =  $request->material_file->move(public_path('material_file'), $image);
            $material_file = $_FILES['material_file']['name'];
            session()->put('material_file', $material_file);
            $purchase->material_file = $material_file;
        }
        $purchase->product_id = $request->product_id;
        $purchase->user_id = $request->user_id;
        $purchase->project_type = $request->project_type;
        $purchase->project_subject = $request->project_subject;
        $purchase->project_details = $request->project_details;
        
        $purchase->bfirstmodel = $request->bfirstmodel;
        $purchase->sfirstmodel = $request->sfirstmodel;
        $purchase->pfirstmodel = $request->pfirstmodel;

        $purchase->bsecondmodel = $request->bsecondmodel;
        $purchase->ssecondmodel = $request->ssecondmodel;
        $purchase->psecondmodel = $request->psecondmodel;
        $purchase->bthirdmodel = $request->bthirdmodel;
        $purchase->sthirdmodel = $request->sthirdmodel;
        $purchase->pthirdmodel = $request->pthirdmodel;
        $purchase->bdashboard = $request->bdashboard;
        $purchase->sdashboard = $request->sdashboard;
        $purchase->pdashboard = $request->pdashboard;

        $purchase->amount = $amount;

        $purchase->save();

        return redirect()->route('payment_option');
    }
    public function paypal(Request $request)
    {
        // dd($request->session());

        if ($request->balance_payment=="on") {
            $user = User::findOrFail($request->user_id);
            $user_balance=$user->balance - $request->amount;
            $user_balance_update = User::where('id', '=', $request->user_id)->update([

                'balance' =>$user_balance,
            ]);
            $balance = Balance::where('user_id', '=', $request->user_id)->first();
            $user_balances=$balance->amount - $request->amount;
            $admin_balance_update = Balance::where('user_id', '=', $request->user_id)->update([

                'amount' =>$user_balances,
            ]);
            if(empty(session()->get('user_id'))){
                $user_id=$request->user_id;
            }else{
                $user_id=session()->get('user_id');
            }
            $payment_id=Str::random(20);
            // Insert data into database
            $payment = new Payment;
            $payment->payment_id = $payment_id;
            $payment->product_id = session()->get('product_id');
            $payment->user_id = $user_id;
            $payment->project_type = session()->get('project_type');
            $payment->project_subject = session()->get('project_subject');
            $payment->project_details = session()->get('project_details');
            $payment->bfirstmodel = session()->get('bfirstmodel');
            $payment->sfirstmodel = session()->get('sfirstmodel');
            $payment->pfirstmodel = session()->get('pfirstmodel');

            $payment->bsecondmodel = session()->get('bsecondmodel');
            $payment->ssecondmodel = session()->get('ssecondmodel');
            $payment->psecondmodel = session()->get('psecondmodel');
            $payment->bthirdmodel = session()->get('bthirdmodel');
            $payment->sthirdmodel = session()->get('sthirdmodel');
            $payment->pthirdmodel = session()->get('pthirdmodel');
            $payment->bdashboard = session()->get('bdashboard');
            $payment->sdashboard = session()->get('sdashboard');
            $payment->pdashboard = session()->get('pdashboard');
            $payment->material_file = session()->get('material_file');
            $payment->amount = $request->amount;
            $payment->currency = 'USD';
            $payment->payer_name = $user->name;
            $payment->payer_email = $user->email;
            $payment->payment_status = 'Success';
            $payment->payment_method = "Wallet";
            $payment->save();
            if($user_balance_update){
                return redirect('dashboard')->with('success','Payment is successful through balance');
            }else{
                return back()->with('fail','Error in payment. Please try again!');
            }

        }


        if ($request->amount === null) {
            // Handle the case when $amount is still null after all conditions
            return redirect()->route('cancel');
        }

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success'),
                "cancel_url" => route('cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->amount
                    ]
                ]
            ]
        ]);

        // dd($response);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {


                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('cancel');
        }
    }
    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        //dd($response);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            // Insert data into database
            $payment = new Payment;
            $payment->payment_id = $response['id'];
            $payment->product_id = session()->get('product_id');
            $payment->user_id = session()->get('user_id');
            $payment->project_type = session()->get('project_type');
            $payment->project_subject = session()->get('project_subject');
            $payment->project_details = session()->get('project_details');
            $payment->material_file = session()->get('material_file');
            $payment->bfirstmodel = session()->get('bfirstmodel');
            $payment->sfirstmodel = session()->get('sfirstmodel');
            $payment->pfirstmodel = session()->get('pfirstmodel');

            $payment->bsecondmodel = session()->get('bsecondmodel');
            $payment->ssecondmodel = session()->get('ssecondmodel');
            $payment->psecondmodel = session()->get('psecondmodel');
            $payment->bthirdmodel = session()->get('bthirdmodel');
            $payment->sthirdmodel = session()->get('sthirdmodel');
            $payment->pthirdmodel = session()->get('pthirdmodel');
            $payment->bdashboard = session()->get('bdashboard');
            $payment->sdashboard = session()->get('sdashboard');
            $payment->pdashboard = session()->get('pdashboard');

            $payment->amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $payment->currency = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
            $payment->payer_name = $response['payer']['name']['given_name'];
            $payment->payer_email = $response['payer']['email_address'];
            $payment->payment_status = $response['status'];
            $payment->payment_method = "PayPal";
            $payment->save();


            return redirect('dashboard')->with('success', 'Payment is Successfully');
        } else {
            return redirect()->route('cancel');
        }
    }
    public function cancel()
    {
        return back()->with('fail', 'Payment is cancelled.');
    }
    public function save_withdraw(Request $request)
    {
            
            $withdraw = new Withdraw;
            $user = User::findOrFail($request->user_id);
            if($user->balance <= $request->amount){
                return back()->with('fail','Your Withdraw Request Amount more than your balance');
            }
            $user_balance=$user->balance - $request->amount;
            $user_balance_update = User::where('id', '=', $request->user_id)->update([

                'balance' =>$user_balance,
            ]);
            $balance = Balance::where('user_id', '=', $request->user_id)->first();
            $user_balances=$balance->amount - $request->amount;
            $admin_balance_update = Balance::where('user_id', '=', $request->user_id)->update([

                'amount' =>$user_balances,
            ]);
            $withdraw->user_id = $request->user_id;
            $withdraw->amount = $request->amount;
            $withdraw->save();
            return back()->with('success','Your Withdraw Request Successfully Sent');
    }
}
