<?php

namespace Fy\Illuminate\Contracts\Support;

interface MessageProvider
{
    /**
     * Get the messages for the instance.
     *
     * @return \Fy\Illuminate\Contracts\Support\MessageBag
     */
    public function getMessageBag();
}
