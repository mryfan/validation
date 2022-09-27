<?php
namespace Fy97Validation\Symfony\Component\Translation\Resources;





class functions_new{

static     function t(string $message, array $parameters = [], string $domain = null): TranslatableMessage
    {
        return new TranslatableMessage($message, $parameters, $domain);
    }
}
