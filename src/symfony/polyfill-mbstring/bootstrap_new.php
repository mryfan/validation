<?php
namespace Fy97Validation\Symfony\Polyfill\Mbstring;

use Fy97Validation\Symfony\Polyfill\Mbstring as p;




class bootstrap_new{

static     function mb_str_pad(string $string, int $length, string $pad_string = ' ', int $pad_type = STR_PAD_RIGHT, ?string $encoding = null): string { return p\Mbstring::mb_str_pad($string, $length, $pad_string, $pad_type, $encoding); }
}
