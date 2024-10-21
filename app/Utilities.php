<?php 

namespace App;

use Carbon\Carbon;

class Utilities
{
    public static function getGreeting()
    {
        $hour = Carbon::now()->format('H');
        $greeting = '';

        if ($hour >= 5 && $hour < 12) {
            $greeting = 'Good Morning';
        } elseif ($hour >= 12 && $hour < 17) {
            $greeting = 'Good Afternoon';
        } elseif ($hour >= 17 && $hour < 21) {
            $greeting = 'Good Evening';
        } else {
            $greeting = 'Good Night';
        }
        return $greeting;
    }
}