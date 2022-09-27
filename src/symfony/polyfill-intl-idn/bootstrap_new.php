<?php
namespace Fy97Validation\Symfony\Polyfill\Intl\Idn;

use Fy97Validation\Symfony\Polyfill\Intl\Idn as p;




class bootstrap_new{

static         function idn_to_ascii($domain, $flags = 0, $variant = \INTL_IDNA_VARIANT_2003, &$idna_info = null) { return p\Idn::idn_to_ascii($domain, $flags, $variant, $idna_info); }
static         function idn_to_utf8($domain, $flags = 0, $variant = \INTL_IDNA_VARIANT_2003, &$idna_info = null) { return p\Idn::idn_to_utf8($domain, $flags, $variant, $idna_info); }
static         function idn_to_ascii($domain, $flags = 0, $variant = \INTL_IDNA_VARIANT_2003, &$idna_info = null) { return p\Idn::idn_to_ascii($domain, $flags, $variant, $idna_info); }
static         function idn_to_utf8($domain, $flags = 0, $variant = \INTL_IDNA_VARIANT_2003, &$idna_info = null) { return p\Idn::idn_to_utf8($domain, $flags, $variant, $idna_info); }
}
