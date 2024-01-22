<?php

namespace App\Http\Controllers;

use App\Models\CreditReloadPromotion;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class CreditReloadPromotionController extends Controller
{
    public function index()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            // Display credit reload promotions
            $promotions = CreditReloadPromotion::all();
            return view('credit_reload_promotions.index', compact('promotions', 'user_session'));
        }
    }
    public function reload(Request $request)
    {
        $amount = $request->input('amount');

        // Check for applicable promotions
        $promotion = CreditReloadPromotion::where('minimum_amount', '<=', $amount)->first();

        if ($promotion) {
            // Apply discount
            $discountedAmount = $amount - ($amount * $promotion->discount_percentage / 100);
        } else {
            // No promotion, use the original amount
            $discountedAmount = $amount;
        }

        // Process the credit reload with $discountedAmount
        // ...

        return redirect()->route('credit_reloads.index')->with('success', 'Credit reloaded successfully');
    }
}
