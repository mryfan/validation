<?php

if (\PHP_VERSION_ID < 80000 && \extension_loaded('tokenizer')) {
    class PhpToken extends Fy97Validation\Symfony\Polyfill\Php80\PhpToken
    {
    }
}
