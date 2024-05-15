<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEnrollReqNotification extends Notification
{
    use Queueable;
    private $data;
    private $user;


    /**
     * Create a new notification instance.
     */
    public function __construct($data,$user)
    {
        $this->data = $data;
        $this->user = $user;

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

    public function toArray(object $notifiable): array
    {
        return [
            'data_id' => $this->data->id,
            'data_title' => 'some users added new enroll requests',
            'parent_name' => $this->user->name,
        ];
    }
}
