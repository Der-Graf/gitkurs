<?php

namespace App\Notifications;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PushToTask extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected Task $task)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Hallo')
            ->line('Dir wurde eine neue Aufgabe zugewiesen.')
            ->line('Die Aufgabe heißt: '.$this->task->title) // Hier kannst du den Titel der Aufgabe dynamisch einfügen
            ->action('Notification Action', url('/tasks/'.$this->task->id)) // Hier kannst du den Link zur Aufgabe einfügen
            ->line('Viel Spaß!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => $this->task->title,
            'url' => url('/tasks/'.$this->task->id),
            'message' => 'Neue Aufgabe',
        ];
    }
}
