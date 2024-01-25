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
    public function create()
    {
        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            return view('credit_reload_promotions.create', compact('user_session'));
        }
    }
    public function store(Request $request)
    {
        // Validation logic goes here
        $amount = $request->input('amount');


        $discountedAmount = $amount - ($amount * $request->discount_percentage / 100);

        CreditReloadPromotion::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'minimum_amount' => $request->minimum_amount,
            'discount_percentage' => $request->discount_percentage,
            'discounted_amount' => $discountedAmount,
        ]);

        return redirect('admin/credit_reload_promotions')->with('success', 'Credits created successfully');
    }

    public function edit($id)
    {
        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $existingPromotion = CreditReloadPromotion::find($id);
            return view('credit_reload_promotions.edit', compact('existingPromotion', 'user_session'));
        }
    }

    public function update(Request $request,  $promotion)
    {
        // Validation logic goes here

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

        // Assuming you want to update an existing promotion, you should find it first
        $existingPromotion = CreditReloadPromotion::find($request->promotion_id);

        if ($existingPromotion) {
            // Update the promotion
            $existingPromotion->update([
                'name' => $request->name,
                'amount' => $request->amount,
                'minimum_amount' => $request->minimum_amount,
                'discount_percentage' => $request->discount_percentage,
                'discounted_amount' => $discountedAmount,
            ]);

            // Optionally, you may want to return a response or redirect after the update
            return redirect('admin/credit_reload_promotions')->with('success', 'Credits updated successfully');
        } else {
            // Handle the case where the promotion to update is not found
            return redirect('admin/credit_reload_promotions')->with('error', 'Credits not found');
        }
    }

    public function destroy($promotion)
    {
        $promotion = CreditReloadPromotion::find($promotion);
        $promotion->delete();


        // Optionally, you may want to return a response or redirect after the delete
        return redirect('admin/credit_reload_promotions')->with('success', 'Promotion deleted successfully');
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
