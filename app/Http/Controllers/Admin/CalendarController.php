<?php

namespace App\Http\Controllers\Admin;

use App\Models\Calendar;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        if (Session::has('LoggedIn')) {


            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $calendars = Calendar::all();
            return view('admin.calendars.index', compact('calendars', 'user_session'));
        }
    }

    public function create()
    {
        if (Session::has('LoggedIn')) {


            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            return view('admin.calendars.create', compact('user_session'));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'details' => 'required|string',
            'days' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Calendar::create($request->all());

        return redirect()->route('admin.calendars.index')->with('success', 'Calendar created successfully');
    }

    public function edit($id)
    {
        if (Session::has('LoggedIn')) {


            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $calendar = Calendar::findOrFail($id);
            return view('admin.calendars.edit', compact('calendar', 'user_session'));
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'details' => 'required|string',
            'days' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $calendar = Calendar::findOrFail($id);
        $calendar->update($request->all());

        return redirect()->route('admin.calendars.index')->with('success', 'Calendar updated successfully');
    }

    public function destroy($id)
    {
        $calendar = Calendar::findOrFail($id);
        $calendar->delete();

        return redirect()->route('admin.calendars.index')->with('success', 'Calendar deleted successfully');
    }
}
