<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Page;
use Illuminate\Support\Str;

class Pages extends Controller
{
    public function pages_list()
    {

        if (Session::has('LoggedIn')) {
            $pages_list = Page::orderBy('id')->paginate(10);

            $page_title = trans('words.pages');
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.pages_list', compact('user_session', 'page_title', 'pages_list'));
        }
    }

    public function add()
    {
        if (Session::has('LoggedIn')) {

            $page_title = trans('words.add_page');
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.addedit_page', compact('user_session', 'page_title'));
        }
    }

    public function edit($page_id)
    {
        if (Session::has('LoggedIn')) {
            $page_title = trans('words.edit_page');

            $page_info = Page::findOrFail($page_id);
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.addedit_page', compact('user_session', 'page_title', 'page_info'));
        }
    }
    public function get_page($slug)
    {
        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            $page_info = Page::where('page_slug', $slug)->first();

            if ($page_info->id == 5) {
                return view('admin.pages.pages_contact', compact('user_session', 'page_info'));
            } else {
                return view('admin.pages.pages', compact('user_session', 'page_info'));
            }
        }
    }

    public function contact_send(Request $request)
    {


        $inputs = $request->all();



        $data = array(
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'phone' => $inputs['phone'],
            'subject' => $inputs['subject'],
            'user_message' => $inputs['message'],
        );

        $subject = $inputs['subject'];

        try {

            \Mail::send('emails.contact', $data, function ($message) use ($subject) {

                $message->from(getcong('site_email'), getcong('site_name'));

                $message->to(getcong('site_email'))->subject($subject);
            });

            \Session::flash('flash_message', 'Thank You. Your Message has been Submitted.');
            return \Redirect::back();
        } catch (\Throwable $e) {

            \Log::info($e->getMessage());

            \Session::flash('error_flash_message', $e->getMessage());

            return \Redirect::back();
        }


        \Session::flash('flash_message', 'Thank You. Your Message has been Submitted.');

        return \Redirect::back();
    }


    public function addnew(Request $request)
    {


        $inputs = $request->all();

        if (!empty($inputs['id'])) {

            $page_obj = Page::findOrFail($inputs['id']);
        } else {

            $page_obj = new Page;
        }


        $page_slug = Str::slug($inputs['page_title'], '-');

        $page_obj->page_title = addslashes($inputs['page_title']);
        $page_obj->page_slug = $page_slug;
        $page_obj->page_content = addslashes($inputs['page_content']);

        $page_obj->page_order = $inputs['page_order'];
        $page_obj->status = $inputs['status'];

        $data = $page_obj->save();
        if ($data) {
            return back()->with('success', 'Added Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }

    public function delete($page_id)
    {

        $page_obj = Page::findOrFail($page_id);
        $page_obj->delete();
        return back()->with('success', 'Deleted Successfully');
    }

    public function page_details($page_slug, $page_id)
    {
        $page_info = Page::findOrFail($page_id);



        $page_title = $page_info->page_title;


        return view('page_details', compact('page_title', 'page_info'));
    }
}
