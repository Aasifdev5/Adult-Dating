<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\ScheduledAd;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $scheduledAds = [
            // Define each ad with start and end times, replace with your actual data
            ['start_time' => '18:37', 'end_time' => '22:00', 'image' => 'ad1.jpg', 'url' => 'https://example.com/ad1'],
            ['start_time' => '12:00', 'end_time' => '15:00', 'image' => 'ad2.jpg', 'url' => 'https://example.com/ad2'],
            // ... add more ads ...
        ];

        foreach ($scheduledAds as $adData) {
            $scheduledAd = ScheduledAd::create($adData);

            $schedule->call(function () use ($scheduledAd) {
                $this->showCarouselAd($scheduledAd);
            })->dailyAt($adData['start_time'])->timezone('Asia/Kolkata');
        }
    }

    protected function showCarouselAd(ScheduledAd $ad)
    {
        info("Showing carousel ad: {$ad->image} at {$ad->start_time}");

        // Replace with your logic to display the ad in the carousel on the 'ads_list' blade
        // You can use a dedicated carousel library or build your own HTML structure

        // Example placeholder code:
        $ads = [$ad]; // Replace with the actual list of ads for the current time slot
        $currentSlot = ['start_time' => $ad->start_time, 'end_time' => $ad->end_time];

        // Pass required data to the blade using session, flash data, or view props
        session()->put('active_carousel_ads', $ads);
        session()->put('current_carousel_slot', $currentSlot);

        // ... trigger an event or send a notification about the displayed ad (optional) ...
    }
}
