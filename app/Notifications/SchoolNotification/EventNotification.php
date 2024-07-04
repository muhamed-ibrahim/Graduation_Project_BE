<?php

namespace App\Notifications\SchoolNotification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventNotification extends Notification
{
    use Queueable;
    private $Event;
    private $parent;
    private $url;
    private $message;

    /**
     * Create a new notification instance.
     */
    public function __construct($Event, $parent, $message, $url)
    {
        $this->Event = $Event;
        $this->parent = $parent;
        $this->url = $url;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'Event' => $this->Event,
            'parent' => $this->parent,
            'message' => $this->message,
            'url' => $this->url,
        ];
    }
}
