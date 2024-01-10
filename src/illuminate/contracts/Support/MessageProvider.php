<?php

namespace Fy97Validation\Illuminate\Contracts\Support;

interface MessageProvider
{
    /**
     * Get the messages for the instance.
     *
     * @return \Fy97Validation\Illuminate\Contracts\Support\MessageBag
     */
    public function getMessageBag();
}
