<?php

namespace App\Notifications\SchoolNotification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TransferFromNewNotification extends Notification
{
    use Queueable;
    private $Transfer;
    private $school;
    private $url;
    private $message;

    /**
     * Create a new notification instance.
     */
    public function __construct($Transfer, $school, $message, $url)
    {
        $this->Transfer = $Transfer;
        $this->school = $school;
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
            'Transfer' => $this->Transfer,
            'school' => $this->school,
            'message' => $this->message,
            'url' => $this->url,
        ];
    }
}
