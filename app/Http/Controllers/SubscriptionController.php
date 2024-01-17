<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class SubscriptionController extends Controller
{
    public function paymentReports()
    {
        // Display payment reports and profiles
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $profiles = User::where('is_super_admin','0')->get();
            return view('admin.subscription.payment_reports', compact('profiles','user_session'));
        }
    }

    public function activateSubscription(Request $request)
    {
        // Activate subscription for selected profiles
        $user = Auth::user();
        $profileIds = $request->input('profiles', []);
        $profiles = Profile::whereIn('id', $profileIds)->get();

        // Implement any additional logic such as updating subscription status

        return redirect()->route('subscription.payment_reports')->with('success', 'Subscription activated successfully');
    }
}
