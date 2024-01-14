<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComposeMail;
use Exception;
use Illuminate\Support\Facades\Validator; // Add this line

class EmailAppController extends Controller
{
    public function index(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::find(Session::get('LoggedIn'));

            return view('admin.email_app', compact('user_session'));
        }
    }

    public function compose(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::find(Session::get('LoggedIn'));

            return view('admin.email_compose', compact('user_session'));
        }
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'subject' => ['required', 'string'],
            'message' => ['required', 'string'],
        ]);

        try {
            $email = $request->email;
            $subject = $request->subject;
            $msg = str_ireplace("\r\n", "<br/>", $request->message);

            // Send email using the ComposeMail Mailable
            Mail::to($email)->send(new ComposeMail($subject, $msg));

            return redirect('admin/email-application')->with('success', 'Your message has been sent successfully');
        } catch (Exception $e) {
            return redirect('admin/email-application')->with('fail', 'Something went wrong');
        }
    }

    public function sendMail(Request $request, User $user,$id)
    {


        $request->validate([
            'subject' => ['required', 'string'],
            'reply_to' => ['required', 'email'],
            'message' => ['required', 'string'],
        ]);

        try {
            // echo $id;
            $user = User::find($id);
            $email = $user->email;
            $subject = $request->subject;
            $replyTo = $request->reply_to;
            $msg = $request->message;
            // dd($user->email, $request->reply_to, $subject, $msg);

            Mail::send([], [], function ($message) use ($msg, $email, $subject, $replyTo) {
                $message->to($email)
                    ->replyTo($replyTo)
                    ->subject($subject)
                    ->html($msg);
            });


            return back()->with('success', 'Sent successfully');
        } catch (\Exception $e) {

            return back()->with('fail', 'Failed');
        }
    }
}
