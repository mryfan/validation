<?php
namespace Fy97Validation\Symfony\Polyfill\Intl\Normalizer;

use Fy97Validation\Symfony\Polyfill\Intl\Normalizer as p;




class bootstrap_new{

static     function normalizer_is_normalized($string, $form = p\Normalizer::FORM_C) { return p\Normalizer::isNormalized($string, $form); }
static     function normalizer_normalize($string, $form = p\Normalizer::FORM_C) { return p\Normalizer::normalize($string, $form); }
}
