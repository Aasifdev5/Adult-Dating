<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\MailTemplate;

class WelcomeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Retrieve mail template by alias.
     *
     * @param string $alias
     * @return mixed
     */
    public function mailTemplate($alias)
    {
        $mailTemplate = MailTemplate::where('alias', $alias)->first();
        return $mailTemplate;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $user): MailMessage
    {
        // Corrected the function call to use $this->mailTemplate('welcome')
        $template = $this->mailTemplate('welcome');

        return (new MailMessage)
            ->subject($template->subject)
            ->markdown('emails.default', [
                'body' => $template->body,
                'short_codes' => [
                    '{{name}}' => $user->name,
                    '{{website_name}}' => 'skyforecasting',
                ],
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
