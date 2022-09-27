<?php
namespace Fy97Validation\Symfony\Polyfill\Php80;

use Fy97Validation\Symfony\Polyfill\Php80 as p;




class bootstrap_new{

static     function fdiv(float $num1, float $num2): float { return p\Php80::fdiv($num1, $num2); }
static     function preg_last_error_msg(): string { return p\Php80::preg_last_error_msg(); }
static     function str_contains(?string $haystack, ?string $needle): bool { return p\Php80::str_contains($haystack ?? '', $needle ?? ''); }
static     function str_starts_with(?string $haystack, ?string $needle): bool { return p\Php80::str_starts_with($haystack ?? '', $needle ?? ''); }
static     function str_ends_with(?string $haystack, ?string $needle): bool { return p\Php80::str_ends_with($haystack ?? '', $needle ?? ''); }
static     function get_debug_type($value): string { return p\Php80::get_debug_type($value); }
static     function get_resource_id($resource): int { return p\Php80::get_resource_id($resource); }
}
