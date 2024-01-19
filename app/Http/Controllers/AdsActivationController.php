<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdsActivation;
use Illuminate\Support\Facades\Session;
class AdsActivationController extends Controller
{
    public function createAd(Request $request)
    {
        // Validate request and create ad record
        $ad = AdsActivation::create([
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
            'schedule' => $request->input('schedule'),
            'package' => $request->input('package'),
        ]);

        // Handle payment and activation logic here

        return redirect()->route('dashboard')->with('success', 'Ad created successfully!');
    }
}
