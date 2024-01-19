<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $appointments = Appointment::all();

            return view('admin.appointments.index', compact('appointments', 'user_session'));
        }
    }

    public function create()
    {
        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $profiles = Profile::all();
            return view('admin.appointments.create', compact('profiles','user_session'));
        }
    }

    public function store(Request $request)
    {
        // Validate the request


        $profileId = $request->input('profile_id');
        $startTime = $request->input('start_time');
        $endTime = $request->input('end_time');

        // Check subscription status and appointment limits

        Appointment::create([
            'user_id' => '3',
            'profile_id' => '3',
            'start_time' => $startTime,
            'end_time' => $endTime,
            'status' => 'scheduled',
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment scheduled successfully');
    }
}
