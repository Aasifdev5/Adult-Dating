<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VerificationDocument;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Page;
class AgeVerificationController extends Controller
{
    public function showVerificationForm()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
             $pages = Page::all();
            return view('verification_form',compact('user_session', 'pages'));
        }
    }

    public function submitVerification(Request $request)
    {
        $request->validate([
            'document' => 'required|mimes:jpeg,png,pdf', // Add appropriate validation rules
            'live_photo' => 'required|image',
        ]);

        $documentPath = $request->file('document')->store('verification_documents');
        $livePhotoPath = $request->file('live_photo')->store('verification_documents');

        VerificationDocument::create([
            'user_id' => Session::get('LoggedIn'),
            'document_path' => $documentPath,
            'live_photo_path' => $livePhotoPath,
            'is_verified' => 1, // Initial verification status
        ]);

        return redirect('dashboard')->with('success', 'Verification submitted successfully.');
    }
}
