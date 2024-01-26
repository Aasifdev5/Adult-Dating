<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class FundController extends Controller
{
    public function getBalance()
    {
        $balance = Balance::firstOrFail();
        return response()->json(['balance' => $balance]);
    }

    public function deposit(Request $request)
    {
        $amount = $request->input('amount');

        $balance = Balance::firstOrNew([]);
        $balance->amount += $amount;
        $balance->save();

        return response()->json(['message' => 'Deposit successful']);
    }

    public function withdraw(Request $request)
    {
        $amount = $request->input('amount');

        $balance = Balance::firstOrFail();
        if ($balance->amount < $amount) {
            return response()->json(['error' => 'Insufficient funds']);
        }

        $balance->amount -= $amount;
        $balance->save();

        return response()->json(['message' => 'Withdrawal successful']);
    }
    public function balance()
    {

        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            $balance = Balance::all();


            return view('admin.balance', compact('user_session', 'balance'));
        }
    }
    public function withdraws()
    {

        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            $balance = Withdraw::all();


            return view('admin.withdraw', compact('user_session', 'balance'));
        }
    }
    public function add_balance()
    {
        if (Session::has('LoggedIn')) {

            $users = User::join('credit_reloads', 'users.id', '=', 'credit_reloads.user_id')
                ->where('users.status', '1')
                ->where('users.is_super_admin', '0')
                ->where('credit_reloads.accepted', '1')
                ->groupBy('users.id') // Adding GROUP BY clause
                ->get(['users.*']);

            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.add_balance', compact('user_session', 'users'));
        }
    }
    public function save_balance(Request $request)
    {
        $balance = new Balance();
        $request->validate([

            'user_id' => 'required',
            'balance' => 'required'
        ]);
        $user = User::findOrFail($request->user_id);
        $amount = $request->input('balance');

        $user->balance += $amount;
        $user->save();

        $balance->user_id = $request->user_id;

        $balance->amount = $request->balance;

        $data = $balance->save();
        if ($data) {
            return redirect('admin/balance')->with('success', 'Credits Add Successfully');
        } else {
            return back()->with('fail', 'failed');
        }
    }
    public function edit_balance($id)
    {
        if (Session::has('LoggedIn')) {

            $users = User::where('status', '1')->where('is_super_admin', '0')->get();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $balance = Balance::find($id);
            return view('admin.edit_balance', compact('user_session', 'balance', 'users'));
        }
    }
    public function update_balance(Request $request)
    {

        $request->validate([

            'user_id' => 'required',
            'balance' => 'required'
        ]);

        $user = User::findOrFail($request->user_id);
        $amount = $request->input('balance');

        $user->balance += $amount;
        $user->save();


        $Balance = Balance::where('id', '=', $request->id)->update([
            'user_id' => $request->user_id,
            'amount' => $request->balance,
        ]);
        if ($Balance) {
            return redirect('admin/balance')->with('success', 'Credits Updated Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }
    public function delete_balance($id)
    {
        $Balance = Balance::find($id);
        $user = User::findOrFail($Balance->user_id);
        $user_balance = $user->balance - $Balance->amount;
        $user_balance_update = User::where('id', '=', $Balance->user_id)->update([

            'balance' => 0,
        ]);
        // dd($Balance->amount);


        $Balance->delete();

        return back()->with('success', 'Deleted Succesuufully');
    }
}
