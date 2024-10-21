<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MovieTypeNotification extends Notification
{
    use Queueable;

    protected $movieType;
    protected $isUpdated;

    public function __construct($movieType, $isUpdated)
    {
        $this->movieType = $movieType;
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
                'Type updated: ' . $this->movieType->name :
                'Type created: ' . $this->movieType->name,
            'url' => route('typeList'), 
        ];
    }
}
