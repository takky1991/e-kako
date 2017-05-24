<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WelcomeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
                    ->subject('Dobrodošli na e-kako.ba')
                    ->greeting('Pozdrav ' . $notifiable->first_name)
                    ->line('Hvala što ste se registrovali. Na e-kako možete pronaći sve informacije o tome kako započeti novi život u Njemačkoj. Isto tako možete čitati lična iskustva drugih članova, a ako ste sve ovo prošli i sami, podijelite Vaša iskustva drugima. Možda nekom pomognete.')
                    ->action('Ispričaj svoju priču', route('frontend.createPost'));
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
