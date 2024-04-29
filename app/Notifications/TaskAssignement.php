<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskAssignement extends Notification
{
    use Queueable;
    private $task_id;
    private $task_holder;


    /**
     * Create a new notification instance.
     */
    public function __construct($task_id,$task_holder)
    {
        //
        $this->task_id = $task_id;
        $this->task_holder = $task_holder;

    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }


    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
