<?php

namespace Fy97Validation\Illuminate\Contracts\Support;

interface Responsable
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Fy97Validation\Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request);
}
