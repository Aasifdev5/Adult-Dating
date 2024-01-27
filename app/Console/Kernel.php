<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\ScheduledAd;
use App\Models\PaidTopAd;
use App\Models\PostingAds;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $adData = PaidTopAd::select('ad_id', 'start_time', 'end_time')->get();
        $currentTime = \Carbon\Carbon::now()->timezone('Asia/Kolkata')->format('H:i');
        foreach ($adData as $ad) {
            // Fetch data from the posting_ads table based on ad_id
            $adsData = PostingAds::select('title', 'category', 'city', 'age', 'user_id')
                ->where('id', $ad->ad_id)
                ->first();

            if ($adsData) {
                // Format start_time and end_time for dailyAt
                $startTime = \Carbon\Carbon::parse($ad->start_time)->format('H:i');
                $endTime = \Carbon\Carbon::parse($ad->end_time)->format('H:i');
                 // Compare the formatted strings directly
                 if ($currentTime >= $endTime) {
                    ScheduledAd::where('end_time', $endTime)->delete();
                }
                if ($currentTime == $startTime || $currentTime < $endTime) {
                    // Insert into the scheduled_ads table
                    ScheduledAd::create([
                        'ad_id' => $ad->ad_id,
                        'category' => $adsData->category,
                        'title' => $adsData->title,
                        'city' => $adsData->city,
                        'age' => $adsData->age,
                        'user_id' => $adsData->user_id,
                        'start_time' => $ad->start_time,
                        'end_time' => $ad->end_time,
                    ]);
                }


                // Schedule the daily task
                $schedule->call(function () use ($adsData) {
                    $this->showCarouselAd($adsData);
                })->dailyAt($startTime)->timezone('Asia/Kolkata');
            }
        }
    }
    // protected function schedule(Schedule $schedule)
    // {
    //     $adData = PaidTopAd::// Eager load related data
    // select('ad_id', 'start_time', 'end_time')
    //         ->get();

    //     $currentTime = \Carbon\Carbon::now()->timezone('Asia/Kolkata'); // Use Carbon for time comparisons

    //     foreach ($adData as $ad) {
    //         $startTime = \Carbon\Carbon::parse($ad->start_time);
    //         $endTime = \Carbon\Carbon::parse($ad->end_time);

    //         if ($currentTime->between($startTime, $endTime)) {
    //             $adsData = $ad->postingAd; // Access eager-loaded data

    //             if ($adsData) {
    //                 ScheduledAd::create([
    //                     'ad_id' => $ad->ad_id,
    //                     'category' => $adsData->category,
    //                     'title' => $adsData->title,
    //                     'city' => $adsData->city,
    //                     'age' => $adsData->age,
    //                     'user_id' => $adsData->user_id,
    //                     'start_time' => $ad->start_time,
    //                     'end_time' => $ad->end_time,
    //                 ]);

    //                 $schedule->call(function () use ($adsData) {
    //                     $this->showCarouselAd($adsData);
    //                 })->dailyAt($startTime)->timezone('Asia/Kolkata');
    //             }
    //         } elseif ($currentTime->greaterThanOrEqualTo($endTime)) {
    //             ScheduledAd::where('ad_id', $ad->ad_id)
    //                 ->delete();
    //         }
    //     }
    // }
    protected function showCarouselAd(ScheduledAd $ad)
    {
        // Check if 'start_time' and 'end_time' properties exist in the ScheduledAd model
        if (property_exists($ad, 'start_time') && property_exists($ad, 'end_time')) {
            // Log the start and end time for debugging
            info("Showing carousel ad: Start Time - {$ad->start_time}, End Time - {$ad->end_time}");

            // Your existing code here

            $ads = [$ad]; // Replace with the actual list of ads for the current time slot
            $currentSlot = ['start_time' => $ad->start_time, 'end_time' => $ad->end_time];

            // Pass required data to the blade using session, flash data, or view props
            session()->put('active_carousel_ads', $ads);
            session()->put('current_carousel_slot', $currentSlot);

            // ... trigger an event or send a notification about the displayed ad (optional) ...
        } else {
            // Log an error if 'start_time' or 'end_time' properties are missing
            info("Error: 'start_time' or 'end_time' properties missing in ScheduledAd model.");
        }
    }
}
