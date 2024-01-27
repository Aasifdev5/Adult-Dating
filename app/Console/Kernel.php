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

        foreach ($adData as $ad) {
            // Fetch data from the posting_ads table based on ad_id
            $adsData = PostingAds::select('title', 'category', 'city', 'age', 'user_id')
                ->where('id', $ad->ad_id)
                ->first();

            if ($adsData) {
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

                // Format start_time and end_time for dailyAt
                $startTime = \Carbon\Carbon::parse($ad->start_time)->format('H:i');
                $endTime = \Carbon\Carbon::parse($ad->end_time)->format('H:i');

                // Schedule the daily task
                $schedule->call(function () use ($adsData, $ad) {
                    $this->showCarouselAd($adsData, $ad);
                })->dailyAt($startTime)->timezone('Asia/Kolkata');
            }
        }
    }

    protected function showCarouselAd($adsData, $ad)
    {
        // Check if 'start_time' and 'end_time' properties exist in the PaidTopAd model
        if (property_exists($ad, 'start_time') && property_exists($ad, 'end_time')) {
            // Log the start and end time for debugging
            info("Showing carousel ad: Start Time - {$ad->start_time}, End Time - {$ad->end_time}");

            // Your existing code here

            // For testing, log the details of the fetched ad
            info("Ad Details: " . json_encode($adsData));

            // ... trigger an event or send a notification about the displayed ad (optional) ...
        } else {
            // Log an error if 'start_time' or 'end_time' properties are missing
            info("Error: 'start_time' or 'end_time' properties missing in PaidTopAd model.");
        }
    }
}
