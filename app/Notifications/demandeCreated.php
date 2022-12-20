<?php

namespace App\Notifications;

use App\Models\demande;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class demandeCreated extends Notification
{
    use Queueable;
    private demande $demande;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(demande $demande)
    {
        $this->demande =$demande;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting($this->demande->title)
                    ->line($this->demande->description)
                    ->action('consulter la demande', url('http://127.0.0.1:8000/liste'))
                    ->line('Thank you!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}