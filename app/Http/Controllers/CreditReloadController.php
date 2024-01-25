<?php

namespace App\Http\Controllers;

use App\Models\CreditReload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CreditReloadController extends Controller
{
    public function index()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            // Display credit reload requests
            $creditReloads = CreditReload::all();
            return view('admin.credit_reloads.index', compact('creditReloads','user_session'));
        }
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Store credit reload request
        $request->validate([
            'amount' => 'required|numeric',
            'payment_receipt' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);



        $creditReload = new CreditReload([
            'user_id' => $request->user_id,
            'credit_id' => $request->credit_id,
            'amount' => $request->amount,
            'accepted' => false,
        ]);

        if ($request->hasFile('payment_receipt')) {
            $imagePath = $request->file('payment_receipt')->store('payment_receipts');
            $creditReload->payment_receipt = $imagePath;
        }

        $creditReload->save();

        return redirect('dashboard')->with('success', 'Credit reload request submitted');
    }

    public function accept($id)
    {
        // Accept credit reload request
        $creditReload = CreditReload::findOrFail($id);
        $creditReload->accepted = true;
        $creditReload->save();

        // Implement any additional logic such as crediting the user's account

        return redirect()->route('credit_reloads.index')->with('success', 'Credit reload accepted');
    }
}
