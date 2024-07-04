<?php

namespace App\Notifications\AdminstrationNotification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReportNotification extends Notification
{
    use Queueable;
    private $Report;
    private $adminstration;
    private $url;
    private $message;


    /**
     * Create a new notification instance.
     */
    public function __construct($Report,$adminstration,$message,$url)
    {
        $this->Report = $Report;
        $this->adminstration = $adminstration;
        $this->url = $url;
        $this->message =$message;
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
            'Report' => $this->Report,
            'adminstration' => $this->adminstration,
            'message' => $this->message,
            'url' => $this->url,
        ];
    }
}
