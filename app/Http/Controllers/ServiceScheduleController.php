<?php



namespace App\Http\Controllers;

use App\Models\ServiceSchedule;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\Page;

class ServiceScheduleController extends Controller
{
    public function index()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::find(Session::get('LoggedIn'));
            $schedules = ServiceSchedule::where('user_id',Session::get('LoggedIn'))->get();
             $pages = Page::all();
            return view('service_schedule.index', compact('schedules', 'user_session', 'pages'));
        }
    }

    public function create()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::find(Session::get('LoggedIn'));
             $pages = Page::all();
            return view('service_schedule.create', compact('user_session', 'pages'));
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

        return redirect('service-schedule')->with('success', 'Service schedule added successfully!');
    }

    public function edit(ServiceSchedule $serviceSchedule)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::find(Session::get('LoggedIn'));
             $pages = Page::all();
            return view('service_schedule.edit', compact('serviceSchedule', 'user_session', 'pages'));
        }
    }

    public function update(Request $request, ServiceSchedule $serviceSchedule)
    {
        $validatedData = $request->validate([
            'day_of_week' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        $serviceSchedule = ServiceSchedule::find($serviceSchedule->id);

        if ($serviceSchedule) {
            $serviceSchedule->update([
                'user_id' => Session::get('LoggedIn'),
                'day_of_week' => $validatedData['day_of_week'],
                'start_time' => $validatedData['start_time'],
                'end_time' => $validatedData['end_time'],
            ]);

            return redirect('service-schedule')->with('success', 'Service schedule updated successfully!');
        } else {
            return redirect('service-schedule')->with('error', 'Service schedule not found.');
        }


    }

    public function destroy($id)
    {
        $schedule = ServiceSchedule::find($id);

        if ($schedule) {
            $schedule->delete();
            return redirect('service-schedule')->with('success', 'Service schedule deleted successfully!');
        } else {
            return redirect('service-schedule')->with('error', 'Service schedule not found.');
        }
    }
}
