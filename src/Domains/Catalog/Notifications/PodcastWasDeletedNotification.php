<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Notifications;

use Illuminate\Bus\Queueable;
use Castr\Domains\Catalog\Models\Podcast;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PodcastWasDeletedNotification extends Notification
{
    use Queueable;

    public function __construct(
        public Podcast $podcast,
    ) {}

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(
                subject: "[CASTR]: {$this->podcast->title} has been deleted",
            )
            ->line(
                line: "Your podcast, {$this->podcast->title}, has been requested to be removed.",
            )->line(
                line: 'If this was not you, please contact support, but also change your password.'
            )
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable): array
    {
        return [
            //
        ];
    }
}
