<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendParentToSchoolNotification extends Notification
{
    use Queueable;
    private $data;
    private $user;
    private $action;

    /**
     * Create a new notification instance.
     */
    public function __construct($data,$user,$action)
    {
        $this->data = $data;
        $this->user = $user;
        $this->action = $action;
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
            'data_title' => 'تسجيل',
            'parent_name' => $this->user->name,
        ];
    }

}
