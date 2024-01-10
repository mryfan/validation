<?php

namespace Fy97Validation\Illuminate\Contracts\Notifications;

interface Dispatcher
{
    /**
     * Send the given notification to the given notifiable entities.
     *
     * @param  \Fy97Validation\Illuminate\Support\Collection|array|mixed  $notifiables
     * @param  mixed  $notification
     * @return void
     */
    public function send($notifiables, $notification);

    /**
     * Send the given notification immediately.
     *
     * @param  \Fy97Validation\Illuminate\Support\Collection|array|mixed  $notifiables
     * @param  mixed  $notification
     * @return void
     */
    public function sendNow($notifiables, $notification);
}
