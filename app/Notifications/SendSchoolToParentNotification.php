<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendSchoolToParentNotification extends Notification
{
    use Queueable;
    private $data;
    private $user;
    private $url;


    /**
     * Create a new notification instance.
     */
    public function __construct($data,$user,$url)
    {
        $this->data = $data;
        $this->user = $user;
        $this->url = $url;
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
            'data_title' => 'تم الرد',
            'staff_name' => $this->user->name,
            'school_name' => $this->user->school()->first()->name,
            'url' => $this->url,
        ];
    }
}
