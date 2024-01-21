<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// app/Http/Controllers/AdController.php

use App\Models\User;
use Illuminate\Support\Facades\Session;

use App\Models\Ad;
use App\Http\Controllers\Controller;

class AdController extends Controller
{
    public function index()
    {
        if (Session::has('LoggedIn')) {


            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $ads = Ad::all();
            return view('admin.ads.index', compact('ads', 'user_session'));
        }
    }

    public function create()
    {
        if (Session::has('LoggedIn')) {


            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            return view('admin.ads.create', compact('user_session'));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'ad_type' => 'required|string',
            'price' => 'required',
            'detail' => 'required|string',
            'publish' => 'boolean',

        ]);

        Ad::create($request->all());

        return redirect()->route('admin.ads.index')->with('success', 'Ad created successfully');
    }

    public function edit($id)
    {
        if (Session::has('LoggedIn')) {


            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $ad = Ad::findOrFail($id);
            return view('admin.ads.edit', compact('ad', 'user_session'));
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ad_type' => 'required|string',
            'price' => 'required',
            'detail' => 'required|string',
            'publish' => 'boolean',

        ]);

        $ad = Ad::findOrFail($id);
        $ad->update($request->all());

        return redirect()->route('admin.ads.index')->with('success', 'Ad updated successfully');
    }

    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);
        $ad->delete();

        return redirect()->route('admin.ads.index')->with('success', 'Ad deleted successfully');
    }
}
