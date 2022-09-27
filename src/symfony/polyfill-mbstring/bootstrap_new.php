<?php
namespace Fy97Validation\Symfony\Polyfill\Mbstring;

use Fy97Validation\Symfony\Polyfill\Mbstring as p;




class bootstrap_new{

static     function mb_str_split($string, $length = 1, $encoding = null) { return p\Mbstring::mb_str_split($string, $length, $encoding); }
}
