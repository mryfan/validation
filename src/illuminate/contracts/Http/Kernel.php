<?php

namespace Fy\Illuminate\Contracts\Http;

interface Kernel
{
    /**
     * Bootstrap the application for HTTP requests.
     *
     * @return void
     */
    public function bootstrap();

    /**
     * Handle an incoming HTTP request.
     *
     * @param  \Fy\Symfony\Component\HttpFoundation\Request  $request
     * @return \Fy\Symfony\Component\HttpFoundation\Response
     */
    public function handle($request);

    /**
     * Perform any final actions for the request lifecycle.
     *
     * @param  \Fy\Symfony\Component\HttpFoundation\Request  $request
     * @param  \Fy\Symfony\Component\HttpFoundation\Response  $response
     * @return void
     */
    public function terminate($request, $response);

    /**
     * Get the Laravel application instance.
     *
     * @return \Fy\Illuminate\Contracts\Foundation\Application
     */
    public function getApplication();
}
