<?php

namespace App\Http\Controllers;

use App\Models\ServiceSchedule;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class ServiceScheduleController extends Controller
{
    public function index()
    {
        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $schedules = ServiceSchedule::all();
            return view('admin.service_schedule.index', compact('schedules', 'user_session'));
        }
    }

    public function create()
    {
        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            return view('admin.service_schedule.create', compact('user_session'));
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'day_of_week' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $schedule = ServiceSchedule::create([
            'user_id' => Session::get('LoggedIn'),
            'day_of_week' => $validatedData['day_of_week'],
            'start_time' => $validatedData['start_time'],
            'end_time' => $validatedData['end_time'],
        ]);

        return redirect('admin.service-schedule')->with('success', 'Service schedule added successfully!');
    }

    public function edit(ServiceSchedule $serviceSchedule)
    {
        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            return view('service_schedule.edit', compact('serviceSchedule', 'user_session'));
        }
    }

    public function update(Request $request, ServiceSchedule $serviceSchedule)
    {
        $validatedData = $request->validate([
            'day_of_week' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $schedule = ServiceSchedule::update([
            'user_id' => auth()->id(),
            'day_of_week' => $validatedData['day_of_week'],
            'start_time' => $validatedData['start_time'],
            'end_time' => $validatedData['end_time'],
        ]);

        return redirect()->route('service-schedule.index')->with('success', 'Service schedule updated successfully!');
    }

    public function destroy(ServiceSchedule $serviceSchedule)
    {
        $serviceSchedule->delete();
        return redirect()->route('service-schedule.index')->with('success', 'Service schedule deleted successfully!');
    }
}
