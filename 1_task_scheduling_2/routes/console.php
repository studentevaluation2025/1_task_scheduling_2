<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();



use Illuminate\Support\Facades\Schedule;
use App\Models\Post;

Schedule::call(function () {
    Log::info('Task executed!');
    // Find all posts that are not yet published but need to be published
    $posts = Post::where('status', false)
                 ->where('publish_at', '<=', now())
                 ->get();
  dd(now());               
dd(['Message' => 'Fetched Posts:', 'Data' => $posts]);
//dump($posts);
// The rest of your code will still execute

    // Update the status of each post to 'published'
    foreach ($posts as $post) {
        $post->update(['status' => true]);
    }
})->everySecond(); // Adjust frequency as needed, for example: ->dailyAt('00:00') to run at midnight
