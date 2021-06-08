<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Notifications;

use Illuminate\Bus\Queueable;
use Castr\Domains\Catalog\Models\Podcast;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PodcastIsSyncingNotification extends Notification
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
                subject: "[CASTR]: {$this->podcast->title} is now syncing",
            )
            ->line(
                line: 'Thank you for submitting your podcast to our platform, just to let you know we have now started crawling this and will do this on a daily basis.',
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
