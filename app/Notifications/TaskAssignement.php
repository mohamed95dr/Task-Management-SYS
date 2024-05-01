<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class TaskAssignement extends Notification
{
    use Queueable;
    private $task_title;
    private $task_constructor;


    /**
     * Create a new notification instance.
     */
    public function __construct($task_title,$task_constructor)
    {
        //
        $this->task_title = $task_title;
        $this->task_constructor = $task_constructor;

    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }


    public function toArray(object $notifiable): array
    {
        return [
            //
            $task_title = $this->task_title,
            $task_constructor = $this->task_constructor
        ];
    }
}
