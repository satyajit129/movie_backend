<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MovieNotification extends Notification
{
    use Queueable;

    protected $movie;
    protected $isUpdated;

    public function __construct($movie, $isUpdated)
    {
        $this->movie = $movie;
        $this->isUpdated = $isUpdated;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => $this->isUpdated ? 
                'Movie updated: ' . $this->movie->name :
                'Movie created: ' . $this->movie->name,
            'url' => route('typeList'), 
        ];
    }
}
