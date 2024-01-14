<?php

// app/Http/Controllers/VerificationController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use App\Notifications\WelcomeNotification;

class VerificationController extends Controller
{
    public function verifyEmail(Request $request, $id, $hash)
    {
        $user = User::findOrFail($id);

        if (! hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            abort(403, 'Invalid verification link');
        }

        if (! $user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($user));
            if ($user->hasVerifiedEmail()) {
                $user->notify(new WelcomeNotification($user));
            }
        }

        return redirect('/')->with('verified', true);
    }
}

