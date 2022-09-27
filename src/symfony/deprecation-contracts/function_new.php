<?php
namespace Fy97Validation\Fy97Validation/symfony/deprecation-contract;





class function_new{

static     function trigger_deprecation(string $package, string $version, string $message, ...$args): void
    {
        @trigger_error(($package || $version ? "Since $package $version: " : '').($args ? vsprintf($message, $args) : $message), \E_USER_DEPRECATED);
    }
}
