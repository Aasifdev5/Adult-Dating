<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class MailTemplateController extends Controller
{
    public function index(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            $mailTemplates = MailTemplate::all();
            return view('admin.mail-templates.index', [
                'mailTemplates' => $mailTemplates,
            ], compact('user_session'));
        }
    }
    public function add(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();


            return view('admin.mail-templates.add', compact('user_session'));
        }
    }
    public function save(Request $request, MailTemplate $mailTemplate)
    {
        
        $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'body' => ['required'],

        ]);
        

        $status = $mailTemplate->isDefault() ? 1 : ($request->has('status') ? 1 : 0);

        $save = $mailTemplate->create([
            'alias' => 'welcome',
            'name' => 'Welcome',
            'subject' => $request->subject,
            'status' => $status,
            'body' => $request->body,
        ]);

        if ($save) {
            return back()->with('success', 'Created Successfully');
        }
    }

    public function edit(Request $request, $id)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            $mailTemplates = MailTemplate::where('id', $id)->first();
            // print_r($mailTemplates);
            // die;
            return view('admin.mail-templates.edit', ['mailTemplate' => $mailTemplates], compact('user_session'));
        }
    }

    public function update(Request $request, MailTemplate $mailTemplate,$id)
    {
        $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'body' => ['required'],

        ]);
       
        
        $update =MailTemplate::where('id',$id)->update([
            'subject' => $request->subject,
            'status' => '1',
            'body' => $request->body,
        ]);
        if ($update) {
            return back()->with('success', 'Created Successfully');
        }
    }
}
